<!DOCTYPE html>
<html lang="en">
<!--================Head =================-->
@include('theme.partials.head')
<!--================"Head =================-->
<body>
<!--================Header Menu Area =================-->

@include('theme.partials.header')
<!--================Header Menu Area =================-->


@yield('content')

<!--================ Start Footer Area =================-->

@include('theme.partials.footer')
<!--================ End Footer Area =================-->

<!--================Scripts =================-->
@include('theme.partials.scripts')
<!--================Scripts =================-->
</body>
</html>
