@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Phân Quyền</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Phân Quyền
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('pq.update',[$pq->pq_id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Quyền Mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Quyền</label>
                                <input type="text" class="form-control" name="pq_ten" value="{{ $pq->pq_ten }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Cập nhật
                                </button>
                                <button type="reset" class="btn bg-navy btn-sm btn-flat margin">
                                    Làm lại
                                </button>
                                <a href="{{ url('phan-quyen/index') }}" class="btn bg-red btn-sm btn-flat margin">
                                    Trở về
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </section>
@endsection