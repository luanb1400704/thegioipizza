@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Bánh Pizza</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('banh.index') }}">
                    Quản Lý Bánh
                </a>
            </li>
            <li>Danh sách</li>
        </ol>
    </section>
    <section class=" content col-lg-12 ">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh Sách Các Bánh Trong Cửa Hàng
                    </h1>
                </span>
                <span class="pull-right">
                    <a title="Thêm mới" href="{{ route('banh.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Bánh</th>
                        <th>Mô Tả</th>
                        <th>Hình Ảnh</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($banh as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->b_ten }}</td>
                        <td>{!! $val->b_mota !!}</td>
                        @if (empty($val->b_anh))
                            <td><img src="{{url('upload')}}/khanh.png" width="30px" height="30px"></td>
                        @else
                            <td><img src="{{url('upload')}}/{{ $val->b_anh }}" width="30px" height="30px"></td>
                        @endif
                        <td class="text-center" style="width: 140px">
                            <a title="Sửa bánh" href="{{ route('banh.edit',[$val->b_id]) }}" class="btn btn-primary btn-sm btn-flat"
                               onclick="return confirm('Bạn có cập nhật bánh này ?')">
                                <i class="fa fa-edit"></i>
                                Sửa
                            </a>
                            <a title="Xóa bánh" href="{{ route('banh.destroy',$val->b_id) }}" class="btn btn-danger btn-sm btn-flat"
                               onclick="return confirm('Cảnh báo ! Khi xóa bánh này thì những giá của bánh này cũng xóa?')">
                                <i class="fa fa-trash"></i>
                               Xóa
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