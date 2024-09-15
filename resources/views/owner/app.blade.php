
<html lang="en">

@include('owner.component.head')

<body>

@include('owner.component.sidebar')


<div style="width: auto" id="main-content" class="min-h-screen flex flex-col lg:ps-64 w-full">
    @include('owner.component.header')

    @yield('content')

    @include('owner.component.footer')
</div>
@stack('script')

</body>
</html>
