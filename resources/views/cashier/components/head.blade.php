<head>
    <meta charset="utf-8">
    <title>Hanguk Super - Cashier</title>
    <!-- Theme favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset("Hanguk_super/assets/IMG/logo/logo_fav_02.png")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="coderthemes" name="author">

    <!-- Head JS -->
{{--    <script type="module" crossorigin="" src="{{asset("Hanguk_super/assets/JS/admin-dashboard-27890ed3.JS")}}"></script>--}}
{{--    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/theme-9c065fc6.JS")}}">--}}
{{--    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/apexcharts.common-4fae8482.JS")}}">--}}
{{--    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/colors-4fe812b9.JS")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("Hanguk_super/assets/CSS/theme-ecf0ae99.CSS")}}">--}}
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

        #application-sidebar {
            width: 250px;
            height: 100vh;
            /*background: #f8f9fa;*/
            transition: transform 0.3s, width 0.3s;
            overflow-y: auto;
        }
        .sidebar-collapsed {
            width: 64px;
            transform: translateX(-186px);
        }
        #main-content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .content-expanded {
            margin-left: -150px;
        }
        #toggle-sidebar {
            position: absolute;
            top: 10px;
            right: -35px;
            margin-right: 50px;
            z-index: 1000;
            /*background: #007bff;*/
            /*color: white;*/
            border: none;
            padding: 10px;
            cursor: pointer;
            transition: right 0.3s;
        }
        .sidebar-collapsed #toggle-sidebar {
            right: -35px;
        }
    </style>

    @stack('CSS')
</head>
