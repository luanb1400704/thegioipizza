<header>
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <div class="logo">
                    <a href="{{ url('store/home') }}">
                        <img src="{{url('patotheme/images/icons/logo.png')}}" alt="IMG-LOGO"
                             data-logofixed="{{url('patotheme/images/icons/logo2.png')}}">
                    </a>
                </div>
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li {!! (Request::is('store/home') ? '' : '') !!}>
                                <a href="{{route('store/get_home')}}">TRANG CHỦ</a>
                            </li>
                            <li {!! (Request::is('store/home/*') ? 'class="giobanh-nns"' : '') !!}>
                                <a href="{{route('store/get_home')}}#thucdon">THỰC ĐƠN</a>
                            </li>
                            <li>
                                <a href="{{route('store/get_home')}}#gioithieu">GIỚI THIỆU</a>
                            </li>
                            @if(!empty(Auth::user()) && Auth::user()->type==2)
                                <li>
                                    <a href="{{route('store/order')}}" class=" giobanh-nns">GIỎ BÁNH</a>
                                </li>
                            @endif
                            @if(empty(Auth::user()))
                                <li {!! (Request::is('store/login') ? 'class="giobanh-nns"' : '') !!}>
                                    <a href="{{route('store/login')}}">ĐĂNG NHẬP</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('admin.logout') }}">Đăng xuất &nbsp<i class="fa fa-sign-out"></i></a>
                                </li>
                            @endif
                            @if(empty(Auth::user()))
                                <li {!! (Request::is('store/login') ? 'class="giobanh-nns"' : '') !!}>
                                    <a href="{{route('store/get_home')}}#fast_register" class="giobanh-nns">ĐĂNG KÝ</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('store/get_contact')}}">{{Auth::user()->name}}</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="social flex-w flex-l-m p-r-20">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a target="_blank" href="{{ url('https://www.facebook.com/thegioipizza/') }}"><i
                                class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-envelope m-l-21" aria-hidden="true"></i></a>
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>