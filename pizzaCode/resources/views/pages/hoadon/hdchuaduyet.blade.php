@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hóa Đơn</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Hóa đơn
                </a>
            </li>
            <li>Hóa đơn đã duyệt</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách Đơn hàng chờ duyệt
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Tùy Chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($khachhang as $key=>$value)
                        <tr>
                            <td>{{$value->hd_id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{number_format($value->tong_tien_hoa_don)}}</td>
                            <td>{{$value->created_at}}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm" title="xem chi tiet"
                                   onclick="getDetails({{$value->hd_id}})">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-success btn-sm" title="chinh sua hoa don">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('hoadon.done', [$value->hd_id])}}" title="duyet hoa don"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-check-square"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="detailHoaDon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="modal-title" id="exampleModalLabel">Chi tiết hóa đơn</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Nhân viên duyệt hóa đơn: <span id="tenNV" style="color: red;"></span></label><br>
                            <label>Tổng tiền: <span id="tongtien" style="color: red;"></span> VNĐ</label><br>
                            <label>Chi tiết:</label>

                        </div>
                        <div class="box-body ">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên bánh</th>
                                    <th>Loại</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>

                                </tr>
                                </thead>
                                <tbody id="body-detail">
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên bánh</th>
                                    <th>Loại</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('#example1').DataTable()
        });

        function toMoney(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function getDetails(id) {
            // sessionStorage.setItem('id_temp', id);
            $.ajax({
                type: 'GET',
                url: '{{route('hoadon.indexdaduyetdetail')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function (res) {
                    chitiet = res.data.chitiet;
                    $("#body-detail").innerHTML = '';
                    $("#tenNV").html(res.data.hoadon.name);
                    $("#tongtien").html(res.data.hoadon.tong_tien_hoa_don);
                    htmlTable = '';
                    chitiet.forEach(function (element) {
                        htmlTable = htmlTable +
                            "<tr>" +
                            "<td>" + element.b_id + "</td>" +
                            "<td>" + element.b_ten + "</td>" +
                            "<td>" + element.l_ten + "</td>" +
                            "<td>" + toMoney(element.g_tien) + "</td>" +
                            "<td>" + element.so_luong_mua + "</td>" +
                            "<td>" + toMoney(element.thanh_tien) + "</td>" +
                            "</tr>";
                    });
                    $("#body-detail").html(htmlTable);
                    $("#detailHoaDon").modal('show');
                }
            });
        }
    </script>
@endsection