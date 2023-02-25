<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{!! asset('frontend/assets/img/logo/logo-sm.png') !!}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{!! asset('frontend/assets/img/logo/logo-white.png') !!}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{!! asset('frontend/assets/img/logo/logo-sm.png') !!}" alt="" height="22">
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

                @can('is-admin')

                <li class="menu-title"><i class="ri-more-fill"></i> <span >Role</span></li>

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



                <li class="menu-title"><i class="ri-more-fill"></i> <span >Purchase Order</span></li>

                <!-- Purchase Order Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#poSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="poSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >PO</span>
                    </a>
                    <div class="collapse menu-dropdown" id="poSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('po.add') }}" class="nav-link">New PO</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('po.lists') }}" class="nav-link">PO List</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <!-- Bills Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#billSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="billSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Bills</span>
                    </a>
                    <div class="collapse menu-dropdown" id="billSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('bill.lists') }}" class="nav-link">Bill List</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Tender</span></li>

                <!-- Tender Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#tenderSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="tenderSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Tender</span>
                    </a>
                    <div class="collapse menu-dropdown" id="tenderSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('tender.info.lists') }}" class="nav-link">Tender Info</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('tender.bill.lists') }}" class="nav-link">Tender Bill</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Customers</span></li>


                <!-- Customers Page -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#customersSetup" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="customersSetup">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Customer</span>
                    </a>
                    <div class="collapse menu-dropdown" id="customersSetup">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('customer.add') }}" class="nav-link">Add Customer</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('customer.lists') }}" class="nav-link">Customer List</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span >Backup</span></li>


                <!-- Backup Page -->

                <li class="nav-item">
                    <a href="{{ route('backup.database') }}" class="nav-link">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Database Backup</span>
                    </a>
                </li>


                <!-- To Do Page -->

                <li class="nav-item">
                    <a href="{{ route('todo.list') }}" class="nav-link">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >To Do</span>
                    </a>
                </li>


                <!-- Log Page -->

                <li class="nav-item">
                    <a href="{{ route('activity.log') }}" class="nav-link">
                        <i class="mdi mdi-sticker-text-outline"></i> <span >Activity Log</span>
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