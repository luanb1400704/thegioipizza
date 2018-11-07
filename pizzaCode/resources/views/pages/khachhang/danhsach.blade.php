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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($khachhang as $val)
                        <tr>
                            <td>{{ $val->stt }}</td>
                            <td>{{ $val->ten }}</td>
                            <td>{{ $val->sdt }}</td>
                            @if(isset($val->nguoigioithieu))
                            <td>{{ $val->nguoigioithieu }}</td>
                            @else
                                <td>( 0 )</td>
                            @endif
                            <td>{{ number_format($val->tien) }} vnđ</td>
                            <td class="text-center">
                                <a el="{{ $val->id }}" onclick="getDetails({{$val->id}})" class="btn btn-primary btn-sm"
                                   title="xem chi tiết">
                                    <i class="fa fa-eye"></i>
                                    Xem
                                </a>
                                {{--<a href="#" class="btn bg-olive btn-sm btn-flat">--}}
                                    {{--<i class="fa fa-key"></i>--}}
                                {{--</a>--}}
                            </td>
                        </tr>
                    @endforeach
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
                            <div class="box box-widget widget-user-2">
                                <div class="widget-user-header bg-aqua-active">
                                    <div class="widget-user-image">
                                        <img id="avatar" class="img-circle" alt="Chưa cập nhật ảnh">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 id="tenKH" class="widget-user-username"></h3>
                                    <h5 id="sdt" class="widget-user-desc"></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiền hoa hồng hiện tại: <span id="tongtien" style="color: red;"></span>
                                    VNĐ</label><br>
                                <label>Thời hạn lãnh tiền: <span id="thoihan" style="color: red;"></span></label><br>
                                <label>Năm sinh: <span id="namsinh" style="color: red;"></span></label><br>
                                <label>Email: <span id="email" style="color: red;"></span></label><br>
                                <label>Người giới thiệu: <span id="gioithieu" style="color: red;"></span></label><br>
                                <label>SĐT người giới thiệu: <span id="sdtgioithieu" style="color: red;"></span></label><br>

                            </div>
                            <div class="box-body ">
                                <form role="form" action="{{ route('kh.changePass') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id_kh" id="id_kh">
                                    <label>Mật khẩu mới</label>
                                    <div class="row">

                                        <div class="col-md-7">
                                            <input type="password" id="password" name="password" class="form-control"
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                        <span onclick="changInput()" class="btn bg-olive"><i class="fa fa-fw fa-eye"></i></span>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn bg-olive">Xác nhận</button>
                                        </div>
                                    </div>
                                </form>
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
                    $("#id_kh").attr("value", res.data.id ? res.data.id : 'Chưa cập nhật');
                    $("#avatar").attr("src", res.data.customer_image ? '../upload/'+ res.data.customer_image : 'Chưa cập nhật')
                    $("#tenKH").html(res.data.name ? res.data.name : 'Chưa cập nhật');
                    $("#tongtien").html(res.gioithieu.tien_hoa_hong ? res.gioithieu.tien_hoa_hong : 0);
                    $("#thoihan").html(res.gioithieu.danh_dau ? res.gioithieu.danh_dau : 'Chưa cập nhật');
                    $("#namsinh").html(res.data.customer_birthday ? res.data.customer_birthday : 'Chưa cập nhật');
                    $("#email").html(res.data.email ? res.data.email : 'Chưa cập nhật');
                    $("#sdt").html(res.data.phone ? res.data.phone : 'Chưa cập nhật');
                    $("#gioithieu").html(res.gioithieu.name ? res.gioithieu.name : 'Không có người giới thiệu');
                    $("#sdtgioithieu").html(res.gioithieu.phone ? res.gioithieu.phone : 'Không có số điện thoại');
                    $("#detailKhachHang").modal('show');
                }
            });
        }

        // function changInput() {
        //     $("#password").prop('readonly', false);
        //     console.log('xong')
        // }
    </script>
@endsection