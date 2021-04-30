<div class="d-none d-xl-block container">
    <div class="row">
        <!-- Vertical Menu -->
        <div class="col-md-auto d-none d-xl-block">
            <div class="max-width-270 min-width-270">
                <!-- Basics Accordion -->
                <div id="basicsAccordion">
                    <!-- Card -->
                    <div class="card border-0">
                        <div class="card-header card-collapse border-0" id="basicsHeadingOne">
                            <button type="button"
                                class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                                data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                aria-controls="basicsCollapseOne">
                                <span class="ml-0 text-gray-90 mr-2">
                                    <span class="fa fa-list-ul"></span>
                                </span>
                                <span class="pl-1 text-gray-90">All Categories</span>
                            </button>
                        </div>
                        <div id="basicsCollapseOne" class="collapse show vertical-menu"
                            aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                            <div class="card-body p-0">
                                <nav
                                    class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                        <ul class="navbar-nav u-header__navbar-nav">
                                            <!-- Nav Item MegaMenu -->
                                            @foreach ($categories as $category)
                                                <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                    data-event="hover" data-animation-in="slideInUp"
                                                    data-animation-out="fadeOut" data-position="left">
                                                    <a id="basicMegaMenu" class="nav-link u-header__nav-link "
                                                        href="{{ route('specific_category', $category->slug) }}"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                            <!-- End Nav Item MegaMenu-->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Basics Accordion -->
            </div>
        </div>
        <!-- End Vertical Menu -->
        <!-- Secondary Menu -->
        <div class="col">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <!-- Home -->
                        {{-- <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="click"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle text-sale" href="javascript:;" aria-haspopup="true" aria-expanded="false">Super Deals</a>

                            <!-- Home - Mega Menu -->
                            <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="homeMegaMenu">
                                <div class="row u-header__mega-menu-wrapper">
                                    <div class="col-md-3">
                                        <span class="u-header__sub-menu-title">Home & Static Pages</span>
                                        <ul class="u-header__sub-menu-nav-group">
                                            <li><a href="index.html" class="nav-link u-header__sub-menu-nav-link">Home v1</a></li>
                                            <li><a href="home-v2.html" class="nav-link u-header__sub-menu-nav-link">Home v2</a></li>
                                            <li><a href="home-v3.html" class="nav-link u-header__sub-menu-nav-link">Home v3</a></li>
                                            <li><a href="home-v3-full-color-bg.html" class="nav-link u-header__sub-menu-nav-link">Home v3.1</a></li>
                                            <li><a href="home-v4.html" class="nav-link u-header__sub-menu-nav-link">Home v4</a></li>
                                            <li><a href="home-v5.html" class="nav-link u-header__sub-menu-nav-link">Home v5</a></li>
                                            <li><a href="home-v6.html" class="nav-link u-header__sub-menu-nav-link">Home v6</a></li>
                                            <li><a href="home-v7.html" class="nav-link u-header__sub-menu-nav-link">Home v7</a></li>
                                            <li><a href="about.html" class="nav-link u-header__sub-menu-nav-link">About</a></li>
                                            <li><a href="contact-v1.html" class="nav-link u-header__sub-menu-nav-link">Contact v1</a></li>
                                            <li><a href="contact-v2.html" class="nav-link u-header__sub-menu-nav-link">Contact v2</a></li>
                                            <li><a href="faq.html" class="nav-link u-header__sub-menu-nav-link">FAQ</a></li>
                                            <li><a href="store-directory.html" class="nav-link u-header__sub-menu-nav-link">Store Directory</a></li>
                                            <li><a href="terms-and-conditions.html" class="nav-link u-header__sub-menu-nav-link">Terms and Conditions</a></li>
                                            <li><a href="404.html" class="nav-link u-header__sub-menu-nav-link">404</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="u-header__sub-menu-title">Shop Pages</span>
                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                            <li><a href="../shop/shop-grid.html" class="nav-link u-header__sub-menu-nav-link">Shop Grid</a></li>
                                            <li><a href="../shop/shop-grid-extended.html" class="nav-link u-header__sub-menu-nav-link">Shop Grid Extended</a></li>
                                            <li><a href="../shop/shop-list-view.html" class="nav-link u-header__sub-menu-nav-link">Shop List View</a></li>
                                            <li><a href="../shop/shop-list-view-small.html" class="nav-link u-header__sub-menu-nav-link">Shop List View Small</a></li>
                                            <li><a href="../shop/shop-left-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Shop Left Sidebar</a></li>
                                            <li><a href="../shop/shop-full-width.html" class="nav-link u-header__sub-menu-nav-link">Shop Full width</a></li>
                                            <li><a href="../shop/shop-right-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Shop Right Sidebar</a></li>
                                        </ul>
                                        <span class="u-header__sub-menu-title">Product Categories</span>
                                        <ul class="u-header__sub-menu-nav-group">
                                            <li><a href="../shop/product-categories-4-column-sidebar.html" class="nav-link u-header__sub-menu-nav-link">4 Column Sidebar</a></li>
                                            <li><a href="../shop/product-categories-5-column-sidebar.html" class="nav-link u-header__sub-menu-nav-link">5 Column Sidebar</a></li>
                                            <li><a href="../shop/product-categories-6-column-full-width.html" class="nav-link u-header__sub-menu-nav-link">6 Column Full width</a></li>
                                            <li><a href="../shop/product-categories-7-column-full-width.html" class="nav-link u-header__sub-menu-nav-link">7 Column Full width</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="u-header__sub-menu-title">Single Product Pages</span>
                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                            <li><a href="../shop/single-product-extended.html" class="nav-link u-header__sub-menu-nav-link">Single Product Extended</a></li>
                                            <li><a href="../shop/single-product-fullwidth.html" class="nav-link u-header__sub-menu-nav-link">Single Product Fullwidth</a></li>
                                            <li><a href="../shop/single-product-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Single Product Sidebar</a></li>
                                        </ul>
                                        <span class="u-header__sub-menu-title">Ecommerce Pages</span>
                                        <ul class="u-header__sub-menu-nav-group">
                                            <li><a href="../shop/shop.html" class="nav-link u-header__sub-menu-nav-link">Shop</a></li>
                                            <li><a href="../shop/cart.html" class="nav-link u-header__sub-menu-nav-link">Cart</a></li>
                                            <li><a href="../shop/checkout.html" class="nav-link u-header__sub-menu-nav-link">Checkout</a></li>
                                            <li><a href="../shop/my-account.html" class="nav-link u-header__sub-menu-nav-link">My Account</a></li>
                                            <li><a href="../shop/track-your-order.html" class="nav-link u-header__sub-menu-nav-link">Track your Order</a></li>
                                            <li><a href="../shop/compare.html" class="nav-link u-header__sub-menu-nav-link">Compare</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="u-header__sub-menu-title">Blog Pages</span>
                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                            <li><a href="../blog/blog-v1.html" class="nav-link u-header__sub-menu-nav-link">Blog v1</a></li>
                                            <li><a href="../blog/blog-v2.html" class="nav-link u-header__sub-menu-nav-link">Blog v2</a></li>
                                            <li><a href="../blog/blog-v3.html" class="nav-link u-header__sub-menu-nav-link">Blog v3</a></li>
                                            <li><a href="../blog/blog-full-width.html" class="nav-link u-header__sub-menu-nav-link">Blog Full Width</a></li>
                                            <li><a href="../blog/single-blog-post.html" class="nav-link u-header__sub-menu-nav-link">Single Blog Post</a></li>
                                        </ul>
                                        <span class="u-header__sub-menu-title">Shop Columns</span>
                                        <ul class="u-header__sub-menu-nav-group">
                                            <li><a href="../shop/shop-7-columns-full-width.html" class="nav-link u-header__sub-menu-nav-link">7 Column Full width</a></li>
                                            <li><a href="../shop/shop-6-columns-full-width.html" class="nav-link u-header__sub-menu-nav-link">6 Column Full width</a></li>
                                            <li><a href="../shop/shop-5-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">5 Column Sidebar</a></li>
                                            <li><a href="../shop/shop-4-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">4 Column Sidebar</a></li>
                                            <li><a href="../shop/shop-3-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">3 Column Sidebar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Home - Mega Menu -->
                        </li> --}}
                        <!-- End Home -->

                        <!-- Best Promotions -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true" aria-expanded="false"
                                aria-labelledby="pagesSubMenu">Best Promotions</a>
                        </li>
                        <!-- End Best Promotions -->

                        <!-- Recipes -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true" aria-expanded="false"
                                aria-labelledby="blogSubMenu">Recipes</a>
                        </li>
                        <!-- End Recipes -->

                        <!-- Shopping Lists -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="#" aria-haspopup="true"
                                aria-expanded="false">Shopping Lists</a>
                        </li>
                        <!-- End Shopping Lists -->

                        <!-- Button -->
                        {{-- <li class="nav-item u-header__nav-last-item">
                            <a class="text-gray-90" href="#" target="_blank">
                                Free Shipping on Orders $50+
                            </a>
                        </li> --}}
                        <!-- End Button -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
        <!-- End Secondary Menu -->
    </div>
</div>
