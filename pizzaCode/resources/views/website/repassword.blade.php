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
							Vui lòng giữ mật khẩu để đăng nhập và đặt bánh cho các lần sau
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Đổi mật khẩu
                        </h3>
                    </div>

                    <form class="wrap-form-booking" method="post" action="{{route('store/repass')}}" >
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="txt9">
									Mật khẩu cũ
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="oldpassword" placeholder="Old Password" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                               <span class="txt9">
									Mật khẩu mới
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="txt9">
									Nhập lại mật khẩu mới
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="repassword" placeholder="Confirm" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
                                    Xác nhận
                                </button>
                                <br>
                                <a href="{{route('store/get_contact')}}" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin:  auto;">
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