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
                <a href="{{ route('g.index') }}">
                    Quản Lý Giá Bánh
                </a>
            </li>
            <li>Cập nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('g.update',$g->g_id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Giá Cho Bánh Pizza</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Bánh <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <select class="form-control" name="b_ten">
                                    @foreach ($banh as $key => $value)
                                        @if($value->b_id == $g->b_id)
                                            <option value="{{ $value->b_id }}" selected>{{ $value->b_ten }}</option>
                                        @else
                                            <option value="{{ $value->b_id }}">{{ $value->b_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Loại <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <select class="form-control" name="l_ten">
                                    @foreach ($loaibanh as $key => $value)
                                        @if($value->l_id == $g->l_id)
                                            <option value="{{ $value->l_id }}"
                                                    selected>{{ $value->l_ten }} {{ $value->l_kichthuoc }}</option>
                                        @else
                                            <option value="{{ $value->l_id }}">{{ $value->l_ten }} {{ $value->l_kichthuoc }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input type="text" class="form-control" name="g_tien" value="{{ $g->g_tien }}">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('gia-banh/index') }}" class="btn bg-red btn-sm btn-flat margin">
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
