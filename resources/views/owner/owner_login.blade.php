<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hanguk Super</title>
    <!-- Theme favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="coderthemes" name="author">

    <!-- Head JS -->
    <script type="module" crossorigin="" src="{{asset('Hanguk_super/assets/JS/theme-9c065fc6.JS')}}"></script>
    <script type="module" crossorigin="" src="{{asset('Hanguk_super/assets/JS/auth-23747e5d.JS')}}"></script>
    <link rel="stylesheet" href="{{asset('Hanguk_super/assets/CSS/theme-ecf0ae99.CSS')}}">
    <style>
        body{
            background-image: url("{{asset('Hanguk_super/assets/IMG/banner-11-84d6d521.jpg')}}");
        }
    </style>
</head>

<body>
<section
    class="sm:p-10 p-6 flex items-center lg:justify-center justify-center relative bg-no-repeat bg-cover min-h-screen"
    style="background-image: url('{{asset('Hanguk_super/assets/IMG/banner-11.jpg')}}');">


    <div class="max-w-lg w-full  rounded-xl bg-white/80 backdrop-blur-2xl sm:p-10 p-6 h-full flex flex-col dark:bg-default-50/60 border-t-4 border-primary">
        <div class="flex justify-center items-center w-full h-full">
            <a href="index.html" class="block mb-5">
                <img class="h-12 block dark:hidden" src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="" style="width: 150px; height: 170px;">
                <img class="h-12 hidden dark:block" src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="" style="width: 150px; height: 170px;">
            </a>
        </div>
        <div class="my-auto">
            <div class="max-w-xl mx-auto">
                <h4 class="text-default-900 text-2xl font-semibold mb-2" style="text-align: center;">Login</h4>

{{--                ==========================================================================================================--}}
{{--                ================================Login form================================================================--}}
{{--                =========================================================================================================--}}
                <form  class="shrink mt-10" enctype="multipart/form-data" action="{{route('owner.login.check')}}" method="post">
                    @csrf
                <div class="mb-4">
                    <label for="LogInEmailAddress" class="block text-base/normal font-semibold text-default-800 mb-2">Email address</label>
                    <input  class="block w-full rounded-md py-2.5 px-4 bg-transparent border-default-400/40 text-default-900 focus:outline-0 focus:ring-0" type="email"  placeholder="Enter your email" name="email">
                    <span  class="text-red-500 mt-1 block"></span>
                </div>
                <!-- end email input -->
                <div class="mb-4">
                    <label for="password" class="block text-base/normal font-semibold text-default-800 mb-2">Password</label>
                    <div class="flex">
                        <input type="password" id="form-password"
                               class="form-password text-default-900 block w-full
                               rounded-s-md py-2.5 px-4 bg-transparent border
                               border-default-400/40 focus:ring-transparent"
                               placeholder="Enter your password" name="password">

                        <button type="button" id="password-addon" class="password-toggle inline-flex items-center justify-center py-2.5 px-4 border rounded-e-md bg-transparent -ms-px border-default-400/40">
                            <i class="ti ti-eye password-eye-on text-xl text-default-900"></i>
                            <i class="ti ti-eye-off password-eye-off text-xl text-default-900 hidden"></i>
                        </button>
                    </div>
                    <span data-x-field-error="password" class="text-red-500 mt-1 block"></span>
                </div>
                <!-- end password input -->
                <div class="flex justify-between items-center flex-wrap gap-x-1 gap-y-2 mb-5">
                    <div class="inline-flex items-center">
                        <input type="checkbox" class="h-4 w-4 rounded border-default-400/80 bg-transparent text-primary focus:border-primary focus:ring focus:ring-primary/60 focus:ring-offset-0" >
                        <label class="text-base/none ms-2 text-default-800 align-middle select-none" for="checkbox-signin">Remember me</label>
                    </div>
                    <a href="auth-recoverpw.html" class="text-default-800 border-b border-dashed border-default-400/80"><small>Forgot your password?</small></a>
                </div>
                <!-- end checkbox input -->
                <div class="mb-6">
                    <button type="submit" class="w-full relative inline-flex items-center justify-center px-6 py-2.5 rounded-md text-base bg-primary text-white capitalize transition-all duration-200 hover:bg-primary-600 font-medium">Log In </button>
                </div>
            </form>

        </div>
    </div>
    </div>
</section>


<!-- Theme Js -->

<!-- Light Dark theme -->
<button class="fixed end-0 top-1/4 z-50">
    <span class="relative inline-flex h-10 w-10 items-center justify-center gap-2 overflow-hidden rounded-s-xl bg-primary align-middle font-medium text-white transition-all hover:bg-primary-600">
      <i class="ti ti-sun text-xl after:absolute after:inset-0" id="dark-theme"></i>
      <i class="ti ti-moon text-xl after:absolute after:inset-0" id="light-theme"></i>
    </span>
</button>
<!-- Auth Js -->


</body>

</html>
