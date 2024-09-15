<head>
    <meta charset="utf-8">
    <title>Hanguk Super - Owner</title>
    <!-- Theme favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset("Hanguk_super/assets/IMG/logo/logo_fav_02.png")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="coderthemes" name="author">

    <!-- Head JS -->
    <script type="module" crossorigin="" src="{{asset("Hanguk_super/assets/JS/admin-dashboard-27890ed3.JS")}}"></script>
    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/theme-9c065fc6.JS")}}">
    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/apexcharts.common-4fae8482.JS")}}">
    <link rel="modulepreload" crossorigin="" href="{{asset("Hanguk_super/assets/JS/colors-4fe812b9.JS")}}">
    <link rel="stylesheet" href="{{asset("Hanguk_super/assets/CSS/theme-ecf0ae99.CSS")}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP0Zk8z9h3aaC2EoBpY4WcFgI3Q76wPa3zXiqc5gQ9M=" crossorigin="anonymous"></script>

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
            /*padding: 20px;*/
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

         .bg-success-custom {
             background-color: #d4edda; /* Light green background */
             color: #155724; /* Dark green text */
             padding: 1rem; /* Padding for the alert box */
             border-radius: 0.5rem; /* Rounded corners */
             margin-bottom: 1rem; /* Space below the alert box */
         }

        .text-green-custom {
            color: #155724; /* Dark green text */
        }


        /*+++ new CSS +++*/

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }


    </style>

    @stack('CSS')
    <!-- Add this in your HTML file, preferably in the <head> or just before closing the </body> tag -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP0Zk8z9h3aaC2EoBpY4WcFgI3Q76wPa3zXiqc5gQ9M=" crossorigin="anonymous"></script>

</head>
