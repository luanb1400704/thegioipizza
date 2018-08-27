@extends('components.index')
@section('content')
    {{--{{dd($listChiNhanh)}}--}}
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
            <li>Danh sách chi nhánh đã chi</li>
        </ol>
    </section>
    <section class="content col-lg-12 ">
    @foreach($listChiNhanh as $key => $value)

            <div class="box box-primary">
                <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        {{$value['ten_chinhanh']}}
                    </h1>
                    <div class="p-b-10"></div>
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                       Số tiền chi hộ: {{$value['tongtien']}} VNĐ
                    </h1>
                </span>
                </div>
                <div class="box-body ">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>ID nhân viên</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>CMND</th>
                            <th>Email</th>
                            <th>Tổng tiền đã bán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value['nhanvien'] as $keynv => $val)
                        <tr>
                            <td>{{ $val['user_id'] }}</td>
                            <td>{{ $val['name'] }}</td>
                            <td>{{ $val['phone'] }}</td>
                            <td>{{ $val['user_cmnd'] }}</td>
                            <td>{{ $val['email'] }}</td>
                            <td>{{ $val['tongtiendatinh'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="m-l-20 m-b-50">
                    <button class="btn btn-danger btn-sm ">Thanh toán</button>
                </div>

            </div>


    @endforeach
    </section>

@endsection