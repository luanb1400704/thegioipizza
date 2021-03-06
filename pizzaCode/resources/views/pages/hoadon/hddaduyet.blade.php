@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hóa Đơn</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Hóa đơn</a></li>
            <li>Hóa đơn đã duyệt</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách hóa đơn đã duyệt
                    </h1>
                </span>
            </div>
            <form method="get" action="{{ route('hoadon.indexdaduyet') }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <input type="text" name="q" value="{{\Illuminate\Support\Facades\Input::get('q','')}}"
                                   class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control select2" name="k">
                                <option value="">Tên khách hàng</option>
                                @foreach ($tenkhachhang as $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control select2" name="i">
                                <option value="">Số điện thoại</option>
                                @foreach ($sdtkhachhang as $val)
                                    <option value="{{ $val->id }}">{{ $val->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button title="Tìm kiếm" type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Tìm kiếm</button>
                            <a href="{{ route('hoadon.indexdaduyet') }}" class="btn btn-primary btn-sm" title="Tải lại trang">
                                <i class="fa fa-refresh"></i> Tải lại
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2" style="display: -webkit-box">
                            <label>Từ ngày : </label>
                            <input type="date" name="1" value="{{\Illuminate\Support\Facades\Input::get('1','')}}"
                                   class="form-control">
                        </div>
                        <div class="col-sm-2" style="display: -webkit-box;margin-left: 30px">
                            <label>Đến ngày : </label>
                            <input type="date" name="2" value="{{\Illuminate\Support\Facades\Input::get('2','')}}"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Tổng Tiền Hóa Đơn</th>
                        <th>Ngày Đặt Hàng</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($khachhang as $key=>$value)
                        <tr>
                            <td>{{$value->stt}}</td>
                            <td>{{$value->hd_id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{number_format($value->tong_tien_hoa_don)}} vnđ</td>
                            <td>{{date('H:i:s - d/m/Y', strtotime($value->created_at))}}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm" title="Xem chi tiết"
                                   onclick="getDetails({{$value->hd_id}})">
                                    <i class="fa fa-eye"></i>
                                    Xem
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid" align="right">
            {{ $khachhang->links() }}
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
                            <table id="detailBill" class="table table-bordered table-striped text-center">
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
        $(".select2").select2();

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
                    var chitiet = res.data.chitiet;
                    $("#tenNV").html(res.data.hoadon.name);
                    $("#tongtien").html(res.data.hoadon.tong_tien_hoa_don);
                    var htmlTable = '';
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
                    $("#detailBill").DataTable();

                }
            });
        }
    </script>
@endsection