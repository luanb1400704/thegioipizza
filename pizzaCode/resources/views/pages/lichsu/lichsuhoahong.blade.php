@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hoa Hồng</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('index') }}">
                    Chi hộ hoa hồng
                </a>
            </li>
            <li>Danh sách</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Lịch sử trả tiền cho khách hàng
                    </h1>
                </span>
                <span class="pull-right">
                    <a type="button" class="btn bg-danger btn-sm btn-danger margin">
                        Tổng số tiền đã trả cho khách : {{ number_format($tongtien) }} vnđ
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>SĐT</th>
                        <th>Số tiền đã trả</th>
                        <th>Ngày trả</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($log as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->tenkhachhang }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>{{ number_format($val->so_tien_da_tra) }} vnđ</td>
                        <td>{{ $val->ngay_tra }}</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
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