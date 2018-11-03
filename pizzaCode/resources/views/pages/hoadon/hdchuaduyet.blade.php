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
                        <tr id="row{{$value->hd_id}}">
                            <td>{{$value->stt}}</td>
                            <td>{{$value->hd_id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td id="total{{$value->hd_id}}">{{number_format($value->tong_tien_hoa_don)}} vnđ</td>
                            <td id="date{{$value->hd_id}}">{{date('H:i:s - d/m/Y', strtotime($value->created_at))}}</td>
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="modal-title">Chỉnh sửa hoá đơn cho khách hàng: <b><span id="user"></span></b>
                            </h4>
                        </div>
                        <div class="col-sm-3">
                            <button id="btn-add" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i>
                                Thêm bánh vào hoá đơn
                            </button>
                        </div>
                    </div>
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
    <div class="modal fade" id="mdl-add" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="modal-title">Thêm bánh</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Chọn bánh</label>
                        <br>
                        <select id="sel-add" class="form-control select2"></select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input id="txt" class="form-control" value="1" type="number">
                    </div>
                    <div class="form-group">
                        <br>
                        <button id="btn-sub" class="btn btn-sm btn-success btn-block">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.0.5/dist/js/tabulator.min.js"></script>
    <script>
        window.addEventListener('resize', function () {
            tbl.redraw(true);
        });

        let icon = function (cell, formatterParams, onRendered) {
            return "<button class='btn btn-danger btn-sm btn-block center-block' title='Xóa bánh khỏi hoá đơn'><i class='fa fa-trash'></i> Xoá</button>";
        };
        let amounts;
        let labels = {
            "Loại Nhỏ": "Loại Nhỏ",
            "Loại Vừa": "Loại Vừa",
            "Loại Lớn": "Loại Lớn"
        };
        let tbl = new Tabulator("#tbl", {
            index: "id",
            height: "100%",
            dataLoaded: function () {
                this.getRows().forEach(function (item) {
                    if (item) {
                        item.freeze();
                    }
                });
            },
            rowDeleted: function (row) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("hoadon.remove")}}',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: row._row.data.id,
                        type: 'item'
                    },
                    success: function (res) {
                        row._row.element.remove();
                        $("#date" + row._row.data.order).html([res.date.date.split(' ')[1].split('.')[0], [res.date.date.split(' ')[0].split('-')[2], res.date.date.split(' ')[0].split('-')[1], res.date.date.split(' ')[0].split('-')[0]].join('/')].join(' - '));
                    }
                });
                if (this.getData().length == 0) {
                    document.querySelector("#row" + row._row.data.order).remove();
                    $.ajax({
                        type: 'POST',
                        url: '{{route("hoadon.remove")}}',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: row._row.data.order,
                            type: 'final'
                        },
                        success: function (res) {
                            if (res.status = 'success') {
                                toastr.success(res.message);
                            } else {
                                toastr.error(res.message);
                            }
                        }
                    });
                } else {
                    $("#total" + row._row.data.order).html(toMoney(toNumber($("#total" + row._row.data.order).html().split(' ')[0]) - toNumber(row._row.data.total)) + ' vnđ');
                }
            },
            columns: [
                {title: "ID", field: "id", align: "center", width: 55},
                {title: "Tên", field: "name", width: 300},
                {
                    title: "Loại",
                    field: "label",
                    align: "center",
                    editor: "select",
                    width: 100,
                    editorParams: labels,
                    cellEdited: function (cell) {
                        let tbl = this;
                        let row = cell.getRow().getData();
                        $.ajax({
                            type: 'POST',
                            url: '{{route("hoadon.type")}}',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: row.id,
                                order: row.order,
                                label: row.label,
                                total: toNumber(row.total)
                            },
                            success: function (res) {
                                $("#total" + row.order).html(toMoney(res.total) + ' vnđ');
                                $("#date" + row.order).html([res.date.date.split(' ')[1].split('.')[0], [res.date.date.split(' ')[0].split('-')[2], res.date.date.split(' ')[0].split('-')[1], res.date.date.split(' ')[0].split('-')[0]].join('/')].join(' - '));
                                res.data[0].price = toMoney(res.data[0].price);
                                res.data[0].total = toMoney(res.data[0].total);
                                tbl.updateRow(row.id, res.data[0]);
                            }
                        });
                    }
                },
                {
                    title: "Số lượng",
                    field: "amounts",
                    align: "center",
                    editor: true,
                    validator: ["required", "integer"],
                    width: 100,
                    cellEditing: function (cell) {
                        amounts = cell.getRow().getData().amounts;
                    },
                    cellEdited: function (cell) {
                        let row = cell.getRow().getData();
                        if (row.amounts == 0) {
                            row.amounts = amounts;
                        } else {
                            row.total = toMoney(toNumber(row.amounts) * toNumber(row.price));
                        }
                        this.updateRow(row.id, row);
                        $.ajax({
                            type: 'POST',
                            url: '{{route("hoadon.update")}}',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: row.id,
                                amounts: Number(row.amounts),
                                order: Number(row.order),
                                total: Number(toNumber(row.total))
                            },
                            success: function (res) {
                                $("#total" + row.order).html(toMoney(res.total) + ' vnđ');
                                $("#date" + row.order).html([res.date.date.split(' ')[1].split('.')[0], [res.date.date.split(' ')[0].split('-')[2], res.date.date.split(' ')[0].split('-')[1], res.date.date.split(' ')[0].split('-')[0]].join('/')].join(' - '));
                            }
                        });
                    },
                },
                {title: "Đơn giá", field: "price", align: "center", width: 100},
                {title: "Thành tiền", field: "total", align: "center", width: 120},
                {
                    title: "", formatter: icon, align: "center", width: 122, cellClick: function (e, cell) {
                        let row = cell.getRow().getData();
                        this.deleteRow(row.id);
                    }
                },
            ],
        });
        $(".select2").select2();
        $("#btn-add").unbind('click').on('click', function () {
            if (tbl.getData() == 0) {
                return;
            }
            document.querySelector("#sel-add").nextSibling.style.width = "100%";
            $.ajax({
                type: 'GET',
                url: '{{route("hoadon.modal")}}',
                data: {
                    order: tbl.getData()[0].order
                },
                success: function (res) {
                    $("#sel-add").empty();
                    res.forEach(function (val) {
                        $("#sel-add").append(new Option(val.ten + ' - ' + val.loai + ' - ' + val.gia, val.id));
                    });
                }
            });
            $("#mdl-add").modal();
        });

        $("#btn-sub").unbind('click').on('click', function () {
            if (document.querySelector("#txt").value == 0) {
                return;
            }
            $.ajax({
                type: 'POST',
                url: '{{route("hoadon.add")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    order: tbl.getData()[0].order,
                    id: document.querySelector("#sel-add").value,
                    amounts: document.querySelector("#txt").value
                },
                success: function (res) {
                    if (res.status == 'failed') {
                        toastr.error(res.message);
                        return;
                    } else {
                        $("#total" + res.data.rows[0].order).html(toMoney(res.data.total) + ' vnđ');
                        $("#date" + res.data.rows[0].order).html([res.data.date.date.split(' ')[1].split('.')[0], [res.data.date.date.split(' ')[0].split('-')[2], res.data.date.date.split(' ')[0].split('-')[1], res.data.date.date.split(' ')[0].split('-')[0]].join('/')].join(' - '));
                        tbl.clearData();
                        tbl.setData(res.data.rows.map(function (val) {
                            val.price = toMoney(val.price);
                            val.total = toMoney(val.total);
                            return val;
                        }));
                        toastr.success(res.message);
                    }
                }
            });
            $("#mdl-add").modal('hide');
        });

        function toMoney(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function toNumber(str) {
            return Number(str.split(',').join(''));
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
                            tbl.setData(res.data.details.map(function (val) {
                                val.price = toMoney(val.price);
                                val.total = toMoney(val.total);
                                return val;
                            }));
                            $("#mdl").modal();
                        } else {
                            return;
                        }
                    }
                });
            }
            return;
        }

        function remove(id) {
            let result = confirm('Lưu ý: Bạn có chắc chắn xóa hóa đơn này ?');
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("hoadon.remove")}}',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id,
                        type: 'all'
                    },
                    success: function (res) {
                        if (res.status = 'success') {
                            document.querySelector("#row" + id).remove();
                            toastr.success(res.message);
                        } else {
                            toastr.error(res.message);
                        }
                    }
                });
            }
        }

        function getDetails(id) {
            $.ajax({
                type: 'GET',
                url: '{{route('hoadon.indexdaduyetdetail')}}',
                data: {
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
                    $("#detailBill").DataTable();
                    $("#detailHoaDon").modal('show');
                }
            });
        }
    </script>
@endsection
