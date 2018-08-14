<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>NNS</b></span>

        <span class="logo-lg">Pizza World</span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning have-badge"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Bạn có <span class="have-badge"></span> đơn hàng chưa duyệt</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="{{route('hoadon.indexchuaduyet')}}">
                                        <i class="fa fa-shopping-cart text-green"></i> Đến đơn hàng
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a onclick="getBadge()" class="btn"><i class="fa fa-refresh"></i> Tải lại</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>