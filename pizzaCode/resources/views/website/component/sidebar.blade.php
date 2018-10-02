<aside class="sidebar trans-0-4" id="mobile-menu-nss">
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4" id="close-btn-nss"></button>
    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <a href="{{route('store/get_home')}}" class="txt19">TRANG CHỦ</a>
        </li>
        <li class="t-center m-b-13 close-nss">
            <a href="{{route('store/get_home')}}#thucdon" class="txt19">THỰC ĐƠN</a>
        </li>
        <li class="t-center m-b-13 close-nss">
            <a href="{{route('store/get_home')}}#gioithieu" class="txt19">GIỚI THIỆU</a>
        </li>
        <li class="t-center m-b-13">
            <a href="{{route('store/get_contact')}}" class="btn-danger flex-c-m size13 txt11 trans-0-4 m-l-r-auto">CÁ NHÂN</a>
        </li>
        <li class="t-center m-b-33">
            <a href="{{route('store/order')}}" class="btn-success flex-c-m size13 txt11 trans-0-4 m-l-r-auto">GIỎ BÁNH</a>
        </li>
        @if(!empty(Auth::user()))
            <li class="t-center m-b-13 close-nss">
                <a href="{{ route('admin.logout') }}" class="txt19">Đăng xuất &nbsp<i class="fa fa-sign-out"></i></a>
            </li>
        @else
            <li class="t-center m-b-13">
                <a href="{{route('store/login')}}" class="btn-danger flex-c-m size13 txt11 trans-0-4 m-l-r-auto">ĐĂNG NHẬP</a>
            </li>
            <li class="t-center m-b-13">
                <a href="{{route('store/login')}}" class="btn-danger flex-c-m size13 txt11 trans-0-4 m-l-r-auto">ĐĂNG KÝ</a>
            </li>
        @endif
    </ul>
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <h4 class="txt20 m-b-33">THƯ VIỆN</h4>
        <div class="wrap-gallery-sidebar flex-w">
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-01.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-01.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-02.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-02.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-03.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-03.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-05.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-05.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-06.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-06.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-07.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-07.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-09.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-09.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-10.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-10.jpg')}}" alt="GALLERY">
            </a>
            <a class="item-gallery-sidebar wrap-pic-w" href="{{url('patotheme/images/photo-gallery-11.jpg')}}"
               data-lightbox="gallery-footer">
                <img src="{{url('patotheme/images/photo-gallery-thumb-11.jpg')}}" alt="GALLERY">
            </a>
        </div>
    </div>
</aside>
