@extends('website.index')
@section('content')




    <!-- Booking -->
    <section class="section-booking bg1-pattern p-t-100 p-b-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 p-b-15 p-t-9">

                </div>
                <div class="col-lg-6 p-b-30">
                    <div class="t-center">
						<span class="tit2 t-center">
							Tham gia chương trình ăn bánh tích điểm đổi bánh hoặc nhận lì xì hàng tháng
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Đăng ký
                        </h3>
                    </div>
                    {{--@if (session('notphone'))--}}
                        {{--<script>--}}
                            {{--swal("Good job!", "You clicked the button!", "success");--}}
                        {{--</script>--}}
                        {{--<button onclick=""></button>--}}
                    {{--@endif--}}

                    <form class="wrap-form-booking" method="post" action="{{route('customer/register')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-6">

                                <!-- Name -->
                                <span class="txt9">
									Họ tên (*)
								</span>

                                <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" required value="{{old('name')}}">
                                </div>

                                <span class="txt9">
									SĐT (*)
								</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone" value="{{old('phone')}}" placeholder="Phone" required>
                                </div>


                                <span class="txt9">
									SĐT người giới thiệu
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone_introduce" placeholder="Phone">
                                </div>

                                <span class="txt9">
									Mật khẩu (*)
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="Password" required>
                                </div>
                                <span class="txt9">
									Nhập lại mật khẩu (*)
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="repassword" placeholder="Confirm" required>
                                </div>

                                <span class="txt9">
                                Ảnh đại diện (*): <br>
                                </span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    {{--<img src="" id="imgupload" alt="">--}}
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="file" id="avatar" name="customer_image" placeholder="Address" required>
                                </div>
                                <div class="img-avatar-nns">
                                    <img src=""  class="register-cus" id="imgupload" alt="">
                                </div>
                                <span class="txt9">
                                    Vui lòng nhập chân dung thật<br>
                                    Trong quá trình nhận tiền lì xì hoặc lấy lì xì đổi bánh người bán hàng sẽ so sánh chân dung của bạn
                                </span>

                                <script>
                                    function readFile() {
                                        if (this.files && this.files[0]) {
                                            var FR= new FileReader();
                                            FR.onload = function(e) {
                                                document.getElementById("imgupload").src = e.target.result;
                                                document.getElementById("imgupload").style.width = "90px";

                                            };
                                            FR.readAsDataURL( this.files[0] );
                                        }
                                    }

                                    document.getElementById("avatar").addEventListener("change", readFile, false);
                                </script>
                            </div>

                            <div class="col-md-6">
                                <!-- Date -->
                                <span class="txt9">
									Ngày sinh (*)
								</span>

                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="customer_birthday" required>
                                    <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
                                </div>

                                <span class="txt9">
									Giới tính (*)
								</span>

                                <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <!-- Select2 -->
                                    <select class="selection-1" name="customer_gender" required>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>

                                <span class="txt9">
                                Địa chỉ (*)
                                </span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="customer_address" placeholder="Address" required>
                                </div>
                                <span class="txt9">
                                    CMND (*)
                                </span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="customer_cmnd" placeholder="CMND" required>
                                </div>
                                <span class="txt9">
									Ngày cấp CMND (*)
								</span>

                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="customer_cmnd_ngaycap" required>
                                    <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
                                </div>

                                <!-- Email -->
                                <span class="txt9">
									Email
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email">
                                </div>
                                <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
                                    Xác nhận
                                </button>
                                <br>
                                <a href="{{route('store/register')}}" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
                                    Thực hiện lại
                                </a>




                            </div>
                        </div>

                        {{--<div class="wrap-btn-booking flex-c-m m-t-6">--}}
                            {{--<!-- Button3 -->--}}
                            {{--<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">--}}
                                {{--Xác nhận--}}
                            {{--</button>--}}
                            {{--<br>--}}
                            {{--<a href="{{route('store/login')}}" class="btn3 flex-c-m size13 txt11 trans-0-4">--}}
                                {{--Thực hiện lại--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </form>
                </div>

                <div class="col-lg-3 p-b-15 p-t-9">

                </div>
            </div>
        </div>
    </section>

@endsection