@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Chi Nhánh</h1>
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
                        <th>ID</th>
                        <th>Tên chi nhánh</th>
                        <th>Số tiền</th>
                        <th>Chủ</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Thanh toán ngày</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listChiNhanh as $val): ?>
                    <tr>
                        <td>{{ $val->id_chinhanh }}</td>
                        <td>{{ $val->ten_chinhanh }}</td>
                        <td>{{ $val->sotien }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->email }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>
                            {{ $val->ngay_tra }}
                        </td>
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