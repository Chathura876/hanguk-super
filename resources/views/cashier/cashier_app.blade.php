<!doctype html>
<html lang="en">

@include('cashier.components.head')
@stack('CSS')
<body>
{{--@include('supermarketpos::cashier.components.sidebar')--}}
{{--<div class="min-h-screen lg:ps-64 w-full">--}}
{{--    @include('supermarketpos::cashier.components.header')--}}

    @yield('content')

{{--    @include('cashier.components.footer')--}}
{{--</div>--}}
@stack('script')
</body>
</html>
