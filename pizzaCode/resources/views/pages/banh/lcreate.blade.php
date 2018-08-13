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
            <li>Thêm mới</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('l.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Mới Loại Bánh Pizza</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Loại Bánh <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input type="text" class="form-control" name="l_ten">
                            </div>
                            <div class="form-group">
                                <label>Kích Thước <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input type="text" class="form-control" name="l_kichthuoc">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('banh/index') }}" class="btn bg-red btn-sm btn-flat margin">
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