@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hoá Đơn</h1>
        <br>
        <a id="btn-create" class="btn btn-sm btn-default">Tạo Khách Hàng</a>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Hóa Đơn
                </a>
            </li>
            <li>Tạo Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo Hóa Đơn</h3>
                    </div>
                    <div class="box-body">
                        <input type="hidden" name="json" value="">
                        <div class="form-group">
                            <label>Nhân Viên Lập Hóa Đơn </label>
                            <input type="text" readonly class="form-control" value="{{ $hold[0]->name }}">
                        </div>
                        <div class="form-group">
                            <label>Tên Khách Hàng </label>
                            <select name="khach_hang" class="form-control select2">
                                @foreach($hold[1] as $val)
                                    <option value="{{ $val->id }}">{{ $val->name }} - {{ $val->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn Bánh</label>
                            <select id="pizza" name="id_banh" class="form-control select2">
                                @foreach($hold[2] as $val)
                                    <option value="{{ $val->id }}">{{ $val->ten }}
                                        - {{ $val->loai }} - {{ $val->gia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input id="amount" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <a id="btn-add" class="btn btn-default btn-sm">Thêm bánh</a>
                        </div>
                        <div class="box-footer">
                            <button id="btn-add-order" class="btn btn-success btn-sm btn-block center-block">
                                Tạo hóa đơn
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th>Số lương</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="list">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tổng tiền</h3>
                    </div>
                    <div class="box-body">
                        <span id="total">0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mdl" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="modal-title">Thêm khách hàng mới</h4>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Người giới thiệu</label>
                                        <select name="id_cha" style="width: 100%" class="form-control select2">
                                            <option value="0" selected disabled>----</option>
                                            @foreach($hold[1] as $val)
                                                <option value="{{ $val->id }}">{{ $val->name }}
                                                    - {{ $val->phone }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <a type="button" id="btn-add-customer"
                                   class="btn btn btn-success btn-block center-block">Thêm</a>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn btn-default btn-block center-block"
                                        data-dismiss="modal">Hủy
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#amount").val(0);
        });
        var json = JSON.parse('@json($hold[2])');
        var box = JSON.parse('@json($hold[2])');
        var total = 0;
        var customer = {
            'name': '',
            'phone': '',
            'password': '',
            'id_cha': ''
        };

        function toMoney(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function removeRow(node) {
            total -= Number(node.attr('total'));
            node.parents('tr').remove();
            $("#total").html(toMoney(total));
            box[node.attr('box')].soluong = 0;
        }

        function createBox(box, contain) {
            for (let prop in box) {
                contain[box[prop].id] = {
                    'id': box[prop].id,
                    'soluong': 0
                };
            }
            return contain;
        }

        box = createBox(box, []);

        $(".js-example-placeholder-multiple").select2({
            placeholder: "Select a state"
        });
        $(".select2").select2();
        $("#btn-create").unbind('click').on('click', function () {
            $("#mdl").modal();
        });
        $("#btn-add").unbind('click').on('click', function () {
            let id = $("#pizza").val();
            let amount = $("#amount").val();
            if (amount < 1) {
                return;
            }
            total += Number(json[id].gia) * amount;
            if (box[id].soluong === 0) {
                let html = '<tr id="box-' + id + '">';
                html += '<td style="vertical-align: inherit;">' + json[id].ten + '</td>';
                html += '<td style="vertical-align: inherit;">' + json[id].loai + '</td>';
                html += '<td style="vertical-align: inherit;">' + amount + '</td>';
                html += '<td style="vertical-align: inherit;">' + toMoney(json[id].gia) + '</td>';
                html += '<td style="vertical-align: inherit;">' + toMoney(Number(json[id].gia) * amount) + '</td>';
                html += '<td style="vertical-align: inherit;"><a class="btn btn-sm btn-default" box="' + id + '" title="Loại bỏ" total="' + Number(json[id].gia) * amount + '" onclick="removeRow($(this))"><i class="fa fa-remove"></i></a></td>';
                html += '</tr>';
                $("#list").append(html);
                box[id].soluong = Number(amount);
            } else {
                box[id].soluong += Number(amount);
                $("#box-" + id).find("td")[0].innerHTML = json[id].ten;
                $("#box-" + id).find("td")[1].innerHTML = json[id].loai;
                $("#box-" + id).find("td")[2].innerHTML = box[id].soluong;
                $("#box-" + id).find("td")[3].innerHTML = toMoney(json[id].gia);
                $("#box-" + id).find("td")[4].innerHTML = toMoney(Number(json[id].gia) * box[id].soluong);
                $("#box-" + id).find("td")[5].children[0].setAttribute('total', Number(json[id].gia) * box[id].soluong);
            }
            $("#total").html(toMoney(total));
        });
        $("#btn-add-customer").unbind('click').on('click', function () {
            customer._token = '{{csrf_token()}}';
            customer.name = $("input[name = 'name']").val();
            customer.phone = $("input[name = 'phone']").val();
            customer.password = $("input[name = 'password']").val();
            customer.id_cha = $("select[name = 'id_cha']").val();
            axios.post('{{ route('hoadon.customer') }}', customer).then(function (response) {
                alert(response.data.message);
                $("select[name = 'khach_hang']").empty();
                $("select[name = 'id_cha']").empty();
                $("select[name = 'id_cha']").append(new Option("----", "0"));
                response.data.data[1].forEach(function (item) {
                    $("select[name = 'khach_hang']").append(new Option(item.name + " - " + item.phone, item.id));
                    $("select[name = 'id_cha']").append(new Option(item.name + " - " + item.phone, item.id));
                });
                $("select[name = 'khach_hang']").val(response.data.data[0]);
                $("#mdl").modal('hide');
            }).catch(function (error) {
                console.log(error);
            });
        });
        $("#btn-add-order").unbind('click').on('click', function () {
            if ($("#total").html() < 1) {
                return;
            }
            axios.post('{{ route('hoadon.store') }}', {
                '_token': '{{ @csrf_token() }}',
                'khach_hang': $("select[name = 'khach_hang']").val(),
                'json': JSON.stringify(box),
                'sum': total
            }).then(function (response) {
                alert(response.data.message);
                window.location = '{{route('hoadon.indexchuaduyet')}}';
            }).catch(function (error) {
                console.log(error);
            });
        });
    </script>
@endsection
