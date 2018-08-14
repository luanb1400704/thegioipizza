@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Khách Hàng</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url(route('kh.index')) }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ url(route('kh.index')) }}">
                    Quản lý khách hàng
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
                        Danh sách
                    </h1>
                </span>
            </div>
            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên khách hàng</th>
                        <th>SĐT</th>
                        <th>Người giới thiệu</th>
                        <th>Tiền hoa hồng</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($khachhang as $key => $val): ?>
                    <tr>
                        <td>{{ $val->stt }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->phone }}</td>
                        @if($val->id_cha == 0)
                            <td></td>
                        @else
                            <th>{{ $val->id_cha }}</th>
                        @endif
                        <td>{{ number_format($val->tien_hoa_hong) }} vnđ</td>
                        @if($val->active == 1)
                            <td><i style="color: #00ff00" class="fa fa-check"></i></td>
                        @else
                            <td><i style="color: red" class="fa fa-close"></i></td>
                        @endif
                        <td class="text-center">
                            <a el="{{ $val->id }}" onclick="getDetails({{$val->id}})" class="btn btn-primary btn-sm" title="xem chi tiet">
                                <i class="fa fa-eye"></i>
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
            <div class="modal fade" id="detailKhachHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="exampleModalLabel">Chi tiết khách hàng</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Tên khách hàng: <span id="tenKH" style="color: red;"></span></label><br>
                                <label>Tiền hoa hồng hiện tại: <span id="tongtien" style="color: red;"></span> VNĐ</label><br>
                                <label>Năm sinh: <span id="namsinh" style="color: red;"></span></label><br>
                                <label>Email: <span id="email" style="color: red;"></span></label><br>
                                <label>Số điện thoại: <span id="sdt" style="color: red;"></span></label><br>
                                <label>Người giới thiệu: <span id="gioithieu" style="color: red;"></span></label><br>
                                <label>SĐT người giới thiệu: <span id="sdtgioithieu" style="color: red;"></span></label><br>

                            </div>
                            <div class="box-body ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="detailuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="modal-title" id="exampleModalLabel">Chi tiết hóa đơn</h4>
                    </div>
                    <div class="panel-body">
                        <div class="box-body ">
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

        function detail(node) {
            // $("#detailuser").modal();
            node.attr('el');
            }
    </script>


    <script type="text/javascript">

        function getDetails(id) {
            // sessionStorage.setItem('id_temp', id);
            $.ajax({
                type: 'GET',
                url: '{{route('kh.detail')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function (res) {
                    $("#tenKH").html(res.data.name);
                    $("#tongtien").html(res.gioithieu.tien_hoa_hong);
                    $("#namsinh").html(res.data.customer_birthday);
                    $("#email").html(res.data.email);
                    $("#sdt").html(res.data.phone);
                    $("#gioithieu").html(res.gioithieu.name);
                    $("#sdtgioithieu").html(res.gioithieu.phone);
                    $("#detailKhachHang").modal('show');
                }
            });
        }
    </script>
@endsection