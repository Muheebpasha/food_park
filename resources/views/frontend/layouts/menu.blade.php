   <!--=============================
        TOPBAR START
    ==============================-->
   <section class="fp__topbar">
       <div class="container">
           <div class="row">
               <div class="col-xl-6 col-md-8">
                   <ul class="fp__topbar_info d-flex flex-wrap">
                       <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> Unifood@gmail.com</a>
                       </li>
                       <li><a href="callto:123456789"><i class="fas fa-phone-alt"></i> +96487452145214</a></li>
                   </ul>
               </div>
               <div class="col-xl-6 col-md-4 d-none d-md-block">
                   <ul class="topbar_icon d-flex flex-wrap">
                       <li><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                       <li><a href="#"><i class="fab fa-twitter"></i></a> </li>
                       <li><a href="#"><i class="fab fa-linkedin-in"></i></a> </li>
                       <li><a href="#"><i class="fab fa-behance"></i></a> </li>
                   </ul>
               </div>
           </div>
       </div>
   </section>
   <!--=============================
        TOPBAR END
    ==============================-->

   <!--=============================
        MENU START
    ==============================-->
   <nav class="navbar navbar-expand-lg main_menu">
       <div class="container">
           <a class="navbar-brand" href="index.html">
               <img src="{{ asset('frontend/images/logo.png') }}" alt="FoodPark" class="img-fluid">
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <i class="far fa-bars"></i>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav m-auto">
                   <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="about.html">about</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="menu.html">menu</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="chefs.html">chefs</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                       <ul class="droap_menu">
                           <li><a href="menu_details.html">menu details</a></li>
                           <li><a href="blog_details.html">blog details</a></li>
                           <li><a href="cart_view.html">cart view</a></li>
                           <li><a href="check_out.html">checkout</a></li>
                           <li><a href="payment.html">payment</a></li>
                           <li><a href="testimonial.html">testimonial</a></li>
                           <li><a href="search_menu.html">search result</a></li>
                           <li><a href="404.html">404/Error</a></li>
                           <li><a href="faq.html">FAQs</a></li>
                           <li><a href="sign_in.html">sign in</a></li>
                           <li><a href="sign_up.html">sign up</a></li>
                           <li><a href="forgot_password.html">forgot password</a></li>
                           <li><a href="privacy_policy.html">privacy policy</a></li>
                           <li><a href="terms_condition.html">terms and condition</a></li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="blogs.html">blog</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="contact.html">contact</a>
                   </li>
               </ul>
               <ul class="menu_icon d-flex flex-wrap">
                   <li>
                       <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                       <div class="fp__search_form">
                           <form>
                               <span class="close_search"><i class="far fa-times"></i></span>
                               <input type="text" placeholder="Search . . .">
                               <button type="submit">search</button>
                           </form>
                       </div>
                   </li>
                   <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span class="cart_count">{{ count(Cart::content()) }}</span></a>
                   </li>
                   <li>
                       <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                   </li>
                   <li>
                       <a class="common_btn" href="#" data-bs-toggle="modal"
                           data-bs-target="#staticBackdrop">reservation</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>

   <div class="fp__menu_cart_area">
       <div class="fp__menu_cart_boody">
           <div class="fp__menu_cart_header">
            <h5>total item (<span class="cart_count" style="font-size: 16px">{{ count(Cart::content()) }}</span>)</h5>
               <span class="close_cart"><i class="fal fa-times"></i></span>
           </div>
           <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
            <li>
                <div class="menu_cart_img">
                    <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
                </div>
                <div class="menu_cart_text">
                    <a class="title" href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!} </a>
                    <p class="size">Qty: {{ $cartProduct->qty }}</p>

                    <p class="size">{{ @$cartProduct->options->product_size['name'] }} {{ @$cartProduct->options->product_size['price'] ? '('.currencyPosition(@$cartProduct->options->product_size['price']).')' : '' }}</p>

                    @foreach ($cartProduct->options->product_options as $cartProductOption)
                    <span class="extra">{{ $cartProductOption['name'] }} ({{ currencyPosition($cartProductOption['price']) }})</span>
                    @endforeach

                    <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
                </div>
                <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i class="fal fa-times"></i></span>
            </li>
            @endforeach

        </ul>
        <p class="subtotal">sub total <span class="cart_subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}"> view cart</a>
           <a class="checkout" href="check_out.html">checkout</a>
       </div>
   </div>
