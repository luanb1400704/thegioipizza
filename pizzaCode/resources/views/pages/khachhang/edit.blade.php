@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Khách Hàng</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Khách Hàng
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Khách Hàng</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Khách Hàng </label>
                                <input type="text" class="form-control" name="kh_ten" required>
                            </div>
                            <div class="form-group" style="display: -webkit-box;">
                                <label>Giới Tính</label>
                                <div class="radio" style="width: max-content;margin-left: 50px;margin-bottom: 0px;margin-top: 0px;margin-right: 50px;">
                                    <label>
                                        <input type="radio" name="kh_gioitinh" value="1" checked="">
                                        Nam
                                    </label>
                                </div>
                                <div class="radio" style="width: max-content;margin-top: 0px;">
                                    <label>
                                        <input type="radio" name="kh_gioitinh" value="0">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input type="text" class="form-control" name="kh_sdt">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="kh_email">
                            </div>
                            <div class="form-group">
                                <label>Số CMND</label>
                                <input type="text" class="form-control" name="kh_cmnd">
                            </div>
                            <div class="form-group">
                                <label>Ngày cấp</label>
                                <input type="date" class="form-control" name="kh_ngaycap">
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control" name="kh_diachi">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <button type="reset" class="btn bg-navy btn-sm btn-flat margin">
                                    Làm lại
                                </button>
                                <a href="{{ url('chi-nhanh/index') }}" class="btn bg-red btn-sm btn-flat margin">
                                    Trở về
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Khách Hàng Mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Người Giới Thiệu</label>
                                <select class="form-control" name="id_ch">
                                    <option value="0">---</option>
                                    @foreach ($kh as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->kh_ten }} - {{ $val->kh_sdt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
