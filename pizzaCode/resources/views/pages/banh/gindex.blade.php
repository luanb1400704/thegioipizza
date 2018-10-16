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
                    <a href="{{ route('g.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Bánh</th>
                        <th>Loại Bánh</th>
                        <th>Giá</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($g as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->b_ten }}</td>
                        <td>{{ $val->l_ten }},{{ $val->l_kichthuoc }}</td>
                        <td>{{number_format( $val->g_tien )}} vnđ</td>
                        <td class="text-center">
                            <a href="{{ route('g.edit',$val->g_id) }}" class="btn btn-primary btn-sm btn-flat"
                               onclick="return confirm('Bạn có cập nhật giá bánh này ?')">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('g.destroy',$val->g_id) }}" class="btn btn-danger btn-sm btn-flat"
                               onclick="return confirm('Bạn có chắc chắn xóa giá bánh này ?')">
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