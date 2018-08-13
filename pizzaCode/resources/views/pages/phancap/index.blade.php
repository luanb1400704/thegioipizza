@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Phân Cấp</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('pc.index') }}">
                    Phân Cấp Hoa Hồng
                </a>
            </li>
            <li>Danh Sách</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Phân Cấp Hoa Hồng
                    </h1>
                </span>
                <span class="pull-right">
                    <a href="{{ route('pc.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm mới
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Phân Cấp Hoa Hồng</th>
                        <th>Số Cấp</th>
                        <th>Tỷ Lệ %</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pc as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->pc_ten }}</td>
                        <td>{{ $val->pc_socap }}</td>
                        <td>{{ $val->pc_tile }} %</td>
                        @if($val->status == 1)
                            <td style="color: #00ca6d">Đang Mở</td>
                        @else
                            <td style="color: red">Đang Tắt</td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('pc.edit',$val->pc_id) }}" class="btn btn-primary btn-sm btn-flat"
                               onclick="return confirm('Bạn muốn cập nhật phân cấp hoa hồng này ?')">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('pc.destroy',$val->pc_id) }}" class="btn btn-danger btn-sm btn-flat"
                               onclick="return confirm('Bạn có chắc chắn xóa phân cấp hoa hồng này ?')">
                                <i class="fa fa-trash"></i>
                            </a>
                            @if($val->status == 0)
                                <a href="{{ route('pc.status',$val->pc_id) }}" class="btn bg-olive btn-sm btn-flat"
                                   onclick="return confirm('Cảnh báo ! Bật phân cấp này thì phân cấp đang bật sẽ tắt !')">
                                    <i class="fa fa-key"></i>
                                </a>
                            @else
                                <a disabled="" class="btn bg-olive btn-sm btn-flat"><i class="fa fa-key"></i></a>
                            @endif
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
