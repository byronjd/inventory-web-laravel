<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Vendor styles -->
    @yield('vendor-styles')

</head>
<body class="app">
    <div id="app">

    </div>

    <!-- Page Specific JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
