<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Human Rights Commissions</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        .bg-gradient-primary {
            background-color: #626262 !important;
            background-image: none !important;
            background-size: cover;
        }
        .card-header h6 {
            text-align: center;
            font-size: 1.6rem;
        }
        form.user .form-control-user {
            border-radius: 8px;
            font-size: 1rem;
        }
        form.user .btn-user {
            background-color: #273151;
            border-color: #273151;
            font-size: 1rem;
        }
        #loading {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            position: absolute;
            top: 100px;
            left: 240px;
            z-index: 100;
        }

        .btn-user {padding: 5rem !important;}
    </style>
</head>

<body class="bg-gradient-primary">
<div id="loading" style="display: none;">
    <img id="loading-image" src="{{asset('loading.gif')}}" alt="Loading..." />
</div>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">مرحبا بعودتكم!</h1>
                                </div>
                                <form class="user">
                                    <a href="{{route('secretary')}}" class="btn btn-google btn-user btn-block">
                                        الرئيس
                                    </a>
                                    <br><br>
                                    <a href="{{route('cards')}}" class="btn btn-facebook btn-user btn-block">
                                         السكرتارية
                                    </a>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
