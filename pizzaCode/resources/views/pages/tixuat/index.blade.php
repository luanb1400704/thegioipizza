@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Hoa Hồng</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Hoa hồng
                </a>
            </li>
            <li>Tỉ xuất</li>
        </ol>
    </section>
    <section class=" content col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
               <span class="">
                    <h1 class="box-title text-primary">
                        <i class="ion ion-clipboard "></i>
                        Tỉ Xuất Hoa Hồng
                    </h1>
                </span>
                <span class="pull-right">
                    <a href="" type="button" class="btn bg-aqua btn-sm btn-flat margin">
                        Thêm tỉ xuất
                    </a>
                </span>
            </div>
            <div class="box-body ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tỉ Lệ Tỉ Xuất</th>
                        <th>Bật</th>
                        <th>Cấp</th>
                    </tr>
                    </thead>
                    {{----}}
                </table>
            </div>
        </div>
    </section>
@endsection
