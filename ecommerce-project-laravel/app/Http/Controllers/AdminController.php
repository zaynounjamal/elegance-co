<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Notifications\Notification;
use App\Notifications\EcommerceNotification;
use GuzzleHttp\Psr7\Message;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->dis_price;
        $product->category = $request->category;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }
    public function edit_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->dis_price;
        $product->category = $request->category;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }
    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function send_email($id)
    {
        $order = Order::find($id);

        return view('admin.email_info', compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        $order->notify(new EcommerceNotification($details));
        return redirect()->back()->with('message', 'Email Sent Successfully');
    }
    public function search_data(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('phone', 'LIKE', "%$searchText%")
            ->orWhere('address', 'LIKE', "%$searchText%")
            ->orWhere('product_title', 'LIKE', "%$searchText%")
            ->orWhere('payment_status', 'LIKE', "%$searchText%")
            ->orWhere('delivery_status', 'LIKE', "%$searchText%")
            ->get();
        return view('admin.order', compact('order'));
    }
    public function messages_view()
    {
        $messages = Contact::all();
        return view('admin.messages', compact('messages'));
    }
    public function send_email_message($id)
    {
        $message = Contact::find($id);
        return view('admin.email_message', compact('message'));
    }
    public function send_message_reply(Request $request, $id)
    {
        $message = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        $message->notify(new EcommerceNotification($details));
        Alert::success('Email sent successfully', 'success!');
        return redirect()->back()->with('message', 'Email Sent Successfully');
    }
    public function view_users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function search_users(Request $request){
        $searchText = $request->search;
        $users = User::where('name', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('usertype', 'LIKE', "%$searchText%")
            ->get();
        return view('admin.users', compact('users'));
    }
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        Alert::success('User deleted successfully', 'Success!');
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }
    public function edit_user($id){
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }
    public function update_user_info(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->usertype = $request->role;
        $user->save();
        Alert::success('User updated successfully', 'Success!');
        return redirect()->back()->with('message', 'User Updated Successfully');
    }
    public function add_users(){
        $roles = User::select('usertype')->distinct()->get();
        return view('admin.add_users',compact('roles'));
    }
    public function admin_users_store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->address = $request->address;
        $user->usertype = $request->role;
        $user->save();
        Alert::success('User added successfully', 'Success!');
        return redirect()->back()->with('message', 'User Added Successfully');
    }
}
