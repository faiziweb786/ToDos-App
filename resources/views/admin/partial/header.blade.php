


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title', 'Dashboard')</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.css') }}">
<!-- Ionicons -->
{{--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  --}}
{{--  <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">  --}}
@if ($favicon = \App\Models\Favicon::first())
<link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon/' . $favicon->favicon) }}">
@endif
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jquery.vmap.js') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
{{--  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">  --}}
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
{{--  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">  --}}
<link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
{{--  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">  --}}
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

{{--  Pagination style sheet  --}}
<link rel="stylesheet" href="{{ asset('admin/css/pagination.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
