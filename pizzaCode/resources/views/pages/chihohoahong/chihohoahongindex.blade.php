@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hoa Hồng</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Trả tiền hoa hồng</a></li>
            <li>Danh sách khách hàng</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh Sách Khách Hàng Đã Tích Lũy Trong Hệ Thống
                    </h1>
                </span>
            </div>
            <form method="get" action="{{ url('tien-chi-ho-hoa-hong/index') }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <input type="text" name="q" value="{{\Illuminate\Support\Facades\Input::get('q','')}}"
                                   class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <button title="Tìm kiếm" type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Tìm kiếm</button>
                            <a href="{{ url('tien-chi-ho-hoa-hong/index') }}" class="btn btn-primary btn-sm" title="Tải lại trang">
                                <i class="fa fa-refresh"></i> Tải lại
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày Sinh</th>
                        <th>CMND</th>
                        <th>Địa Chỉ</th>
                        <th>Số Tiền Tích Lũy</th>
                        <th>Hạn lãnh</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($hoahongchinhanh as $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
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
                                    <a title="Thanh toán cho khách" href="{{ route('tru_tien',$val->hh_id) }}"
                                       class="btn btn-primary btn-sm btn-flat"
                                       onclick="return confirm('Lưu ý : Bạn chắc chắn muốn thanh toán ?')">
                                        <i class="fa fa-dollar"></i>
                                        Thanh Toán
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
        <div class="container-fluid" align="right">
            {{ $hoahongchinhanh->links() }}
        </div>
    </section>
@endsection