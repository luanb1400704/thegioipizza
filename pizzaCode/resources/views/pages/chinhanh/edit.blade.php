@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('cn.index') }}">
                    Quản Lý Chi Nhánh
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('cn.update',$chinhanh->id_chinhanh) }}" method="POST">
            @csrf
            <input type="hidden" value="{{$chinhanh->id_chinhanh}}" name="id_chinhanh">
            <input type="hidden" value="{{$chinhanh->id}}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Tài Khoản Chi Nhánh Mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>
                                    Tên Chủ Chi Nhánh
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" value="{{ $chinhanh->name }}"
                                       class="form-control" name="name" required placeholder="vd: nguyễn văn A ...">
                            </div>
                            <div class="form-group">
                                <label>
                                    Email
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="email" value="{{ $chinhanh->email }}"
                                       class="form-control" name="email" required placeholder="vd: email@gmail.com ...">
                            </div>
                            <div class="form-group">
                                <label>
                                    Số Điện Thoại
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" value="{{ $chinhanh->phone }}"
                                       class="form-control" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    Tên Chi Nhánh
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" value="{{ $chinhanh->ten_chinhanh }}"
                                       class="form-control" name="ten_chinhanh" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    Địa chỉ
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" value="{{ $chinhanh->diachi_chinhanh }}"
                                       class="form-control" name="diachi_chinhanh" required>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('chi-nhanh/index') }}" class="btn bg-red btn-sm btn-flat margin">
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
