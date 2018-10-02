@extends('website.index')
@section('style')
    <style>
        .sd {
            background: #238a21;
        }
        .ds{
            background: #5bc0de;
        }
    </style>
@endsection
@section('content')
    <section class="section-booking bg1-pattern p-t-100 p-b-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 p-b-15 p-t-9"></div>
                <div class="col-lg-6 p-b-30">
                    <div class="t-center">
						<span class="tit2 t-center">
							Tham gia chương trình ăn bánh tích điểm đổi bánh hoặc nhận lì xì hàng tháng
						</span>
                        <h3 class="tit3 t-center m-b-35 m-t-2">Đăng ký</h3>
                    </div>
                    <form class="wrap-form-booking" method="post" action="{{route('customer/register')}}"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="txt9">(*)Họ và tên :</span>
                                <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name"
                                           placeholder="họ và tên ..." value="{{old('name')}}" required>
                                </div>
                                <span class="txt9">(*)Số điện thoại :</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone"
                                           value="{{old('phone')}}" placeholder="số điện thoại ..." required>
                                </div>
                                <span class="txt9">SĐT người giới thiệu</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone_introduce"
                                           placeholder="sđt người giới thiệu" value="{{old('phone_introduce')}}">
                                </div>
                                <span class="txt9">Mật khẩu (*)</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password"
                                           placeholder="******" required>
                                </div>
                                <span class="txt9">Nhập lại mật khẩu (*)</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="repassword"
                                           placeholder="******" required>
                                </div>
                                <span class="txt9">Ảnh đại diện (*): <br></span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="file" id="avatar" name="file"
                                           placeholder="địa chỉ ..." accept=".png,.jpg, .jpeg">
                                </div>
                                <div class="img-avatar-nns">
                                    <img src="" class="register-cus" id="imgupload" alt="">
                                </div>
                                <span class="txt9">
                                    Vui lòng nhập chân dung thật<br>
                                    Trong quá trình nhận tiền lì xì hoặc lấy lì xì đổi bánh người bán hàng sẽ so sánh chân dung của bạn
                                </span>
                            </div>
                            <div class="col-md-6">
                                <span class="txt9">(*)Địa chỉ email :</span>
                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email"
                                           placeholder="địa chỉ email ..." value="{{old('email')}}" required>
                                </div>
                                <span class="txt9">(*)Ngày sinh :</span>
                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="date"
                                           name="customer_birthday" required>
                                    <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18"
                                       aria-hidden="true"></i>
                                </div>
                                <span class="txt9">(*)Giới tính :</span>
                                <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <select class="select-gender" name="customer_gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <span class="txt9">(*)Địa chỉ :</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="customer_address"
                                           placeholder="địa chỉ ..." value="{{old('customer_address')}}" >
                                </div>
                                <span class="txt9">(*)CMND :</span>
                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="customer_cmnd"
                                           placeholder="CMND ..." value="{{old('customer_cmnd')}}" required>
                                </div>
                                <span class="txt9">(*)Ngày cấp CMND :</span>
                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="date"
                                           name="customer_cmnd_ngaycap" >
                                    <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18"
                                       aria-hidden="true"></i>
                                </div>
                                <button type="submit" class="btn3 ds flex-c-m size13 txt11 trans-0-4"
                                        style="margin:  auto;">Đăng ký
                                </button>
                                <br>
                                <a href="{{route('store/register')}}" class="btn3 flex-c-m size13 txt11 trans-0-4"
                                   style="margin:  auto;">Thực hiện lại</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 p-b-15 p-t-9"></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(".select2").select2();
        function readFile() {
            if (this.files && this.files[0] && this.files[0].size < 2097152) {
                var FR = new FileReader();
                FR.onload = function (e) {
                    document.getElementById("imgupload").src = e.target.result;
                    document.getElementById("imgupload").style.width = "90px";

                };
                FR.readAsDataURL(this.files[0]);
            }
            else if (this.files[0].size > 2097152) {
                alert("Dung lượng file quá lớn!");
                document.getElementById("imgupload").src = '';
            }
        }
        document.getElementById("avatar").addEventListener("change", readFile, false);
    </script>
@endsection