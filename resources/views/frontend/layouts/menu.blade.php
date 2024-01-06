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
                       <a class="nav-link active" aria-current="page" href="index.html">Home</a>
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
                       <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span>5</span></a>
                   </li>
                   <li>
                       <a href="dashboard.html"><i class="fas fa-user"></i></a>
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
               <h5>total item (05)</h5>
               <span class="close_cart"><i class="fal fa-times"></i></span>
           </div>
           <ul>
               <li>
                   <div class="menu_cart_img">
                       <img src="{{ asset('frontend/images/menu8.png') }}" alt="menu" class="img-fluid w-100">
                   </div>
                   <div class="menu_cart_text">
                       <a class="title" href="#">Hyderabadi Biryani </a>
                       <p class="size">small</p>
                       <span class="extra">coca-cola</span>
                       <span class="extra">7up</span>
                       <p class="price">$99.00 <del>$110.00</del></p>
                   </div>
                   <span class="del_icon"><i class="fal fa-times"></i></span>
               </li>
               <li>
                   <div class="menu_cart_img">
                       <img src="{{ asset('frontend/images/menu4.png') }}" alt="menu" class="img-fluid w-100">
                   </div>
                   <div class="menu_cart_text">
                       <a class="title" href="#">Chicken Masalas</a>
                       <p class="size">medium</p>
                       <span class="extra">7up</span>
                       <p class="price">$70.00</p>
                   </div>
                   <span class="del_icon"><i class="fal fa-times"></i></span>
               </li>
               <li>
                   <div class="menu_cart_img">
                       <img src="{{ asset('frontend/images/menu5.png') }}" alt="menu" class="img-fluid w-100">
                   </div>
                   <div class="menu_cart_text">
                       <a class="title" href="#">Competently Supply Customized Initiatives</a>
                       <p class="size">large</p>
                       <span class="extra">coca-cola</span>
                       <span class="extra">7up</span>
                       <p class="price">$120.00 <del>$150.00</del></p>
                   </div>
                   <span class="del_icon"><i class="fal fa-times"></i></span>
               </li>
               <li>
                   <div class="menu_cart_img">
                       <img src="{{ asset('frontend/images/menu6.png') }}" alt="menu" class="img-fluid w-100">
                   </div>
                   <div class="menu_cart_text">
                       <a class="title" href="#">Hyderabadi Biryani</a>
                       <p class="size">small</p>
                       <span class="extra">7up</span>
                       <p class="price">$59.00</p>
                   </div>
                   <span class="del_icon"><i class="fal fa-times"></i></span>
               </li>
               <li>
                   <div class="menu_cart_img">
                       <img src="{{ asset('frontend/images/menu1.png') }}" alt="menu" class="img-fluid w-100">
                   </div>
                   <div class="menu_cart_text">
                       <a class="title" href="#">Competently Supply</a>
                       <p class="size">medium</p>
                       <span class="extra">coca-cola</span>
                       <span class="extra">7up</span>
                       <p class="price">$99.00 <del>$110.00</del></p>
                   </div>
                   <span class="del_icon"><i class="fal fa-times"></i></span>
               </li>
           </ul>
           <p class="subtotal">sub total <span>$1220.00</span></p>
           <a class="cart_view" href="cart_view.html"> view cart</a>
           <a class="checkout" href="check_out.html">checkout</a>
       </div>
   </div>
