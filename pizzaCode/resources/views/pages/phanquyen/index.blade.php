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
            <li>Danh sách</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <h1 class="box-title text-primary">
                    <i class="ion ion-clipboard "></i>
                    Danh sách các quyền
                </h1>
                <span class="pull-right">
                    <a href="{{ route('pq.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm phân quyền
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Quyền</th>
                        <th>Tùy Chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pq as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->pq_ten }}</td>
                        <td class="text-center">
                            <a href="{{ route('pq.edit',[$val->pq_id]) }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm btn-flat">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection