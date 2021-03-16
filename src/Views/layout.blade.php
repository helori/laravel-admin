<!DOCTYPE html>
<html>
<head>

    <title>Admin</title>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white" />

    <link rel="stylesheet" type="text/css" href="{{ mix('css/admin.css') }}">

</head>

<body id="admin">

<!-- - - - - - - - - - - - - - - - - - - - - - - - - -->
<!-- Content -->
<!-- - - - - - - - - - - - - - - - - - - - - - - - - -->
<main class="pt-5 pb-5">
    <div class="container text-center">
        <div class="ml-auto mr-auto" style="max-width: 500px">
            @yield('content')
        </div>
    </div>
</main>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - -->
<!-- Scripts -->
<!-- - - - - - - - - - - - - - - - - - - - - - - - - -->
<script src="{{ mix('js/admin.js') }}"></script>

</body>
