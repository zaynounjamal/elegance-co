<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(9);
        $comments = Comment::all();
        $reply=Reply::all();
        return view('home.userpage', compact('product','comments','reply'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_products=Product::all()->count();
            $total_orders=Order::all()->count();
            $total_users=User::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach ($order as $orders){
                $total_revenue=$total_revenue+$orders->price;
            }
            $total_delivered=Order::where('delivery_status','=','Delivered')->get()->count();
            $total_pending=Order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home', compact('total_products',
            'total_orders','total_users','total_revenue','total_delivered','total_pending'));
        } else {
            $product = Product::paginate(9);
            $comments=Comment::all();
            $reply=Reply::all();
            return view('home.userpage', compact('product','comments','reply'));
        }
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid=$user->id;
            $product = Product::find($id);
            $product_exist_id=Cart::where('product_id','=',$id)
            ->where('user_id','=',$userid)->get('id')->first();
            if ($product_exist_id) {
                 $cart = Cart::find($product_exist_id->id);
                 $cart->quantity = $cart->quantity + $request->quantity;
                 if ($product->discount != null) {
                    $cart->price = $product->discount * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                if($product->quantity >= $cart->quantity){
                 $product->quantity = $product->quantity - $cart->quantity;
                 $product->save();
                }else{
                    Alert::error('Error','Not enough quantity in stock');
                    return redirect()->back()->with('error', 'Not enough quantity in stock');
                }
                 $cart->save();
                 Alert::success('Product Updated Successfully','Quantity updated in cart successfully');
                 return redirect()->back()->with('success', 'Quantity updated in cart successfully');
            }
            else{
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->username = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            if ($product->discount != null) {
                $cart->price = $product->discount * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;
            $cart->product_id = $product->id;
            if($product->quantity >= $cart->quantity){
            $product->quantity = $product->quantity - $cart->quantity;
            $product->save();
            }else{
                Alert::error('Error','Not enough quantity in stock');
                return redirect()->back()->with('error', 'Not enough quantity in stock');
            }
            $cart->save();
            Alert::success('Product added Successfully','Product added to cart successfully');
            return redirect()->back()->with('success', 'Product added to cart successfully');
        }
        } else {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $product_id = $cart->product_id;
        $product = Product::find($product_id);
        $product->quantity = $product->quantity + $cart->quantity;
        $product->save();
        $cart->delete();
        Alert::success('Product removed Successfully','Product removed from cart successfully');
        return redirect()->back()->with('message', 'Product removed from cart successfully');
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach ($data as $datas) {
            $order = new Order;
            $order->user_id = $datas->user_id;
            $order->name = $user->name;
            $order->email = $datas->email;
            $order->phone = $datas->phone;
            $order->address = $datas->address;
            $order->product_title = $datas->product_title;
            $order->price = $datas->price;
            $order->image = $datas->image;
            $order->product_id = $datas->product_id;
            $order->quantity = $datas->quantity;
            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $datas->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('Order placed Successfully','We have Received Your Order. We will connect with you soon...');
        return redirect()->back()->with('message', 'We have Received Your Order. We will connect with you soon...');
    }
    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment!"
        ]);
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach ($data as $datas) {
            $order = new Order;
            $order->user_id = $datas->user_id;
            $order->name = $user->name;
            $order->email = $datas->email;
            $order->phone = $datas->phone;
            $order->address = $datas->address;
            $order->product_title = $datas->product_title;
            $order->price = $datas->price;
            $order->image = $datas->image;
            $order->product_id = $datas->product_id;
            $order->quantity = $datas->quantity;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $datas->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('Order placed Successfully','We have Received Your Order. We will connect with you soon...');
        return back()
                ->with('success', 'Payment successful!');
    }
    public function order(){
        $order = Order::all();
        return view('admin.order',compact('order'));
    }
    public function delivered($id){
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();
        Alert::success('Order delivered successfully','Thanks for your order');
        return redirect()->back()->with('message','Order delivered successfully');
    }
    public function show_order(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $order = Order::where('user_id', '=', $id)->get();
            return view('home.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function cancle_order($id){
        $order = Order::find($id);
        $order->delivery_status = 'You canceled the order';
        $order->save();
        Alert::warning('Order canceled successfully','Is their any problems?');
        return redirect()->back()->with('message','Order canceled successfully');
    }
    public function add_comment(Request $request){
          if(Auth::id()){
           $comment = new Comment;
           $comment->name = Auth::user()->name;
           $comment->user_id = Auth::user()->id;
           $comment->comment = $request->comment;
           $comment->save();
           return redirect()->back()->with('message','Comment added successfully');
          }else{
            return redirect('login');
          }
    }
    public function add_reply(Request $request){
        if(Auth::id()){
            $reply=new Reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back()->with('message','Reply added successfully');
        } else{
            return redirect('login');
        }
    }
    public function product_search(Request $request){
        $search_text = $request->search;
        $product = Product::where('title','LIKE','%'.$search_text.'%')
        ->orWhere('description','LIKE','%'.$search_text.'%')
        ->orWhere('price','LIKE','%'.$search_text.'%')
        ->orWhere('discount','LIKE','%'.$search_text.'%')
        ->orWhere('category','LIKE','%'.$search_text.'%')
        ->paginate(10);
        $comments = Comment::all();
        $reply=Reply::all();
        return view('home.userpage',compact('product','comments','reply'));
    }
    public function products(){
        $product = Product::paginate(9);
        $comments = Comment::all();
        $reply=Reply::all();
        return view('home.all_products',compact('product','comments','reply'));
    }
    public function product_search_view(Request $request){
        $search_text = $request->search;
        $product = Product::where('title','LIKE','%'.$search_text.'%')
        ->orWhere('description','LIKE','%'.$search_text.'%')
        ->orWhere('price','LIKE','%'.$search_text.'%')
        ->orWhere('discount','LIKE','%'.$search_text.'%')
        ->orWhere('category','LIKE','%'.$search_text.'%')
        ->paginate(10);
        $comments = Comment::all();
        $reply=Reply::all();
        return view('home.all_products',compact('product','comments','reply'));
    }
    public function blog(){
        return view('home.blog');
    }
    public function contact(){
        return view('home.contact');
    }
    public function about(){
        return view('home.about');
    }
    public function testimonial(){
        return view('home.testimonial');
    }
    public function send_message(Request $request){
       if(Auth::user()){ $contact =new Contact;
        $id=Auth::user()->id;
        $contact->user_id=$id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        Alert::success('Message sent successfully','Thank you for contacting us.');
        return redirect()->back()->with('message','Message sent successfully');
       }else{
           return redirect('login');
       }

    }
}
