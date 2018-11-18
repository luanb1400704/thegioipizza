@extends('components.index')
@section('content')
    <section class="content-header">
        <h1>Quản Lý Bánh Pizza</h1>
        <ol class="breadcrumb bg-gray">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('banh.index') }}">
                    Quản Lý Bánh
                </a>
            </li>
            <li>Cập Nhật</li>
        </ol>
    </section>
    <section class="content">
        <form role="form" action="{{ route('banh.update',[$banh->b_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Mới Bánh Pizza</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên Bánh <span class="text-red">( <i class="fa fa-check-circle-o"></i> bắt buộc )</span></label>
                                <input type="text" class="form-control" name="b_ten" value="{{ $banh->b_ten }}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả <span class="text-red">( <i
                                                class="fa fa-check-circle-o"></i> bắt buộc )</span> </label>
                                <textarea type="text" class="form-control content" name="b_mota">
                                    {{ $banh->b_mota }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh Của Bánh</label>
                                <br>
                                @if(empty($banh->b_anh))
                                    <img width="180px" height="180px" id="avatar" src="{{url('upload')}}/image.png"
                                         alt="your image"/>
                                @else
                                    <img width="180px" height="180px" id="avatar" src="{{url('upload')}}/{{ $banh->b_anh }}"
                                         alt="your image"/>
                                @endif
                                <input style="margin-top: 10px;" type='file' name="file" onchange="readURL(this)"/>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success btn-sm btn-flat margin">
                                    Lưu
                                </button>
                                <a href="{{ url('banh/index') }}" class="btn bg-red btn-sm btn-flat margin">
                                    Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#avatar").attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function replaceSpace(e) {
            var val = $(e).val();
            $(e).val(val.replace(" ", "_"));
        }

        CKEDITOR.replaceClass = 'content';
    </script>
@endsection
