<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{!! asset('admin/assets/img/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('admin/assets/img/logo/logo-white.png') !!}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{!! asset('admin/assets/img/favicon/favicon.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('admin/assets/img/logo/logo-white.png') !!}" alt="">
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

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Pages</span></li>

                <li class="nav-item"> <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="landing.php" class="nav-link" data-key="t-one-page"> One-page </a>
                            </li>
                            <li class="nav-item">
                                <a href="nft-landing.php" class="nav-link" data-key="t-nft-landing">  Nft-landing <span
                                        class="badge badge-pill bg-danger" data-key="t-new"> New</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Tours</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.php">
                        <i class="ri-honour-line"></i> <span>Widgets</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarForms">
                        <i class="ri-file-list-3-line"></i> <span>Packages</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="forms-elements.php" class="nav-link">View</a>
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