<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                @if(empty(\App\UserProfileModel::find(Auth::user()->id)->user_image))
                    <img src="{{url('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
                @else
                    <img src="{{\App\UserProfileModel::find(Auth::user()->id)->user_image}}" class="img-circle"
                         alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                @if(!empty(Auth::user()))
                    <p>{{ Auth::user()->name }}</p>
                @endif
                <a href="{{ route('admin.logout') }}"
                   style="text-align: center" class="btn btn-primary btn-sm btn-block center-block">
                    Đăng xuất
                </a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user()->type == 0 || Auth::user()->type == 1 || Auth::user()->type == 3)
                @if(Auth::user()->type == 0)
                    <li class="header">QUẢN LÝ KHÁCH HÀNG</li>
                @endif
                <li>
                    <a href="{{ route('kh.index') }}"><i class="fa fa-address-book"></i><span>Khách Hàng</span></a>
                </li>
            @endif
            @if(Auth::user()->type == 0 || Auth::user()->type == 1)
                @if(Auth::user()->type == 0)
                    <li class="header">QUẢN LÝ ĐƠN HÀNG</li>
                @endif
                <li>
                    <a href="{{ route('hoadon.create') }}"><i
                                class="fa fa-pencil-square-o"></i><span> Tạo hóa đơn</span></a>
                </li>
                <li>
                    <a href="{{route('hoadon.indexchuaduyet')}}"><i
                                class="fa fa-book"></i><span>Hóa đơn chưa duyệt</span></a>
                </li>
                <li>
                    <a href="{{route('hoadon.indexdaduyet')}}"><i
                                class="fa fa-bookmark"></i><span>Hóa đơn đã duyệt</span></a>
                </li>
            @endif
            @if(Auth::user()->type == 0 || Auth::user()->type == 1 || Auth::user()->type == 3)
                @if(Auth::user()->type == 0)
                    <li class="header">QUẢN LÝ HOA HỒNG</li>
                @endif
                <li>
                    <a href="{{ route('index') }}"><i class="fa fa-dollar"></i><span>Hoa hồng</span></a>
                </li>
                @if(Auth::user()->type == 0 || Auth::user()->type == 3)
                    <li>
                        <a href="{{ route('log_tra_tien') }}"><i class="fa fa-refresh"></i><span>Lịch sử hoa hồng</span></a>
                    </li>
                @endif
            @endif
            @if(Auth::user()->type == 0)
                <li class="header">QUẢN LÝ CẤP HOA HỒNG</li>
                <li>
                    <a href="{{ route('pc.index') }}"><i class="fa fa-dollar"></i><span>Phân cấp hoa hồng</span></a>
                </li>
                </li>
            @endif
            @if(Auth::user()->type == 0 || Auth::user()->type == 3)
                <li class="header">QUẢN LÝ CHI NHÁNH</li>
                @if(Auth::user()->type == 0)
                    <li>
                        <a href="{{ route('cn.index') }}"><i class="fa fa-home"></i><span>Chi nhánh</span></a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('nv.index') }}"><i class="fa fa-users"></i><span>Nhân viên chi nhánh</span></a>
                </li>
                <li>
                    <a href="{{ route('tien_chi_nhanh') }}"><i class="fa fa-dollar"></i><span>Tiền bánh chi nhánh</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-refresh"></i><span>Lịch sử thu tiền bánh</span></a>
                </li>
                <li>
                    <a href="{{ route('index') }}"><i class="fa fa-dollar"></i><span>Tiền chi hộ hoa hồng</span></a>
                </li>
            @endif
            @if(Auth::user()->type == 0)
                <li class="header">QUẢN LÝ BÁNH PIZZA</li>
                <li>
                    <a href="{{ route('banh.index') }}"><i class="fa fa-refresh"></i><span>Bánh Pizza</span></a>
                </li>
                <li>
                    <a href="{{ route('l.index') }}"><i class="fa fa-refresh"></i><span>Loại bánh</span></a>
                </li>
                <li>
                    <a href="{{ route('g.index') }}"><i class="fa fa-refresh"></i><span>Giá bánh</span></a>
                </li>
            @endif
        </ul>
    </section>
</aside>