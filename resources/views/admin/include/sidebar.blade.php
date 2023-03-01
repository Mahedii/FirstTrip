<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{!! asset('admin/assets/images/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('admin/assets/images/logo/logo-white.png') !!}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{!! asset('admin/assets/images/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('admin/assets/images/logo/logo-white.png') !!}" alt="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

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



                <li class="menu-title"><i class="ri-more-fill"></i> <span>Destinations</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDestination" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDestination">
                        <i class="ri-file-list-3-line"></i> <span>Countries</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDestination">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('destination.country.lists') }}" class="nav-link">View</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('load.destination.country.storepage') }}" class="nav-link">Add</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Packages</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPackage" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPackage">
                        <i class="ri-file-list-3-line"></i> <span>Tours</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPackage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('tour.package.lists') }}" class="nav-link">View</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('load.tourPackage.storepage') }}" class="nav-link">Add</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span>Booking Information</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBooking" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBooking">
                        <i class="ri-file-list-3-line"></i> <span>Bookings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBooking">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('bookings.show') }}" class="nav-link">View</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span>Web Pages</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarHomePage" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarHomePage">
                        <i class="ri-file-list-3-line"></i> <span>Home</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarHomePage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('heroSection.show') }}" class="nav-link">Hero Section</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('airlinePartners.show') }}" class="nav-link">Key Airline Partners</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aboutSectionOne.show') }}" class="nav-link">About Section 01</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('aboutSectionTwo.show') }}" class="nav-link">About Section 02</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about-us.load') }}">
                        <i class="ri-file-list-3-line"></i> <span>About Us</span>
                    </a>
                    <a class="nav-link" href="{{ route('faq.load') }}">
                        <i class="ri-file-list-3-line"></i> <span>FAQs</span>
                    </a>
                    <a class="nav-link" href="{{ route('terms-condition.load') }}">
                        <i class="ri-file-list-3-line"></i> <span>Terms & Conditions</span>
                    </a>
                    <a class="nav-link" href="{{ route('privacy-policy.load') }}">
                        <i class="ri-file-list-3-line"></i> <span>Privacy Policy</span>
                    </a>
                    <a class="nav-link" href="{{ route('refund-policy.load') }}">
                        <i class="ri-file-list-3-line"></i> <span>Refund Policy</span>
                    </a>

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
