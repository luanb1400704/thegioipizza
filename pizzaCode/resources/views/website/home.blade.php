@extends('website.index')
@section('content')
    {{--{{dd($banh)}}--}}
    <!-- Slide1 -->
    {{--@if(session('resgiter'))--}}
        {{--<script>--}}
            {{--swal("Chúc mừng !", "Bạn đã đăng ký thành công!", "success");--}}
        {{--</script>--}}
    {{--@endif--}}

    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1"
                     style="background-image: url({{url('patotheme/images/slide1-01.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="fadeInDown">
							Chào mừng
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            PIZZA WORLD
                         </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="#fast_register" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Đăng ký ngay
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1"
                     style="background-image: url({{url('patotheme/images/master-slides-02.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Dịch vụ khuyến mãi
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                            data-appear="lightSpeedIn">
                            Tích điểm đổi bánh
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                            <!-- Button1 -->
                            <a href="{{route('store/login')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Đăng nhập ngay
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1"
                     style="background-image: url({{url('patotheme/images/master-slides-01.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="rotateInDownLeft">
                            Dùng điểm tích lũy đổi bánh hoặc nhận lì xì cuối tháng
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                            data-appear="rotateInUpRight">
                            Đăng ký ngay
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                            <!-- Button1 -->
                            <a href="{{route('store/login')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Đăng nhập ngay
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- Welcome -->
    <section class="section-welcome bg1-pattern p-t-120 p-b-105">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Pizza World
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            Chương trình siêu khuyến mãi
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            Sau khi đăng ký tích lũy điểm, hằng tháng người dùng có thể dùng điểm tích lũy để đổi bánh
                            hoặc đổi lì xì hàng tháng
                        </p>
                        {{--Với kinh nghiệm nhiều năm chúng tối khám phá các công thức tương ngon cho bánh pizza, cùng nhiều hương vị kích cỡ khác nhau phù hợp với thị hiếu và nhu cầu của quý khách--}}

                        <a href="#" class="txt4">
                            Xem chi tiết
                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="{{url('patotheme/images/our-story-01.jpg')}}" alt="IMG-OUR">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="section-intro" id="thucdon">
        <div class="content-intro bg-white p-t-77 p-b-133">
            <div class="container">
                <div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Khám phá
				</span>

                    <h3 class="tit5 t-center m-t-2">
                        Thực đơn
                    </h3>
                </div>
                <div class="row p-t-108 p-b-70">
                    @foreach($banh as $key => $value)
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                {{--<a href="{{url('patotheme/images/blog-15.jpg')}}"--}}
                                <a href="{{$value->b_anh}}"
                                data-lightbox="gallery-home">
                                    <img src="{{$value->b_anh}}" alt="GALLERY">
                                    {{--<img src="{{url('patotheme/images/blog-15.jpg')}}" alt="GALLERY">--}}
                                </a>
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a href="#" class="txt21 m-b-3">
                                    {{$value->b_ten}}
                                </a>

                                <span class="txt23">
								<b>{!! $value->b_mota !!}</b>
							</span>
                                @foreach($value->loai as $type => $var)
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21 nns-home-loai">
                                        {{$var->l_ten}}({{$var->l_kichthuoc}})
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22 nns-home-gia">
                                        {{number_format($var->g_tien,0,",",".")}} VNĐ
                                    </div>
                                </div>
                                @endforeach
                                <span class="txt22 m-t-20 pizza-nns">
                                    {{--<a  class="txt4 btn-1">--}}
                                        {{--<i class="fa fa-star m-l-10" aria-hidden="true"></i>--}}
                                        {{--Xem--}}
                                    {{--</a>--}}
                                    @if(!empty(Auth::user()))
                                        <a  class="txt4 btn-2" data-toggle="modal" data-target="#modal{{$value->b_id}}" onclick="getHtml()">
                                            Mua
                                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a  class="txt4 btn-2" href="{{route('store/login')}}">
                                            Mua
                                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </span>
                                <div class="modal fade" id="modal{{$value->b_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <form action="{{route('store/order_pizza')}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="b_id" value="{{$value->b_id}}">

                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$value->b_ten}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-6">
                                                                <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                                                    <a href="{{url('patotheme/images/photo-gallery-18.jpg')}}"
                                                                       data-lightbox="gallery-home">
                                                                        <img src="{{url('patotheme/images/photo-gallery-18.jpg')}}"
                                                                             alt="GALLERY">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-3"></div>
                                                            <div class="col-12 text-center">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="text-center" scope="col">Loại</th>
                                                                        <th class="text-center" scope="col">Số lượng</th>
                                                                        <th class="text-center" scope="col">Đơn giá</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($value->loai as $type => $var)
                                                                        <tr>
                                                                            <th scope="row" class="text-center"><span
                                                                                        class="nns-home-loai">{{$var->l_ten}}</span>
                                                                            </th>
                                                                            <td>
                                                                                @if(isset($var->so_luong_mua))
                                                                                    <input class="number text-center" min="0"
                                                                                           type="number" placeholder="0"
                                                                                           name ="soluong[]"
                                                                                           value="{{$var->so_luong_mua}}"
                                                                                    >
                                                                                @else
                                                                                    <input class="number text-center" min="0"
                                                                                           type="number" placeholder="0"
                                                                                           name ="soluong[]"
                                                                                    >
                                                                                @endif
                                                                                <input hidden
                                                                                       type="number" placeholder="0"
                                                                                       name ="key[]"
                                                                                       value="{{$var->l_id}}"
                                                                                >
                                                                            </td>
                                                                            <td><span class="nns-home-gia text-center">{{number_format($var->g_tien,0,",",".")}} VND</span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Đặt hàng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    {{--<section class="section-event" id="khuyenmai">--}}
        {{--<div class="wrap-slick2">--}}
            {{--<div class="slick2">--}}
                {{--<div class="item-slick2 item1-slick2"--}}
                     {{--style="background-image: url({{url('patotheme/images/bg-event-01.jpg')}});">--}}
                    {{--<div class="wrap-content-slide2 p-t-115 p-b-208">--}}
                        {{--<div class="container">--}}
                            {{--<!-- - -->--}}
                            {{--<div class="title-event t-center m-b-52">--}}
								{{--<span class="tit2 p-l-15 p-r-15">--}}
									{{--Sự kiện--}}
								{{--</span>--}}

                                {{--<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">--}}
                                    {{--Khuyến mãi--}}
                                {{--</h3>--}}
                            {{--</div>--}}

                            {{--<!-- Block2 -->--}}
                            {{--<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"--}}
                                 {{--data-appear="zoomIn">--}}
                                {{--<!-- Pic block2 -->--}}
                                {{--<a href="#" class="wrap-pic-blo2 bg1-blo2"--}}
                                   {{--style="background-image: url({{url('patotheme/images/event-02.jpg')}});">--}}
                                    {{--<div class="time-event size10 txt6 effect1">--}}
										{{--<span class="txt-effect1 flex-c-m t-center">--}}
											{{--08:00 PM Tuesday - 21 November 2018--}}
										{{--</span>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                                {{--<!-- Text block2 -->--}}
                                {{--<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">--}}
                                    {{--<h4 class="tit7 t-center m-b-10">--}}
                                        {{--Wines during specific nights--}}
                                    {{--</h4>--}}

                                    {{--<p class="t-center">--}}
                                        {{--Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla,--}}
                                        {{--nunc sed imperdiet lacinia--}}
                                    {{--</p>--}}

                                    {{--<div class="flex-sa-m flex-w w-full m-t-40">--}}
                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 days">--}}
												{{--25--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Days--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 hours">--}}
												{{--12--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Hours--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 minutes">--}}
												{{--59--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Minutes--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 seconds">--}}
												{{--56--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Seconds--}}
											{{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<a href="#" class="txt4 m-t-40">--}}
                                        {{--View Details--}}
                                        {{--<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="item-slick2 item2-slick2"--}}
                     {{--style="background-image: url({{url('patotheme/images/bg-event-02.jpg')}});">--}}
                    {{--<div class="wrap-content-slide2 p-t-115 p-b-208">--}}
                        {{--<div class="container">--}}
                            {{--<!-- - -->--}}
                            {{--<div class="title-event t-center m-b-52">--}}
								{{--<span class="tit2 p-l-15 p-r-15">--}}
									{{--Sự kiện--}}
								{{--</span>--}}

                                {{--<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">--}}
                                    {{--Sự kiện--}}
                                {{--</h3>--}}
                            {{--</div>--}}

                            {{--<!-- Block2 -->--}}
                            {{--<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"--}}
                                 {{--data-appear="fadeInDown">--}}
                                {{--<!-- Pic block2 -->--}}
                                {{--<a href="#" class="wrap-pic-blo2 bg2-blo2"--}}
                                   {{--style="background-image: url({{url('patotheme/images/event-06.jpg')}});">--}}
                                    {{--<div class="time-event size10 txt6 effect1">--}}
										{{--<span class="txt-effect1 flex-c-m">--}}
											{{--08:00 PM Tuesday - 21 November 2018--}}
										{{--</span>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                                {{--<!-- Text block2 -->--}}
                                {{--<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">--}}
                                    {{--<h4 class="tit7 t-center m-b-10">--}}
                                        {{--Wines during specific nights--}}
                                    {{--</h4>--}}

                                    {{--<p class="t-center">--}}
                                        {{--Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla,--}}
                                        {{--nunc sed imperdiet lacinia--}}
                                    {{--</p>--}}

                                    {{--<div class="flex-sa-m flex-w w-full m-t-40">--}}
                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 days">--}}
												{{--25--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Days--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 hours">--}}
												{{--12--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Hours--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 minutes">--}}
												{{--59--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Minutes--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 seconds">--}}
												{{--56--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Seconds--}}
											{{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<a href="#" class="txt4 m-t-40">--}}
                                        {{--View Details--}}
                                        {{--<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="item-slick2 item3-slick2"--}}
                     {{--style="background-image: url({{url('patotheme/images/bg-event-04.jpg')}});">--}}
                    {{--<div class="wrap-content-slide2 p-t-115 p-b-208">--}}
                        {{--<div class="container">--}}
                            {{--<!-- - -->--}}
                            {{--<div class="title-event t-center m-b-52">--}}
								{{--<span class="tit2 p-l-15 p-r-15">--}}
									{{--Sự kiện--}}
								{{--</span>--}}

                                {{--<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">--}}
                                    {{--Sự kiện khai trương tưng bừng--}}
                                {{--</h3>--}}
                            {{--</div>--}}

                            {{--<!-- Block2 -->--}}
                            {{--<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"--}}
                                 {{--data-appear="rotateInUpLeft">--}}
                                {{--<!-- Pic block2 -->--}}
                                {{--<a href="#" class="wrap-pic-blo2 bg3-blo2"--}}
                                   {{--style="background-image: url({{url('patotheme/images/event-01.jpg')}});">--}}
                                    {{--<div class="time-event size10 txt6 effect1">--}}
										{{--<span class="txt-effect1 flex-c-m">--}}
											{{--08:00 AM đến 09:00 PM - Tháng 7 2018--}}
										{{--</span>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                                {{--<!-- Text block2 -->--}}
                                {{--<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">--}}
                                    {{--<h4 class="tit7 t-center m-b-10">--}}
                                        {{--Mừng khai trương website--}}
                                    {{--</h4>--}}

                                    {{--<p class="t-center">--}}
                                        {{--Chương trình áp dụng từ 08:00 AM đến 09:00 PM - Tháng 7 2018. Khách hàng yêu mến--}}
                                        {{--và ủng hộ Pizzaworld sẽ được nhận khuyến mãi mua 3 tặng 1. <br>--}}
                                        {{--Thời gian khuyến mãi còn lại.--}}
                                    {{--</p>--}}

                                    {{--<div class="flex-sa-m flex-w w-full m-t-40">--}}
                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 days">--}}
												{{--25--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Ngày--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 hours">--}}
												{{--12--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Giờ--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 minutes">--}}
												{{--59--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Phút--}}
											{{--</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="size11 flex-col-c-m">--}}
											{{--<span class="dis-block t-center txt7 m-b-2 seconds">--}}
												{{--16--}}
											{{--</span>--}}

                                            {{--<span class="dis-block t-center txt8">--}}
												{{--Giây--}}
											{{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<a href="#" class="txt4 m-t-40">--}}
                                        {{--View Details--}}
                                        {{--<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="wrap-slick2-dots"></div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- Video -->
    {{--<section class="section-video parallax100"--}}
             {{--style="background-image: url({{url('patotheme/images/bg-cover-video-02.jpg')}});">--}}
        {{--<div class="content-video t-center p-t-225 p-b-250">--}}
			{{--<span class="tit2 p-l-15 p-r-15">--}}
				{{--Giới thiệu--}}
			{{--</span>--}}

            {{--<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">--}}
                {{--Xem video--}}
            {{--</h3>--}}

            {{--<div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal"--}}
                 {{--data-target="#modal-video-01">--}}
                {{--<div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">--}}
                    {{--<i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <!-- Review -->
    <section class="section-review p-t-115" id="gioithieu">
        <!-- - -->
        <div class="title-review t-center m-b-2">
			<span class="tit2 p-l-15 p-r-15">
				Nhà sáng lập
			</span>

            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                Trần Hoàng Nam
            </h3>
        </div>

        <!-- - -->
        <div class="wrap-slick3">
            <div class="slick3">
                <div class="item-slick3 item1-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false"
                                 data-appear="zoomIn">
                                <img src="{{url('patotheme/images/avatar-01.jpg')}}" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “ Với kinh nghiệm nhiều năm làm bánh pizza tôi muốn xây dựng một hệ thống chuỗi cửa
                                    hàng và website mà ở đó quyền lợi người dùng là trên hết, chúng tôi luôn quan tâm và
                                    biết ơn các bạn. Vì vậy, tôi hi vọng hệ thống và các chương trình của chúng tôi sẽ
                                    mang lại nhiều lợi ích hơn nửa cho các khách hàng thân thuộc và gắng bó lâu dày với
                                    chúng tôi trong thời gian qua, cũng như các khách hàng mới đã tin tưởng lựa chọn
                                    chúng tôi. ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                    {{--<div class="more-review txt4 t-center animated visible-false m-t-32"--}}
                                         {{--data-appear="fadeInUp">--}}
                                        {{--Xem chi tiết--}}
                                    {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick3-dots m-t-30"></div>
        </div>
    </section>
    <section class="section-booking bg1-pattern p-t-100 p-b-110" id="fast_register">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 p-b-15 p-t-9"></div>
                <div class="col-lg-6 p-b-30">
                    <div class="t-center">
						<span class="tit2 t-center">
							Tham gia chương trình ăn bánh tích điểm đổi bánh hoặc nhận lì xì hàng tháng
						</span>
                        <h3 class="tit3 t-center m-b-35 m-t-2">Đăng ký nhanh</h3>
                    </div>
                    <form  class="wrap-form-booking" method="post" action="{{route('customer/fast_register')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="txt9">Họ tên (*)</span>
                                <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" required value="{{old('name')}}">
                                </div>
                                <span class="txt9">SĐT (*)</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone" value="{{old('phone')}}" placeholder="Phone" required>
                                </div>
                                <span class="txt9">SĐT người giới thiệu</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone_introduce" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="txt9">Mật khẩu (*)</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="Password" required>
                                </div>
                                <span class="txt9">Nhập lại mật khẩu (*)</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="repassword" placeholder="Confirm" required>
                                </div>
                                <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">Xác nhận</button>
                                <br>
                                <a href="{{route('store/fast_register')}}" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">Thực hiện lại</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 p-b-15 p-t-9"></div>
            </div>
        </div>
    </section>



    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    {{--<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">--}}

        {{--<div class="modal-dialog" role="document" data-dismiss="modal">--}}
            {{--<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>--}}

            {{--<div class="wrap-video-mo-01">--}}
                {{--<div class="w-full wrap-pic-w op-0-0">--}}
                    {{--<img src="{{url('patotheme/images/icons/video-16-9.jpg')}}" alt="IMG"/>--}}
                {{--</div>--}}
                {{--<div class="video-mo-01">--}}
                    {{--<iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0"--}}
                            {{--allowfullscreen></iframe>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <script>

    </script>
    <!-- Modal -->

@endsection