<!DOCTYPE html>
<html lang="en">
<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pharmacy</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/frontend/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('assetes/frontend/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/icons/favicon.icon')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/frontend/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown" style="padding:18px;"></div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    @if(Auth::check())
                                    <li><a href="{{route('pharmacy.front.user.myaccount')}}"><i class="icon-user"></i>MY ACCOUNT</a></li>
                                    <li><a href="{{route('pharmacy.front.logout')}}"><i class="icon-user"></i>Logout</a></li>
                                    @else
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{route('pharmacy.front.index')}}" class="logo">
                            <img src="{{asset('assets/frontend/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{route('pharmacy.front.index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('pharmacy.front.shop')}}">Shop</a>
                                </li>
                                <li>
                                    <a href="{{route('pharmacy.front.shop.category')}}">Shop By Category</a>
                                </li>
                                <li>
                                    <a href="{{route('pharmacy.front.shop.medicine')}}">Medicine</a>
                                </li>
                                <li>
                                    <a href="{{route('pharmacy.front.shop.brand')}}">Our Brand</a>
                                </li>
                                <li>
                                    <a href="{{route('pharmacy.front.shop.newarrival')}}">New Arrival</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <?php 
                            if(Auth::check()){
                                $product = Cart::where('user_id',Auth::user()->id)->get();
                                $countCart = count($product);
                                $cartItems = DB::table('carts')
                                ->join('products', 'carts.product_id', '=', 'products.id')
                                ->where('user_id', Auth::user()->id)
                                ->select('carts.*', 'products.product_name', 'products.mrp', 'products.image')
                                ->get();
                            }else{
                                $countCart = 0;
                            }
                        ?>
                        @if(Auth::check() && $countCart > 0)
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{$countCart}}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @foreach($cartItems as $item)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">{{$item->product_name}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$item->quantity}}</span>
                                                x {{$item->mrp}}
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a class="product-image">
                                                <img src="{{asset('product/'.$item->image)}}" alt="product">
                                            </a>
                                        </figure>
                                    </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .cart-product -->
                                <div class="dropdown-cart-action">
                                    <a href="{{route('pharmacy.front.user.viewcart')}}" class="btn btn-primary btn-block">View Cart</a>
                                   
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                        @endif
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

       

      