<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                {{-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li> --}}
                                <li>Free Shipping for all Order of tk99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('user') }}/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if (session()->has('user_id') && session()->has('user_ip'))
                                    <a href="{{ url('user_logout') }}"><i class="fa fa-sign-out"></i> Logout</a> 
                                @else 
                                    <a href="{{ url('user_login_show') }}"><i class="fa fa-user"></i> Login / Register</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('user') }}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="@yield('home_class')"><a href="{{ url('/') }}">Home</a></li>
                            <li class="@yield('shop_class')"><a href="{{ url('all_products') }}">Shop</a></li>     
                            <li class="@yield('contact_class')"><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        @if (session()->has('user_id') && session()->has('user_ip'))
                        <ul>
                            <li><a href="{{ url('wishlist/'.Crypt::encrypt(session()->get('user_id'))) }}"><i class="fa fa-heart"></i> <span id="total_wishlist"></span></a></li>
                            <li><a href="{{ url('cart/'.Crypt::encrypt(session()->get('user_id'))) }}"><i class="fa fa-shopping-bag"></i> <span id="cart_quantity"></span></a></li>
                        </ul>
                        <div class="header__cart__price">Total: <span id="total_price"></span> <span class="font-weight-bold">tk</span></div>
                        @else  
                        <ul>
                            <li><button onclick="login_cartBTN()" style="background: transparent;border: none;"><i class="fa fa-heart"></i></button></li>
                            <li><button onclick="login_cartBTN()" style="background: transparent;border: none;"><i class="fa fa-shopping-bag"></i></button></li>
                        </ul>
                        <div class="header__cart__price">Total: <span id="total_price">tk</span></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    