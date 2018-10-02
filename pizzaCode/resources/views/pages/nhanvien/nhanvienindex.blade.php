@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Nhân Viên Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('nv.index') }}">
                    Nhân viên chi nhánh
                </a>
            </li>
            <li>Danh sách</li>
        </ol>
    </section>
    <section class=" content col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách nhân viên chi nhánh
                    </h1>
                </span>
                <span class="pull-right">
                    <a href="{{ route('nv.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Nhân Viên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>CMND</th>
                        <th>Ngày Cấp CMND</th>
                        <th>Giới Tính</th>
                        <th>Địa Chỉ</th>
                        <th>Ảnh Đại Diện</th>
                        <th>Thuộc Chi Nhánh</th>
                        <th>Người tạo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($nhanvien as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->email }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>{{ $val->user_cmnd }}</td>
                        <td>{{ $val->user_ngaycap_cmnd }}</td>
                        <td>
                            @if($val->user_gender == 1)
                                Nam
                            @else
                                @if($val->user_gender == 0)
                                    Nữ
                                @else
                                    &nbsp;
                                @endif
                            @endif
                        </td>
                        <td>{{ $val->user_address }}</td>
                        @if (empty($val->user_image))
                            <td><img src="{{url('upload')}}/image.png" width="30px" height="30px"></td>
                        @else
                            <td><img src="{{$val->user_image}}" width="30px" height="30px"></td>
                        @endif
                        <td>{{ $val->ten_chinhanh }}</td>
                        @if ($val->active == 1)
                            <td><i style="color: #00ff00" class="fa fa-check"></i></td>
                        @else
                            <td><i style="color: red" class="fa fa-close"></i></td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('nv.edit', [$val->id]) }}"
                               class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn bg-olive btn-sm btn-flat">
                                <i class="fa fa-key"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
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
        })
    </script>
@endsection