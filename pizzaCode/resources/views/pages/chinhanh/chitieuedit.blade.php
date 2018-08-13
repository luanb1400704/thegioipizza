@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Chi Nhánh
                </a>
            </li>
            <li>Cập nhật chi tiêu</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('ct.update',[$chitieu->id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Chi Tiêu</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Chi Nhánh </label>
                                <select class="form-control" name="id_chinhanh">
                                    @foreach ($chinhanh as $key => $val)
                                        @if($val->id_chinhanh == $chitieu->id_chinhanh)
                                            <option value="{{ $val->id_chinhanh }}" selected>{{ $val->ten_chinhanh }}</option>
                                        @else
                                            <option value="{{ $val->id_chinhanh }}">{{ $val->ten_chinhanh }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số Tiền</label>
                                <input type="text" class="form-control" name="sotien" value="{{ $chitieu->sotien }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <button type="reset" class="btn bg-navy btn-sm btn-flat margin">
                                    Làm lại
                                </button>
                                <a href="{{ url('chi-nhanh/chi-tieu-index') }}" class="btn bg-red btn-sm btn-flat margin">
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
