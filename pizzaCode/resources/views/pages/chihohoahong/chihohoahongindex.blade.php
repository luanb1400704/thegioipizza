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
            <li>Danh sách khách hàng</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày Sinh</th>
                        <th>CMND</th>
                        <th>Địa chỉ</th>
                        <th>Số Tiền Tích Lũy</th>
                        <th>Hạn lãnh</th>
                        @if(Auth::user()->type == 1)
                            <th></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($hoahongchinhanh as $val): ?>
                    <tr>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->email }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>{{ $val->customer_birthday }}</td>
                        <td>{{ $val->customer_cmnd }}</td>
                        <td>{{ $val->customer_address }}</td>
                        <td>{{ number_format($val->tien_hoa_hong) }} vnđ</td>
                        <td>{{ $val->danh_dau }}</td>
                        @if($val->tien_hoa_hong == 0)
                        @else
                            @if(Auth::user()->type == 1)
                                <td class="text-center">
                                    <a href="{{ route('tru_tien',$val->hh_id) }}"
                                       class="btn btn-primary btn-sm btn-flat"
                                       onclick="return confirm('Bạn chắc chắn muốn thanh toán ?')">
                                        <i class="fa fa-dollar"></i>
                                    </a>
                                </td>
                            @endif
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
    </script>
@endsection