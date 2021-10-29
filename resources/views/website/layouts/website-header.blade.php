<h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome</p>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown ml-5">
                    <a href="#language">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR">FRH</a>
                        </li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->

                <span class="divider"></span>
                <a href="contact-us.html" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>

                @guest
                    <a class="login-link" href="{{route('login')}}" data-toggle="login-modal">
                        <i class="d-icon-user"></i>
                        Sign in
                    </a>

                    <span class="delimiter">/</span>
                    <a class="register-link ml-0" href="{{route('login')}}" data-toggle="login-modal">Register</a>
                @endguest
                @auth
                    <div class="dropdown">
                        <a href="#" class="help d-lg-show"><i class="d-icon-user"></i> <b>{{ Auth()->user()->name}}</b></a>
                        <ul class="dropdown-box">
                            <li>
                                <a href="{{route('website.account.show')}}"><div style="padding: 10px"><i class="fas fa-user-cog"></i> Account</div></a>
                            </li>
                            <li>
                                <a href="#" class="logout"><div style="padding: 10px"><i class="fas fa-sign-out-alt"></i> Logout</div></a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{route('logout')}}" method="post" id="logout-form">
                        @csrf
                    </form>
                    <!-- End DropDown Menu -->

{{--                    <a style="font-weight: bold">--}}
{{--                        <i class="d-icon-user"></i>&nbsp;{{ Auth()->user()->name}}--}}
{{--                    </a>--}}
                @endauth
                <!-- End of Login -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{route('home')}}" class="logo">
                    <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                        <defs>
                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                <stop stop-color="#000000" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                </g>
                            </g>
                        </g>
                    </svg></span>
                    <h2 style="display: inline; margin-left: 3px"> Nebras</h2>
                </a>
                <!-- End Logo -->

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:#" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Call Us Now:</h4>
                        <p>0(800) 123-456</p>
                    </div>
                </a>
                <span class="divider"></span>
                @auth
                    <a href="{{route('website.wishlist.index')}}" class="wishlist">
                        <i class="d-icon-heart"></i>
                    </a>
                    <span class="divider"></span>
                @endauth
                <x-cart-menu />
            </div>
        </div>
    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('website.category.index') }}">Categories</a>
                            <x-categories-menu />
                        </li>
                        <li>
                            <a href="{{ route('website.products.index') }}">Shop</a>
                        </li>
                        @auth
                            <li><a href="{{ route('website.account.show') }}">My Account</a></li>
                        @endauth
                        @guest
                            <li>
                                <a class="login-link" href="{{route('login')}}" data-toggle="login-modal">
                                    My Account
                                </a>
                            </li>
{{--                            <li><a href="account.html"></a></li>--}}
                        @endguest
                        <li>
                            <a href="{{route('website.about_us')}}">About Us</a>
                        </li>
                        <li><a href="{{route('website.FAQs')}}">FAQs</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#"><i class="d-icon-card"></i>Special Offers</a>
            </div>
        </div>
    </div>
</header>
