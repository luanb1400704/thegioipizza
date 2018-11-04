<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>thegioipizza</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Theme style -->

    {{--<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">--}}

    <link href="{{ url('toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
{{--<link rel="stylesheet" href="{{url('bower_components/morris.js/morris.css')}}">--}}
<!-- jvectormap -->
    <link rel="stylesheet" href="{{url('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{url('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{url('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>

    <![endif]-->
    <!-- jQuery 3 -->
    <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{url('css/style-edit.css')}}">
    @yield('style')
    <style>
        .actives {
            background-color: #5f2b14 !important;
            /*color: yellow !important;*/
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-size: 12px">
<div class="wrapper">

    <!-- Navbar -->
@include('components.navigation')
<!-- navbar-->

    <!-- Main Sidebar Container -->
@include('components.menu')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="">

        @yield('content')
    </div>
    <!-- /.content-wrapper -->
@include('components.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
    {{--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">--}}
    {{--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>--}}
    {{--<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>--}}
    {{--</ul>--}}
    <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
            {{--<h3 class="control-sidebar-heading">Recent Activity</h3>--}}
            {{--<ul class="control-sidebar-menu">--}}
            {{--<li>--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<i class="menu-icon fa fa-birthday-cake bg-red"></i>--}}

            {{--<div class="menu-info">--}}
            {{--<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>--}}

            {{--<p>Will be 23 on April 24th</p>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<i class="menu-icon fa fa-user bg-yellow"></i>--}}

            {{--<div class="menu-info">--}}
            {{--<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>--}}

            {{--<p>New phone +1(800)555-1234</p>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="'javascript:void(0)">--}}
            {{--<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>--}}

            {{--<div class="menu-info">--}}
            {{--<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>--}}

            {{--<p>nora@example.com</p>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<i class="menu-icon fa fa-file-code-o bg-green"></i>--}}

            {{--<div class="menu-info">--}}
            {{--<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>--}}

            {{--<p>Execution time 5 seconds</p>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            <!-- /.control-sidebar-menu -->

                {{--<h3 class="control-sidebar-heading">Tasks Progress</h3>--}}
                {{--<ul class="control-sidebar-menu">--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0)">--}}
                {{--<h4 class="control-sidebar-subheading">--}}
                {{--Custom Template Design--}}
                {{--<span class="label label-danger pull-right">70%</span>--}}
                {{--</h4>--}}

                {{--<div class="progress progress-xxs">--}}
                {{--<div class="progress-bar progress-bar-danger" style="width: 70%"></div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0)">--}}
                {{--<h4 class="control-sidebar-subheading">--}}
                {{--Update Resume--}}
                {{--<span class="label label-success pull-right">95%</span>--}}
                {{--</h4>--}}

                {{--<div class="progress progress-xxs">--}}
                {{--<div class="progress-bar progress-bar-success" style="width: 95%"></div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:void(0)">--}}
                {{--<h4 class="control-sidebar-subheading">--}}
                {{--Laravel Integration--}}
                {{--<span class="label label-warning pull-right">50%</span>--}}
                {{--</h4>--}}

                {{--<div class="progress progress-xxs">--}}
                {{--<div class="progress-bar progress-bar-warning" style="width: 50%"></div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="{javascript:void(0)">--}}
                {{--<h4 class="control-sidebar-subheading">--}}
                {{--Back End Framework--}}
                {{--<span class="label label-primary pull-right">68%</span>--}}
                {{--</h4>--}}

                {{--<div class="progress progress-xxs">--}}
                {{--<div class="progress-bar progress-bar-primary" style="width: 68%"></div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.control-sidebar-menu -->--}}

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
        {{--<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>--}}
        <!-- /.tab-pane -->
            <!-- Settings tab content -->
        {{--<div class="tab-pane" id="control-sidebar-settings-tab">--}}
        {{--<form method="post">--}}
        {{--<h3 class="control-sidebar-heading">General Settings</h3>--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Report panel usage--}}
        {{--<input type="checkbox" class="pull-right" checked>--}}
        {{--</label>--}}

        {{--<p>--}}
        {{--Some information about this general settings option--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Allow mail redirect--}}
        {{--<input type="checkbox" class="pull-right" checked>--}}
        {{--</label>--}}

        {{--<p>--}}
        {{--Other sets of options are available--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Expose author name in posts--}}
        {{--<input type="checkbox" class="pull-right" checked>--}}
        {{--</label>--}}

        {{--<p>--}}
        {{--Allow the user to show his name in blog posts--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}

        {{--<h3 class="control-sidebar-heading">Chat Settings</h3>--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Show me as online--}}
        {{--<input type="checkbox" class="pull-right" checked>--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Turn off notifications--}}
        {{--<input type="checkbox" class="pull-right">--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}

        {{--<div class="form-group">--}}
        {{--<label class="control-sidebar-subheading">--}}
        {{--Delete chat history--}}
        {{--<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--<!-- /.form-group -->--}}
        {{--</form>--}}
        {{--</div>--}}
        <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js' charts -->
{{--<script src="{{url('bower_components/raphael/raphael.min.js')}}"></script>--}}
{{--<script src="{{url("bower_components/morris.js/morris.min.js")}}"></script>--}}
<!-- Sparkline -->
<script src="{{url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{url('dist/js/pages/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{url('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>


<script src="{{url('jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>
<script src="{{url('jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>


<script src="{{ url('toastr/toastr.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ url('toastr/sweetalert.min.js') }}"></script>--}}

{{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>--}}
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@include('components.messages')
<script>
    function getBadge() {
        fetch('{{ route('hoadon.get-badge') }}')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                document.querySelectorAll(".have-badge").forEach(function (val) {
                    val.innerHTML = data;
                });
            });
    }

    getBadge();
    var run = setInterval("getBadge()", 5 * 60 * 1000);
</script>
@yield('script')
</body>
</html>
