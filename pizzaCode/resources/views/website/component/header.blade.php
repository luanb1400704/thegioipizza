
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="#">
                        <img src="{{url('patotheme/images/icons/logo.png')}}" alt="IMG-LOGO" data-logofixed="{{url('patotheme/images/icons/logo2.png')}}">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="{{route('store/get_home')}}">TRANG CHỦ</a>
                            </li>

                            <li>
                                <a href="{{route('store/get_home')}}#thucdon">THỰC ĐƠN</a>
                            </li>

                            <li>
                                <a href="{{route('store/get_home')}}#gioithieu">GIỚI THIỆU</a>
                            </li>

                            <li>
                                <a href="{{route('store/get_contact')}}" class=" giobanh-nns">TÍCH LŨY</a>
                            </li>

                            <li>
                                <a href="{{route('store/order')}}" class=" giobanh-nns">GIỎ BÁNH</a>
                            </li>

                            <li>
                                <a href="{{route('store/login')}}" class=" giobanh-nns">ĐĂNG NHẬP</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}">Đăng xuất &nbsp<i class="fa fa-sign-out"></i></a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-envelope m-l-21" aria-hidden="true"></i></a>

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>