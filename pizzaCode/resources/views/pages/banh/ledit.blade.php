@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Bánh Pizza</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('l.index') }}">
                    Quản Lý Loại Bánh
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('l.update',[$l->l_id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Loại Bánh Pizza</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Loại Bánh <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input required type="text" class="form-control" name="l_ten" value="{{ $l->l_ten }}">
                            </div>
                            <div class="form-group">
                                <label>Kích Thước <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input required type="text" class="form-control" name="l_kichthuoc" value="{{ $l->l_kichthuoc }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('loai-banh/index') }}" class="btn bg-red btn-sm btn-flat margin">
                                    Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </section>
@endsection