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

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-10 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" >

                        <div id="employee-id" class="col-lg-12" style="display: flex;justify-content: center;align-items: center;">
                            <div class="p-5 w-100" >
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">برجاء كتابة اسم الضيف !</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="nationalId" aria-describedby="nationalId"
                                               placeholder="برجاء كتابة اسم الضيف ...">
                                    </div>
                                    <button type="button" class="btn btn-primary btn-user btn-block">
                                        ارسال
                                    </button>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>


        @foreach($visitors as $visitor)
        <div class="col-lg-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{$visitor->name}}</h6>
                </div>
                <div class="card-body">
                    @if($visitor->status == 'pending')
                        <div class="card mb-4  border-left-secondary" style="border: 0;">
                            <div class="card-body" style="border: 0;padding: 8px 20px;">
                                الضيف في انتظار رد سيادتكم.
                            </div>
                        </div>
                    @elseif($visitor->status == 'waiting')
                        <div class="card mb-4  border-left-warning" style="border: 0;">
                            <div class="card-body" style="border: 0;padding: 8px 20px;">
                                الضيف في صالة الانتظار.
                            </div>
                        </div>
                    @elseif($visitor->status == 'rejected')
                        <div class="card mb-4  border-left-danger" style="border: 0;">
                            <div class="card-body" style="border: 0;padding: 8px 20px;">
                                تم رفض المقابلة.
                            </div>
                        </div>
                    @elseif($visitor->status == 'accepted')
                        <div class="card mb-4  border-left-success" style="border: 0;">
                            <div class="card-body" style="border: 0;padding: 8px 20px;">
                                تم دخول الضيف.
                            </div>
                        </div>
                    @elseif($visitor->status == 'done')
                        <div class="card mb-4  border-left-info" style="border: 0;">
                            <div class="card-body" style="border: 0;padding: 8px 20px;">
                                تم مغادرة الضيف.
                            </div>
                        </div>
                    @endif
                    <h5 class="font-weight-bold text-success text-uppercase mb-1">
                    </h5>
                    <a href="#" onclick="changeStatus('{{$visitor->id}}', 'accepted')" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                        <span class="text">ادخل الضيف</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" onclick="changeStatus('{{$visitor->id}}', 'waiting')" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                        <span class="text">ارسال الضيف في صالة الانتظار</span>
                    </a>
                    <div class="my-2"></div>
                    <a href="#" onclick="changeStatus('{{$visitor->id}}', 'rejected')" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                        <span class="text">رفض استقبال الضيف</span>
                    </a>
                        <div class="my-2"></div>
                        <a href="#" onclick="changeStatus('{{$visitor->id}}', 'done')" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                            <span class="text">مغادرة الضيف</span>
                        </a>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#otp").hide();
        $("#employee-id .btn-user").click(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var nationalId = $('#nationalId').val();
            var request = $.ajax({
                url: "{{ route('login.send_visitor') }}",
                method: "POST",
                data: {name : nationalId, _token: CSRF_TOKEN},
            });

            request.done(function( data ) {
                if(data.status == 'success') {
                    window.location.href = '/'
                }
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });


    })


    function changeStatus(id, status) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var request = $.ajax({
            url: "{{ route('login.update_status') }}",
            method: "POST",
            data: {id,  status, _token: CSRF_TOKEN},
        });

        request.done(function( data ) {
            if(data.status == 'success') {
                window.location.href = '/'
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }
</script>
</body>

</html>
