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
                            Đăng ký nhanh
                        </h3>
                    </div>
                    <form class="wrap-form-booking" method="post" action="{{route('customer/fast_register')}}">
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
                            </div>
                            <div class="col-md-6">
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

                                <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
                                    Xác nhận
                                </button>
                                <br>
                                <a href="{{route('store/fast_register')}}" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
                                    Thực hiện lại
                                </a>




                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3 p-b-15 p-t-9">

                </div>
            </div>
        </div>
    </section>

@endsection