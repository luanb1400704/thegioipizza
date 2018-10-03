@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Nhân Viên Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('nv.index') }}">
                    Nhân viên chi nhánh
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('nv.update', [$nhanvien->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Mới Nhân Viên</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Nhân Viên</label>
                                <input type="text" class="form-control" value="{{ $nhanvien->name }}" required
                                       name="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $nhanvien->email }}" required
                                       name="email">
                            </div>
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input type="text" class="form-control" value="{{ $nhanvien->phone }}" required
                                       name="phone">
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>CMND</label>
                                <input type="text" class="form-control" value="{{ $nhanvien->user_cmnd }}" name="user_cmnd">
                            </div>
                            <div class="form-group">
                                <label>Ngày Cấp CMND</label>
                                <input type="text" class="form-control"
                                       value="{{ $nhanvien->user_ngaycap_cmnd }}" name="user_ngaycap_cmnd">
                            </div>
                            <div class="form-group">
                                <label style="display: -webkit-box">Giới Tính :
                                    <div class="radio" style="margin: 0px">
                                        <label style="margin-right: 50px; margin-left: 25px">
                                            <input type="radio" name="user_gender"
                                                   @if($nhanvien->user_gender == 1) checked="checked" @endif value="1">
                                            Nam
                                        </label>
                                        <label>
                                            <input type="radio" name="user_gender"
                                                   @if($nhanvien->user_gender == 0) checked="checked" @endif value="0">
                                            Nữ
                                        </label>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control"
                                       value="{{ $nhanvien->user_address }}" name="user_address">
                            </div>
                            <div class="form-group" style="margin-bottom: 35px;">
                                <label>Ảnh Đại Diện</label>
                                <br>
                                <img width="180px" height="180px" id="avatar"
                                     @if(!empty($nhanvien->user_image))
                                     src="{{ $nhanvien->user_image }}"
                                     @else
                                     src="{{url('upload')}}/image.png"
                                     @endif
                                     alt="your image"
                                />
                                <input style="margin-top: 10px;" type='file' name="user_image" onchange="readURL(this)"/>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('nhan-vien-chi-nhanh/index') }}"
                                   class="btn bg-red btn-sm btn-flat margin">
                                    Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#avatar").attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
