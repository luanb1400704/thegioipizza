<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thế giới pizza</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('patotheme/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/vendor/lightbox2/css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/css/main.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('patotheme/css/editor.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('css/style-edit.css')}}">

    <link href="{{ url('toastr/toastr.min.css') }}" rel="stylesheet">




    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Dancing+Script" rel="stylesheet">

</head>
<body class="animsition">

<!-- Header -->
@include('website.component.header')

<!-- Sidebar -->
@include('website.component.sidebar')

@yield('content')

<!-- Footer -->
@include('website.component.footer')


        <!-- Back to top -->
@include('website.component.backtotop')




<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/bootstrap/js/popper.js')}}"></script>
<script type="text/javascript" src="{{url('patotheme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('patotheme/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('patotheme/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/parallax100/parallax100.js')}}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{url('patotheme/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<!--===============================================================================================-->
<script src="{{url('patotheme/js/main.js')}}"></script>

<!--===============================================================================================-->
<script src="{{url('patotheme/js/sweetalert.min.js')}}"></script>
<script src="{{ url('toastr/toastr.min.js') }}" type="text/javascript"></script>


<!-- message-->
@include('components.messages')
<script>
    $(document).ready(function() {
        $('.close-nss').click(function() {
            document.getElementById('close-btn-nss').click();
        });
    });
</script>
<!-- message-->
</body>
</html>
