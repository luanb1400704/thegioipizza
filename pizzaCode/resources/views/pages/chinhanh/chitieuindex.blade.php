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
                    Tiền bánh của chi nhánh
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
                    <a href="{{ route('ct.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm khoảng thu mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Chi Nhánh</th>
                        <th>Số Tiền Thu Từ Chi Nhánh</th>
                        <th>Tùy Chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($chitieu as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->ten_chinhanh }}</td>
                        <td>{{ number_format($val->sotien) }} vnđ</td>
                        <td class="text-center">
                            <a href="{{ route('ct.edit',[$val->id]) }}" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
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