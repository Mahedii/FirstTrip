<header class="main-header clearfix">

    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper clearfix">
            <div class="container clearfix">
                <div class="main-menu-wrapper-inner clearfix">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <a href="{{ route('home') }}"><img src="{{asset('frontend/assets/images/resources/logo-1.png')}}" alt=""></a>
                        </div>
                        <div class="main-menu-wrapper__main-menu">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="dropdown current">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Destinations</a>
                                    <ul>
                                        <li><a href="{{ route('destination') }}">Destinations</a></li>
                                        <li><a href="{{ route('destination.detail') }}">Destinations Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Tours</a>
                                    <ul>
                                        <li><a href="{{ route('tours') }}">Tours</a></li>
                                        <li><a href="{{ route('tours.list') }}">Tours List</a></li>
                                        <li><a href="{{ route('tour.details') }}">Tours Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>
