@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Nhân Viên Chi Nhánh</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Nhân viên chi nhánh</a></li>
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
                    <a title="Thêm mới" href="{{ route('nv.create') }}" type="button" class="btn bg-aqua btn-sm btn-flat margin">
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
                        {{--<th>CMND</th>--}}
                        {{--<th>Ngày Cấp CMND</th>--}}
                        {{--<th>Giới Tính</th>--}}
                        <th>Địa Chỉ</th>
                        <th>Ảnh Đại Diện</th>
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
                        {{--<td>{{ $val->user_cmnd }}</td>--}}
                        {{--<td>{{ $val->user_ngaycap_cmnd }}</td>--}}
                        {{--<td>--}}
                            {{--@if($val->user_gender == 1)--}}
                                {{--Nam--}}
                            {{--@else--}}
                                {{--@if($val->user_gender == 0)--}}
                                    {{--Nữ--}}
                                {{--@else--}}
                                    {{--&nbsp;--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--</td>--}}
                        <td>{{ $val->user_address }}</td>
                        @if (empty($val->user_image))
                            <td><img src="{{url('upload')}}/image.png" width="30px" height="30px"></td>
                        @else
                            <td><img src="{{$val->user_image}}" width="30px" height="30px"></td>
                        @endif
                        <td class="text-center">
                            <a title="Sửa nhân viên" href="{{ route('nv.edit', [$val->id]) }}"
                               class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                                Sửa
                            </a>
                            <a title="Xem chi tiêu" data-toggle="modal"  onclick="filterDate('{{$val->id}}')"
                               class="btn btn-danger btn-sm btn-flat">
                                <i class="fa fa-money"></i>
                                Xem
                            </a>
                            {{--<a href="#" class="btn bg-olive btn-sm btn-flat">--}}
                                {{--<i class="fa fa-key"></i>--}}
                            {{--</a>--}}
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="modal-title" id="exampleModalLabel">Nhập ngày bắt đầu và kết thúc</h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="id_nv" name="id" class="form-control" required>
                    <label>Ngày bắt đầu</label>
                    <input type="date" id="begin" name="begin" class="form-control" required>
                    <label>Ngày kết thúc</label>
                    <input type="date" id="end" name="end" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="getTotal()">Xem</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Lọc</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="total" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="modal-title" id="exampleModalLabel">Chi tiết bán hàng nhân viên</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Số lượng hóa đơn: <span id="soluonghd" style="color: red;"></span></label><br>
                        <label>Tổng tiền: <span id="sum" style="color: red;"></span> VNĐ</label><br>
                        <label>Chi tiết:</label>
                    </div>
                    <div class="box-body ">
                        <table id="totalTable" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Ngày lập</th>
                                <th>Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody id="body-detail">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('#example1').DataTable()
        })

        function filterDate(id_nv) {
            $("#id_nv").val(id_nv);
            $("#filter").modal('show');
        }
        function toMoney(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function getTotal() {
            var id = $("#id_nv").val();
            var begin = $("#begin").val();
            var end = $("#end").val();
            $.ajax({
                type: 'GET',
                url: '{{route('nv.total')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id,
                    begin: begin,
                    end: end
                },
                success: function (res) {
                    $("#body-detail").innerHTML = '';
                    $("#soluonghd").html(res.list.length);
                    $("#sum").html(res.sum['sum']);
                    htmlTable = '';
                    res.list.forEach(function (element) {
                        htmlTable = htmlTable +
                            "<tr>" +
                            "<td>" + element.hd_id + "</td>" +
                            "<td>" + element.created_at + "</td>" +
                            "<td>" + element.name + "</td>" +
                            "<td>" + element.phone + "</td>" +
                            "<td>" + toMoney(element.tong_tien_hoa_don) + "</td>" +
                            "</tr>";
                    });
                    $("#body-detail").html(htmlTable);
                    $("#total").modal('show');
                    $('#totalTable').DataTable()
                }
            });
        }

    </script>
@endsection
