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
                        <!-- Best Promotions -->
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{route('best_promotions')}}" aria-haspopup="true" aria-expanded="false"
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
                            <a class="nav-link u-header__nav-link" href="{{route('shopping_lists')}}" aria-haspopup="true"
                               aria-expanded="false">Shopping Lists</a>
                        </li>
                        <!-- End Shopping Lists -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
        <!-- End Secondary Menu -->
    </div>
</div>
