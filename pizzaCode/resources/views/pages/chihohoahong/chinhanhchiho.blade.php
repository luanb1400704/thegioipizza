@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Trả tiền lại cho chi nhánh</a></li>
            <li>Danh sách chi nhánh</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách các chi nhánh đã tiền cho khách hàng
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Chi Nhánh</th>
                        <th>Tên Nhi Nhánh</th>
                        <th>Số Tiền Đã Trả</th>
                        <th>Tên Chủ Chi Nhánh</th>
                        <th>Email Chi Nhánh</th>
                        <th>SĐT</th>
                        <th>Thanh toán</th>
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
                        @if($val->sotien == 0)
                            <td></td>
                        @else
                            <td class="text-center">
                                <a href="{{route('tien-chi-ho-hoa-hong/thanh_toan',['id'=>$val->id_chinhanh])}}"
                                   class="btn bg-red-active btn-sm btn-flat">
                                    <i class="fa fa-dollar"></i>
                                </a>
                            </td>
                        @endif
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