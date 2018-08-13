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
            <li>Lịch sủ thu tiền bánh</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Lịch sủ thu tiền bánh
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Chi Nhánh</th>
                        <th>Số Tiền Thu Từ Chi Nhánh</th>
                        <th>Ngày Thu Tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tienthu as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->ten_chinhanh }}</td>
                        <td>{{ number_format($val->sotien) }} vnđ</td>
                        <td>{{ $val->created_at }}</td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>
@endsection