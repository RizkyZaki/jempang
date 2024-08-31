<!DOCTYPE html>
<html lang="id">

<head>
    @include('client.plugins._top')
</head>

<body id="main-wrapper">
    <div class="header header-light head-shadow">
        @include('client.components._nav')
    </div>
    <div class="clearfix"></div>

    @yield('content-client')

    @include('client.components._footer')
    @include('client.plugins._bottom')
</body>

</html>
<!-- End Navigation -->
