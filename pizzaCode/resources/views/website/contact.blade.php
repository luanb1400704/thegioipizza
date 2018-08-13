@extends('website.index')

@section('content')
    <!-- Contact form -->
    <section class="section-chef bgwhite p-t-115">
        <div class="container t-center">
			<span class="tit2 t-center">
				Thông tin chi tiết
			</span>

            <h3 class="tit5 t-center m-b-50 m-t-5">
                {{Auth::user()->name}}
            </h3>

            <div class="row">
                <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">

                </div>

                <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
                    <!-- -Block5 -->
                    <div class="blo5 pos-relative p-t-60">
                        <div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
                            <a href="#"><img src="{{$customer->customer_image}}" alt="IGM-AVATAR"></a>
                        </div>

                        <div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
                            <a href="#" class="txt34 dis-block p-b-6">
                                {{--{{date("Y-m-d",strtotime($customer->customer_birthday))}}--}}
                            </a>

                            <span class="dis-block t-center txt35 p-b-25">
                                @if($customer->customer_gender==1)
                                    <b>Nam</b>
                                @endif
                                @if($customer->customer_gender==0)
                                    <b>Nữ</b>
                                @endif
							</span>

                            <p class="t-center">
                                SĐT: <b>{{Auth::user()->phone}}</b> <br>
                                <b>{{$customer->customer_address}}</b><br>
                                Email: <b>{{Auth::user()->email}}</b> <br>
                                Người giới thiệu: <b>{{Auth::user()->phone}}</b><br>
                                Số dư hiện tại
                            </p>
                            <a href="#" class="btn-success flex-c-m size13 txt11 trans-0-4 m-l-r-auto">{{$hoahong->tien_hoa_hong}} VNĐ</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">

                </div>
            </div>
        </div>
    </section>

    <section class="section-mainmenu p-t-22 p-b-70 bg1-pattern">
        <div class="container">
            <div class="row p-b-70">
                <p class="t-center txt12 size15 m-l-r-auto text-danger bg-white p-t-10 p-l-20 p-r-20">
                    “ Xin chào , hãy chú ý phần tích lũy của bạn <br>
                    Các phần này có thể quy đổi sang tiền lì xì hoặc đổi lấy bánh pizza từ cửa hàng<br>
                    Hãy đến cửa hàng của chúng tôi để nhận lì xì hoặc nhận bánh tương đương giá trị điểm <br>
                    <b>Mỗi lần bạn mua pizza, hoặc những người bạn giới thiệu vào hệ thống mua pizza, bạn sẽ được tích lũy một tỉ lệ điểm xem như phần thưởng cho sự ủng hộ và quảng bá của bạn với hệ thống của chúng tôi.</b><br>

                    ĐIỀU KIỆN NHẬN LÌ XÌ TỪ TÍCH LŨY<br>

                    <b>Điều kiện 1: </b> Ít nhất bạn có mua pizza tại hệ thống của chúng tôi 1 lần trong 30 ngày gần đây. Nếu trong 30 ngày gần nhất bạn chưa mua chiếc pizza nào hãy đến ngay cửa hàng mua bánh trước để đạt điều kiện và nhận thưởng sau đó.   <br>

                    <b>Điều kiện 2: </b>

                    Bạn có thể tích lũy đến khi nào nhận lì xì cũng đều được ( <b>Số tiền luôn tích lũy và không bị trừ</b> ), tuy nhiên để tránh việc dồn quá nhiều người cùng nhận thưởng vào cuối tháng, chúng tôi đề xuất bạn hãy đến trong 3 sau ngày sinh của bạn hàng tháng.<br>
                    Ví dụ: bạn sinh ngày 16/01, hãy đến cửa hàng vào các ngày 17, 18 hoặc 19 bất kỳ tháng nào để được nhận <b>100%</b> phần thưởng. Nếu đến không 3 ngày này bạn sẽ bị trừ <b>15%</b> số được lãnh nếu lãnh trái ngày.<br>
                    <b>LƯU Ý: <br>
                        - Chỉ cần đạt 2 điều kiện trên bạn có thể nhận tích lũy của mình bằng tiền mặt hoặc đổi bánh pizza.<br>
                        - Bạn không phải trả bất kỳ phí phụ thu nào (nếu có bất kỳ nhân viên nào yêu cầu phụ thu hãy thông báo ngay cho chủ cửa hàng).<br>
                        CẢM ƠN QUÝ KHÁCH ĐÃ ỦNG HỘ !!!</b>

                    ”
                </p>
            </div>
            <div class="row">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Lịch sử mua hàng
                        </h3>

                        <!-- Item mainmenu -->
                        @if(sizeof($hoadon)!=0)
                            @foreach($hoadon as $key => $value)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        Ngày {{$value->created_at}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        {{$value->tong_tien_hoa_don}} VNĐ
                                    </div>
                                </div>
                                @foreach($value['chitiet'] as $key2 => $value2)
                                    <div class="flex-w flex-b m-b-3">
                                        <a href="#" class="name-item-mainmenu txt21 lichsu">
                                            <b>{{$value2->so_luong_mua}}  - {{$value2->b_ten}}</b>
                                        </a>

                                        <div class="line-item-mainmenu bg3-pattern"></div>

                                        <div class="price-item-mainmenu txt22 lichsu">
                                            {{$value2->g_tien}} VNĐ / Cái
                                        </div>
                                    </div>
                                @endforeach
                                {{--<div class="flex-w flex-b m-b-3">--}}
                                    {{--<a href="#" class="name-item-mainmenu txt21 lichsu">--}}
                                        {{--<b>15  - Pizza Hải Sản</b>--}}
                                    {{--</a>--}}

                                    {{--<div class="line-item-mainmenu bg3-pattern"></div>--}}

                                    {{--<div class="price-item-mainmenu txt22 lichsu">--}}
                                        {{--30.000 VNĐ / Cái--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="flex-w flex-b m-b-3">--}}
                                    {{--<a href="#" class="name-item-mainmenu txt21 lichsu">--}}
                                        {{--<b>15  - Pizza Hải Sản</b>--}}
                                    {{--</a>--}}

                                    {{--<div class="line-item-mainmenu bg3-pattern"></div>--}}

                                    {{--<div class="price-item-mainmenu txt22 lichsu">--}}
                                        {{--30.000 VNĐ / Cái--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <hr>
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21 lichsu">
                                        <b>Tích lũy hiện tại</b>
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22 lichsu">
                                        {{$hoahong->tien_hoa_hong}} VNĐ
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        @else
                            <div class="row p-b-70">
                                <p class="t-center txt12 size15 m-l-r-auto text-danger bg-white p-t-10 p-l-20 p-r-20">
                                    Danh sách rỗng
                                </p>
                            </div>
                        @endif

                    </div>

                </div>
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Lịch sử nhận tích lũy
                        </h3>

                        @if(sizeof($nhantien)!=0)
                            @foreach($nhantien as $keynt => $valuent)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{--Ngày {{date("Y-m-d", strtotime($valuent->ngay_tra)}}--}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        {{$valuent->so_tien_da_tra }} VNĐ
                                    </div>
                                </div>
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21 lichsu">
                                        <b>Nhân viên chi</b>
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22 lichsu">
                                        {{$valuent->name}}
                                    </div>
                                </div>


                                <hr>
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21 lichsu">
                                        <b>Tổng số tích lũy đã nhận từ khi tham gia</b>
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22 lichsu">
                                        {{$$tongtichluy->tien_da_lanh}} VNĐ
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        @else
                            <div class="row p-b-70">
                                <p class="t-center txt12 size15 m-l-r-auto text-danger bg-white p-t-10 p-l-20 p-r-20">
                                    Danh sách rỗng
                                </p>
                            </div>
                        @endif

                    </div>

                </div>
            </div>

        </div>
    </section>


@endsection