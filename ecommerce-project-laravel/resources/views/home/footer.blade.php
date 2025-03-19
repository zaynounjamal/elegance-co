<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   <a href="#"><img width="210" src="home/images/logo-removebg-preview.png" alt="#" /></a>
                 </div>
                 <div class="information_f">
                   <p><strong>ADDRESS:</strong>Hamra Street Beirut,Lebanon</p>
                   <p><strong>TELEPHONE:</strong> +961 76 658 203</p>
                   <p><strong>EMAIL:</strong> Elegance&Co@gmail.com</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menu</h3>
                   <ul>
                      <li><a href="{{url('/')}}">Home</a></li>
                      <li><a href="{{url('about')}}">About</a></li>
                      <li><a href="{{url('products')}}">Services</a></li>
                      <li><a href="{{url('testimonial')}}">Testimonial</a></li>
                      <li><a href="{{url('blog')}}">Blog</a></li>
                      <li><a href="{{url('contact')}}">Contact</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Account</h3>
                   <ul>
                      <li><a href="{{ route('profile.show') }}">Account</a></li>
                      <li><a href="{{url('show_cart')}}">Cart</a></li>
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                      <li><a href="{{url('show_order')}}">Orders</a></li>
                      <li><a href="{{ route('logout') }}">Logout</a></li>
                   </ul>
                </div>
             </div>
                </div>
             </div>
             <div class="col-md-5">
                <div class="widget_menu">
                   <h3>Newsletter</h3>
                   <div class="information_f">
                     <p>Subscribe by our newsletter and get update protidin.</p>
                   </div>
                   <div class="form_sub">
                      <form>
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="Enter Your Mail" name="email" />
                               <input type="submit" value="Subscribe" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
