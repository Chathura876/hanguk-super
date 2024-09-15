<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hanguk Super</title>
    <!-- Theme favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="">
    <meta content="" name="">

    <!-- Head JS -->
    <script type="module" crossorigin="" src="{{asset('Hanguk_super/assets/JS/theme-9c065fc6.JS')}}"></script>
    <script type="module" crossorigin="" src="{{asset('Hanguk_super/assets/JS/auth-23747e5d.JS')}}"></script>
{{--    <link rel="stylesheet" href="{{asset('Hanguk_super/assets/CSS/theme-ecf0ae99.CSS')}}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body{
            background-image: url("{{asset('Hanguk_super/assets/IMG/banner-11-84d6d521.jpg')}}");
        }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="background-color: white; border-radius: 15px;">
                <form class="p-5" method="post" action="{{route('owner.login.check')}}">
                    @csrf
                    <div class="m-2 mb-3">
                        <p class=" text-dark text-center h2">Login</p>

                    </div>


                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label text-dark" for="form3Example3">Email address</label>
                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Enter a valid email address" />

                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label text-dark" for="form3Example4">Password</label>
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Enter password" />

                    </div>



                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                 style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

</section>


</body>

</html>
