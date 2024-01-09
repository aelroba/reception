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

    </style>
</head>

<body class="bg-gradient-primary">
<div id="loading" style="display: none;">
    <img id="loading-image" src="{{asset('loading.gif')}}" alt="Loading..." />
</div>
<div class="container">
    <br>
    <a class="btn btn-primary" href="{{url('/')}}">الرجوع للرئيسية</a>

    <!-- Outer Row -->
    <div class="row justify-content-center mt-4">


        @foreach($visitors as $visitor)
            <div class="col-lg-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 te">
                        <h6 class="m-0 font-weight-bold text-primary">{{$visitor->name}}</h6>
                        <p class="m-0 font-weight-normal text-primary text-center">{{$visitor->position}}</p>
                    </div>

                    <div class="card-body">
                        <div class="card mb-4 bg-light" style="border: 0;">
                            <div class="card-body text-secondary small" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                رقم الطلب : {{ $visitor->id }}
                            </div>
                        </div>
{{--                        @if(in_array($visitor->status, ['waiting', 'pending']))--}}
                            <div class="card mb-4 bg-light" style="border: 0;">
                                <div class="card-body text-secondary small" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    مدة الانتظار : {{ $visitor->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                                </div>
                            </div>
{{--                        @endif--}}
                        <div class="card mb-4 bg-light" style="border: 0;">
                            <div class="card-body text-secondary" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                ملاحظات :
                            </div>
                            <div class="card-body text-secondary" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                {{ $visitor->status }}
                            </div>
                        </div>
{{--                        @if(!empty($visitor->other_notes))--}}
                            <div class="card mb-4 bg-light" style="border: 0;">
                                <div class="card-body text-secondary" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    ملاحظات الرئيس :
                                </div>
                                <div class="card-body text-secondary" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    {{ $visitor->other_notes }}
                                </div>
                            </div>
{{--                        @endif--}}
                        @if($visitor->status == 'pending')
                            <div class="card mb-4 bg-light border-left-secondary" style="border: 0;">
                                <div class="card-body text-secondary" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    الضيف في انتظار رد معاليكم
                                </div>
                            </div>
                        @elseif($visitor->status == 'waiting')
                            <div class="card mb-4 bg-light border-left-warning" style="border: 0;">
                                <div class="card-body text-warning" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    الضيف في صالة الانتظار
                                </div>
                            </div>
                        @elseif($visitor->status == 'rejected')
                            <div class="card mb-4 bg-light border-left-danger" style="border: 0;">
                                <div class="card-body text-danger" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    تم رفض المقابلة.
                                </div>
                            </div>
                        @elseif($visitor->status == 'accepted')
                            <div class="card mb-4 bg-light border-left-success" style="border: 0;">
                                <div class="card-body text-success" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    تم دخول الضيف
                                </div>
                            </div>

                        @elseif($visitor->status == 'done')
                            <div class="card mb-4 bg-light border-left-info" style="border: 0;">
                                <div class="card-body text-info" style="border: 0;padding: 12px 20px;font-weight: bold;font-size: 1.2rem;text-align: center;">
                                    تم مغادرة الضيف
                                </div>
                            </div>
                        @endif
                        <h5 class="font-weight-bold text-success text-uppercase mb-1">
                        </h5>
                            <div class="d-flex">
                        <a href="#" onclick="changeStatus('{{$visitor->id}}', 'accepted')" class="btn btn-primary btn-icon-split"
                           style="border-radius: 50%;padding: 2.5rem 1rem;height: 142px;width: 50%;display: flex;align-items: center;justify-content: center;">
                            <span class="text">ادخل الضيف</span>
                        </a>
                        <a href="#" onclick="changeStatus('{{$visitor->id}}', 'waiting')" class="btn btn-warning btn-icon-split"
                           style="border-radius: 50%;padding: 2.5rem 1rem;height: 142px;width: 50%;display: flex;align-items: center;justify-content: center;">
                            <span class="text">ارسال الضيف في صالة الانتظار</span>
                        </a>
                            </div>
                            <div class="my-2"></div>

                            <div class="d-flex">
                        <a href="#" onclick="changeStatus('{{$visitor->id}}', 'rejected')" class="btn btn-danger btn-icon-split"
                           style="border-radius: 50%;padding: 2.5rem 1rem;height: 142px;width: 50%;display: flex;align-items: center;justify-content: center;">
                            <span class="text">رفض استقبال الضيف</span>
                        </a>
                        <a href="#" onclick="changeStatus('{{$visitor->id}}', 'done')" class="btn btn-info btn-icon-split"
                           style="border-radius: 50%;padding: 2.5rem 1rem;height: 142px;width: 50%;display: flex;align-items: center;justify-content: center;">
                            <span class="text">مغادرة الضيف</span>
                        </a>
                            </div>
                    </div>
                </div>

            </div>
        @endforeach

        <div class="col-xl-10 col-lg-10 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" >

                        <div id="employee-id" class="col-lg-12" style="display: flex;justify-content: center;align-items: center;">
                            <div class="p-5 w-100" >
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">برجاء كتابة بيانات الضيف !</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="nationalId" aria-describedby="nationalId"
                                               placeholder="برجاء كتابة اسم الضيف ...">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="visitorPosition" aria-describedby="visitorPosition"
                                               placeholder="برجاء كتابة المنصب ...">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control form-control-user"
                                               id="notes" aria-describedby="notes"
                                                  rows="3"
                                                  placeholder="برجاء كتابة الملاحظات ..."></textarea>
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
        $('#loading').hide();
        $("#employee-id .btn-user").click(function(){
            $('#loading').show();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var nationalId = $('#nationalId').val();
            var visitorPosition = $('#visitorPosition').val();
            var notes = $('#notes').val();
            var request = $.ajax({
                url: "{{ route('login.send_visitor') }}",
                method: "POST",
                data: {name : nationalId, position: visitorPosition, notes: notes, _token: CSRF_TOKEN},
            });

            request.done(function( data ) {
                if(data.status == 'success') {
                    window.location.reload(true);
                }
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });


    })


    function changeStatus(id, status) {
        $('#loading').show();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var request = $.ajax({
            url: "{{ route('login.update_status') }}",
            method: "POST",
            data: {id,  status, _token: CSRF_TOKEN},
        });

        request.done(function( data ) {
            if(data.status == 'success') {
                window.location.reload(true);
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }
</script>
<script>
    var time = new Date().getTime();
    $(document.body).bind("mousemove keypress", function(e) {
        time = new Date().getTime();
    });

    function refresh() {
        if(new Date().getTime() - time >= 10000)
            window.location.reload(true);
        else
            setTimeout(refresh, 10000);
    }

    setTimeout(refresh, 10000);
</script>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
</body>

</html>
