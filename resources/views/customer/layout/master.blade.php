@vite(["resources/sass/app.scss", "resources/js/app.js"])

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/Logo.png ') }}">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css') }}">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/range-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery.slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="body-bg-6">

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="/" class="cr-logo">
                            <img src="{{ asset('assets/img/logo/Logo.jpg') }}" alt="logo" class="logo">
                        </a>
                        <form class="cr-search" action="{{ route('search') }}" method="GET">
                            {{ csrf_field() }}
                            <div class="search-box">
                                <input class="search-input" type="text" name="keywords_submit" placeholder="Search For items...">
                                <a class="search-btn" type="submit">
                                    <i class="ri-search-line"></i>
                                </a>
                            </div>
                        </form>
                        <div class="cr-right-bar">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item">
                                        <i class="ri-user-3-line"></i>
                                        <span>Account</span>
                                    </a>
                                    @if (!session()->has('customer_key'))
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="/register">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login">Login</a>
                                        </li>
                                    </ul>
                                    @else
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="/account">account</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/logout">Logout</a>
                                        </li>
                                    </ul>
                                    @endif

                                </li>
                            </ul>
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-3-line"></i>
                                <span>Wishlist</span>
                            </a>
                            <a class="cr-right-bar-item Shopping-toggle" href="{{ route('cart.show') }}">
                                <i class="ri-shopping-cart-line"></i>Cart
                                <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <div class="cr-category-icon-block">
                        <div class="cr-category-menu">
                            <div class="cr-category-toggle">
                                <i class="ri-menu-2-line"></i>
                            </div>
                        </div>
                        <div class="cr-cat-dropdown">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab">
                                    <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            Dairy &amp; Bakery</button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" tabindex="-1">
                                            Fruits &amp; Vegetable</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false" tabindex="-1">
                                            Snack &amp; Spice</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" tabindex="-1">
                                            Juice &amp; Drinks </button>
                                        <a class="nav-link" href="shop-left-sidebar.html">
                                            View All </a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Dairy</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Milk</a></li>
                                                        <li><a href="shop-left-sidebar.html">Ice cream</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Cheese</a></li>
                                                        <li><a href="shop-left-sidebar.html">Frozen
                                                                custard</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Frozen
                                                                yogurt</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Bakery</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cake and
                                                                Pastry</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Rusk Toast</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Bread &amp;
                                                                Buns</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Chocolate
                                                                Brownie</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Cream Roll</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Fruits</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cauliflower</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Bell
                                                                Peppers</a></li>
                                                        <li><a href="shop-left-sidebar.html">Broccoli</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Cabbage</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Tomato</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Vegetable</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cauliflower</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Bell
                                                                Peppers</a></li>
                                                        <li><a href="shop-left-sidebar.html">Broccoli</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Cabbage</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Tomato</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Snacks</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">French
                                                                fries</a></li>
                                                        <li><a href="shop-left-sidebar.html">potato
                                                                chips</a></li>
                                                        <li><a href="shop-left-sidebar.html">Biscuits &amp;
                                                                Cookies</a></li>
                                                        <li><a href="shop-left-sidebar.html">Popcorn</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Rice Cakes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Spice</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Cinnamon
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Cumin
                                                                Powder</a></li>
                                                        <li><a href="shop-left-sidebar.html">Fenugreek
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Pepper
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Long Pepper</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Juice</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Mango Juice</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Coconut
                                                                Water</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Tetra Pack</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Apple
                                                                Juices</a></li>
                                                        <li><a href="shop-left-sidebar.html">Lychee
                                                                Juice</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">soft drink</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="shop-left-sidebar.html">Breizh Cola</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Green Cola</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Jolt Cola</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Mecca Cola</a>
                                                        </li>
                                                        <li><a href="shop-left-sidebar.html">Topsia Cola</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="/register">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/login">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Category
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="shop-left-sidebar.html">Dell</a>
                                        </li>
                                        @foreach ($category as $key => $cate)
                                        <li>
                                            <a class="dropdown-item" href="">{{ $cate->category_name }}</a>

                                        </li>
                                        @endforeach
                                        <li>
                                            <a class="dropdown-item" href="{{ route('product-all.all') }}">All</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Products
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('product-left-sidebar')}}">product
                                                Left
                                                sidebar </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-us') }}">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">
                                        Contact us
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="javascript:void(0)">0988896148</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer padding-t-100 bg-off-white">
        @if(session()->has('fail'))
        <div class="cr-cart-notify">
            <p class="compare-note">{{ session()->get('fail') }}</p>
        </div>
        @endif
        <div class="container">
            <div class="row footer-top padding-b-100">
                <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer-logo">
                        <div class="image">
                            <img src="{{ asset('assets/img/logo/Logo.jpg') }}" alt="logo" class="logo">
                        </div>
                        <p>QAT is the largest store distributing laptops. Get your daily needs from our store.</p>
                    </div>
                    <div class="cr-footer">
                        <h4 class="cr-sub-title cr-title-hidden">
                            Contact us
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li class="location-icon">
                                Street 19 Phuc Xa Ba Dinh Hanoi .
                            </li>
                            <li class="mail-icon">
                                <a href="javascript:void(0)">quanhaclong123456789@email.com</a>
                            </li>
                            <li class="phone-icon">
                                <a href="javascript:void(0)"> 0988896148</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Company
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="track-order.html">Delivery Information</a></li>
                            <li><a href="policy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms & Conditions</a></li>
                            <li><a href="contact-us.html">contact Us</a></li>
                            <li><a href="faq.html">Support Center</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Category
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            @foreach ($category as $key => $cate)
                            <li>
                                <a class="dropdown-item" href="">{{ $cate->category_name }}</a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer cr-newsletter">
                        <h4 class="cr-sub-title">
                            Subscribe Our Newsletter
                            <span class="cr-heading-res"></span>
                        </h4>
                        <div class="cr-footer-links cr-footer-dropdown">
                            <form class="cr-search-footer">
                                <input class="search-input" type="text" placeholder="Search here...">
                                <a href="javascript:void(0)" class="search-btn">
                                    <i class="ri-send-plane-fill"></i>
                                </a>
                            </form>
                        </div>
                        <div class="cr-social-media">
                            <span><a href="javascript:void(0)"><i class="ri-facebook-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-twitter-x-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-dribbble-line"></i></a></span>
                            <span><a href="javascript:void(0)"><i class="ri-instagram-line"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cr-last-footer">
                <p>&copy; <span id="copyright_year"></span> <a href="/">QAT</a>, All
                    rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>

    <!-- dropdown -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- Vendor Custom -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>

    <!-- Main Custom -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function filterProducts(categoryId) {
            let products = document.querySelectorAll('#product-list .mix');
            products.forEach(product => {
                if (categoryId === 'all') {
                    product.style.display = 'block';
                } else {
                    if (product.classList.contains('category-' + categoryId)) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                }
            });

            let categoryItems = document.querySelectorAll('.cr-product-tabs li');
            categoryItems.forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector('.cr-product-tabs li[data-filter="' + categoryId + '"]').classList.add('active');
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.Shopping-toggle').click(function() {
                window.location.href = '/cart';
            });
        });
    </script>
    <script>
        const score = document.querySelector('.score');
        const rating = document.querySelectorAll('.rating input');

        ratings.forEach(rating => {
            rating.addEventListener('change', () => {
                const selectedRating = rating.value;
                const text = selectedRating == 1 ? 'star' : 'star';
                score.textContent = '${selectedRating} ${text} rating.';
            });
        })
    </script>
</body>

</html>