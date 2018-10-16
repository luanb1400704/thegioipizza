@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Lịch sử thanh toán cho chi nhánh</a></li>
            <li>Danh sách chi nhánh</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách chi hộ của các chi nhánh
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Chi Nhánh</th>
                        <th>Tên Chi Nhánh</th>
                        <th>Số Tiền</th>
                        <th>Tên Chủ</th>
                        <th>Email Chi Nhánh</th>
                        <th>SĐT</th>
                        <th>Ngày Thanh Toán</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listChiNhanh as $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->id_chinhanh }}</td>
                        <td>{{ $val->ten_chinhanh }}</td>
                        <td>{{ number_format($val->sotien) }} vnđ</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->email }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>{{ $val->ngay_tra }}</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $('#example1').DataTable()
        });

    </script>
@endsection