<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{!! asset('frontend/assets/img/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('frontend/assets/img/logo/logo-white.png') !!}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{!! asset('frontend/assets/img/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('frontend/assets/img/logo/logo-white.png') !!}" alt="">
            </span>
        </a>


        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>

    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >Components</span></li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="mdi mdi-account-circle-outline"></i> <span >Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignIn" >Signin
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic.php" class="nav-link" >Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover.php" class="nav-link" >Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarSignUp" >Signup
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signup-basic.php" class="nav-link" >Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signup-cover.php" class="nav-link" >Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarResetPass" >Password Reset
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarResetPass">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-basic.php" class="nav-link" >Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-cover.php" class="nav-link" >Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li> -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span >Users</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="mdi mdi-account-circle-outline"></i> <span >User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="{{ route('add.user') }}" class="nav-link">Add User</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('user.lists') }}" class="nav-link">User Lists</a>
                            </li>


                        </ul>
                    </div>
                </li>

                @can('is-super-admin')

                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span >Role</span></li> -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#userRole" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="userRole">
                        <i class="mdi mdi-account-circle-outline"></i> <span >Role Permission</span>
                    </a>
                    <div class="collapse menu-dropdown" id="userRole">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">Manage Role</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link">New Role</a>
                            </li>

                        </ul>
                    </div>
                </li>
                
                @endcan


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Website Setup</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#headerFooter" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="headerFooter">
                        <i class="mdi mdi-cube-outline"></i> <span >Header-Footer</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="headerFooter">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('header.section.data') }}" class="nav-link" >Header</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('footer.section.data') }}" class="nav-link" >Footer</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#metaTitle" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="metaTitle">
                        <i class="mdi mdi-format-title"></i> <span >Meta Titles</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="metaTitle">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('meta.title.list.data') }}">Meta Titles</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#socialMedia" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="socialMedia">
                        <i class="mdi mdi-share-variant-outline"></i> <span >Social Media</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="socialMedia">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('social.media.list.data') }}">Social Media</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Subscriptions</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#newsletter" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="newsletter">
                        <i class="mdi mdi-email-newsletter"></i> <span >Newsletter</span>
                    </a>
                    <div class="collapse menu-dropdown" id="newsletter">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="{{ route('newsletter.list.data') }}" class="nav-link">List</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Pages Setup</span></li>

                <!-- Home Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#homePageSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="homePageSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Home Page</span>
                    </a>
                    <div class="collapse menu-dropdown" id="homePageSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('hero.section.data') }}" class="nav-link">Hero Section</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('about.us.section.data') }}" class="nav-link">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('our.services.data') }}" class="nav-link">Our Services</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('statistics.data') }}" class="nav-link">Statistics</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('our.customers.data') }}" class="nav-link">Our Customers</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('addon.services.data') }}" class="nav-link">Addon Services</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <!-- About Us Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#aboutUsPageSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="aboutUsPageSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >About Us Page</span>
                    </a>
                    <div class="collapse menu-dropdown" id="aboutUsPageSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('about.page.section.data') }}" class="nav-link">About Section</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <!-- Our Services Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#servicePageSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="servicePageSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Service Page</span>
                    </a>
                    <div class="collapse menu-dropdown" id="servicePageSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('service.page.section.data') }}" class="nav-link">Services Section</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <!-- Products Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#productPageSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="productPageSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Product Page</span>
                    </a>
                    <div class="collapse menu-dropdown" id="productPageSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('product.category.lists') }}" class="nav-link">Category</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('product.subcategory.lists') }}" class="nav-link">SubCategory</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('product.lists.page') }}" class="nav-link">Products</a>
                            </li>


                        </ul>
                    </div>
                </li>

                <!-- Contact Us Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#contactPageSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="contactPageSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Contact Page</span>
                    </a>
                    <div class="collapse menu-dropdown" id="contactPageSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('contact.page.section.data') }}" class="nav-link">Contact Section</a>
                            </li>


                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>