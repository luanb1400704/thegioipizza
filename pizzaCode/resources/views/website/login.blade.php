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
                            Đăng nhập
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="wrap-form-booking">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <!-- Phone -->
                                <span class="txt9">
									Điện thoại
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" id="email" type="text" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">

                                <!-- Phone -->
                                <span class="txt9">
									Mật khẩu
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" id="password" type="password"  name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="wrap-btn-booking flex-c-m m-t-6">
                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Xác nhận
                            </button>
                        </div>
                        <br>
                        <br>

                    </form>
                    <div class="t-center">
						<span class="tit2 t-center">
							Bạn chưa có tải khoản ? Đăng ký ngay tại đây
						</span>

                    </div>
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <a href="{{route('store/fast_register')}}">
                            <button class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Đăng ký nhanh
                            </button>
                        </a>
                        <div style="padding-left: 10px;"></div>
                        <a href="{{route('store/register')}}">
                            <button class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Đăng ký
                            </button>
                        </a>

                    </div>
                </div>


                <div class="col-lg-3 p-b-15 p-t-9">

                </div>
            </div>
        </div>
    </section>



    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0">
                    <img src="{{url('patotheme/images/icons/video-16-9.jpg')}}" alt="IMG" />
                </div>
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection