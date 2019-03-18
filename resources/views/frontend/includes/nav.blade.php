<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
            <a href="{{ route('frontend.index') }}"><img src="{{ asset('img/logo.png') }}" alt="{{ app_name() }}" title="{{ app_name() }}" /></a>
            </div>
            <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                @if(config('locale.status') && count(config('locale.languages')) > 1)
                <li class="menu-has-children">
                    <a href="#">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>
                    @include('includes.partials.lang')
                </li>
                @endif
                @auth
                <li><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">Bảng điều khiển</a></li>
                @endauth
                @guest
                <li><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">Đăng nhập</a></li>

                @if(config('access.registration'))
                    <li><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">Đăng ký</a></li>
                @endif
                @else
                    <li class="menu-has-children">
                        <a href="#">{{ $logged_in_user->name }}</a>
                        <ul>
                            @can('view backend')
                                <li><a href="{{ route('admin.dashboard') }}" class="dropdown-item">Quản trị</a></li>
                            @endcan

                            <li><a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">Trang cá nhân</a></li>
                            <li><a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">Đăng xuất</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
            </nav><!-- #nav-menu-container -->		    		
        </div>
    </div>
    </header><!-- #header -->