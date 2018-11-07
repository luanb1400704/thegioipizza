@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Phân Cấp</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a>
            </li>
            <li><a>Phân Cấp Hoa Hồng</a>
            </li>
            <li>Cập Nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('pc.update',$pc->pc_id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Phân Cấp Hoa Hồng</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Phân Cấp Mới
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" class="form-control" name="pc_ten" value="{{ $pc->pc_ten }}" required>
                            </div>
                            <div class="form-group">
                                <label>Số Cấp
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" class="form-control" name="pc_socap" value="{{ $pc->pc_socap }}" required>
                            </div>
                            <div class="form-group">
                                <label>Tỉ Lệ %
                                    <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span>
                                </label>
                                <input type="text" class="form-control" name="pc_tile" value="{{ $pc->pc_tile }}" required>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('phan-cap/index') }}" class="btn bg-red btn-sm btn-flat margin">
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
