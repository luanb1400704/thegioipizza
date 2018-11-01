@extends('components.index')
@section('style')
    <link href="https://unpkg.com/tabulator-tables@4.0.5/dist/css/tabulator.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hóa Đơn</h1>
        <ol class="breadcrumb bg-gray">
            <li><a><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a>Hóa đơn</a></li>
            <li>Hóa đơn chờ duyệt</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Danh sách đơn hàng chờ duyệt
                    </h1>
                </span>
            </div>
            <form method="get" action="{{ route('hoadon.indexchuaduyet') }}">
                <div class="col-sm-2">
                    <input type="text" name="q" value="{{\Illuminate\Support\Facades\Input::get('q','')}}"
                           class="form-control select2">
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
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Tìm kiếm</button>
                    <a href="{{ route('hoadon.indexchuaduyet') }}" class="btn btn-primary btn-sm" title="xem chi tiet">
                        <i class="fa fa-refresh"></i> Tải lại
                    </a>
                </div>
            </form>
            <br>
            <br>
            <p class="help-block" style="color: red">( * ) Lưu ý : Cần xác nhận lại đơn hàng trước khi duyệt đơn hàng
                !</p>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Tổng Tiền</th>
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
                            <td id="total-{{$value->hd_id}}">{{number_format($value->tong_tien_hoa_don)}} vnđ</td>
                            <td id="date-{{$value->hd_id}}">{{date('H:i:s - d/m/Y', strtotime($value->created_at))}}</td>
                            <td class="text-center">
                                <a href="{{ route('hoadon.done', [$value->hd_id])}}" title="duyệt hóa đơn"
                                   onclick="return confirm('Lưu ý: Bạn có chắc chắn duyệt hóa đơn này, Khi duyệt xong thì không thể thực hiện lại ?')"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-check-square"></i>
                                    Duyệt
                                </a>
                                <a href="#" class="btn btn-primary btn-sm" title="xem chi tiết"
                                   onclick="getDetails({{$value->hd_id}})">
                                    <i class="fa fa-eye"></i>
                                    Xem
                                </a>
                                <a class="btn btn-success btn-sm" title="chỉnh sửa hóa đơn"
                                   onclick="edit({{$value->hd_id}})">
                                    <i class="fa fa-edit"></i>
                                    Sửa
                                </a>
                                <a title="xóa hóa đơn"
                                   onclick="remove({{$value->hd_id}})"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    Xóa
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
    <div class="modal fade" id="mdl" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="modal-title">Chỉnh sửa hoá đơn cho khách hàng: <b><span id="user"></span></b></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div id="tbl"></div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.0.5/dist/js/tabulator.min.js"></script>
    <script type="text/javascript">
        var tbl = new Tabulator("#tbl", {
            height: "311px",
            layout: "fitDataFill",
            columns: [
                {title: "Tên", field: "name", editor: "input"},
                {title: "Loại", field: "type", editor: "input"},
                {title: "Số lương", field: 'amounts', editor: true},
                {
                    title: "Đơn giá", field: "price",
                    editor: false
                    // editorParams: {"male": "Male", "female": "Female"}
                },
                {title: "Thành tiền", field: "total", editor: false},
                // {title: "Tác vụ"},
            ],
        });
        var dataSet = [];
        $(".select2").select2();

        function toMoney(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function getDetails(id) {
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
                    $("#detailBill").DataTable();
                }
            });
        }

        function edit(id) {
            let result = confirm('Lưu ý: Bạn có chắc chắn chỉnh sửa hóa đơn này ?');
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("hoadon.edit")}}',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id
                    },
                    success: function (res) {
                        if (res.status = 'success') {
                            $("#user").html(res.data.user.name + ' - ' + res.data.user.phone);
                            dataSet = res.data
                        } else {
                            return;
                        }
                    }
                });
                tbl.setData([
                    {
                        "name": "Bánh Cá Ngừ , Tôm, Cua",
                        "type": "Loại Nhỏ",
                        "amounts": 1,
                        "price": "30000",
                        "total": "30000"
                    },
                    {
                        "name": "Bánh Cá Ngừ , Tôm, Cua",
                        "type": "Loại Nhỏ",
                        "amounts": 1,
                        "price": "30000",
                        "total": "30000"
                    }
                ]);
                $("#mdl").modal();
            }
            return;
        }

        function remove(id) {
            let result = confirm('Lưu ý: Bạn có chắc chắn xóa hóa đơn này ?');
            if (result) {

            }
        }
    </script>
@endsection