@extends('website.index')
@section('content')
    <!-- Reservation -->
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-30">
                    <div class="t-center">
						<span class="tit2 t-center">
							Giỏ hàng của bạn
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Các loại bánh
                        </h3>
                    </div>
                </div>
            </div>
            @if(isset($hoadon))
            <form action="{{route('store/order_success')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="hoadon" value="{{$hoadon->hd_id}}">
                <div class="row ">
                    @foreach($hoadonchitiet as $key => $value)
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <a href="{{url('patotheme/images/blog-06.jpg')}}"
                                   data-lightbox="gallery-home">
                                    <img src="{{url('patotheme/images/blog-06.jpg')}}" alt="GALLERY">
                                </a>
                                <a class="delete-icon-nns" href="{{route('store/order_remove',[$value->hdct_id])}}"><i class="fa fa-trash"></i></a>

                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a  class="txt21 m-b-3">
                                    <span>{{$value->b_ten}}</span>

                                </a>
                                <span class="txt23">
                                <b>Loại bánh &nbsp; &nbsp;&nbsp; : {{$value->l_ten}} ({{$value->l_kichthuoc}})</b>
                                </span>
                                <span class="txt23">
                                <b>Đơn giá &nbsp; &nbsp;&nbsp;&nbsp; : {{$value->g_tien}} VNĐ </b>
                                </span>
                                <span class="txt23">
                                <b>Thành tiền &nbsp;: <span id="thanhtien{{$value->thanh_tien}}">{{$value->thanh_tien}}</span> VNĐ </b>
                                </span>

                                <span class="txt22 m-t-20 group-input-nns">
                                    <button  type="button" class="txt4 btn-1" onclick="change('input{{$value->hdct_id}}',-1,'thanhtien{{$value->thanh_tien}}',{{$value->g_tien}})">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </button>
                                    <input type="number" name ="soluong[]" id="input{{$value->hdct_id}}" class="soluong-nns" value="{{$value->so_luong_mua}}" readonly>
                                    <input hidden
                                           type="number" placeholder="0"
                                           name ="l_id[]"
                                           value="{{$value->l_id}}"
                                    >
                                    <input type="hidden" name="b_id[]" value="{{$value->b_id}}">
                                    <input type="hidden" name="hdct_id[]" value="{{$value->hdct_id}}">



                                    <button type="button" class="txt4 btn-2" onclick="change('input{{$value->hdct_id}}',1,'thanhtien{{$value->thanh_tien}}',{{$value->g_tien}})">
                                        <i class="fa fa-plus-circle m-l-10" aria-hidden="true"></i>
                                    </button>

                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="wrap-form-booking">
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Thanh toán
                        </button>
                    </div>
                </div>
            </form>
            @else
                <h3 class="tit3 t-center m-b-35 m-t-2">
                    Hiện tại giở hàng của bạn trống

                </h3>
                <div class="wrap-form-booking">
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <a href="{{route('store/get_home')}}#thucdon" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Đặt bánh ngay
                        </a>
                    </div>
                </div>

            @endif
        </div>
    </section>
    <script>
       function change(input, type, thanhtien, dongia) {
           if(type==-1){
               if(document.getElementById(input).value==0) {

               }
               else{
                   document.getElementById(input).value = document.getElementById(input).value -1;
                   document.getElementById(thanhtien).innerHTML = parseInt(document.getElementById(input).value)*parseInt(dongia);
               }
           }
           else if(type==1){
               document.getElementById(input).value = parseInt(document.getElementById(input).value)+1;
               document.getElementById(thanhtien).innerHTML = parseInt(document.getElementById(input).value)*parseInt(dongia);
           }
       }
    </script>
@endsection
