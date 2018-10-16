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
            <li>Danh sách</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách
                    </h1>
                </span>
                <span class="pull-right">
                    <a href="{{ route('l.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Loại Bánh</th>
                        <th>Kích Thước</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($l as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->l_ten }}</td>
                        <td>{{ $val->l_kichthuoc }}</td>
                        <td class="text-center">
                            <a href="{{ route('l.edit',[$val->l_id]) }}" class="btn btn-primary btn-sm btn-flat"
                               onclick="return confirm('Bạn có cập nhật loại bánh này ?')">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('l.destroy',$val->l_id) }}" class="btn btn-danger btn-sm btn-flat"
                               onclick="return confirm('Cảnh báo ! Khi xóa loại bánh này thì những giá của loại này chúng xóa ?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('#example1').DataTable()
        });
    </script >
@endsection