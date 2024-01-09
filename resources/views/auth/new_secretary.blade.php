<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">


    <title>Human Rights Commissions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{margin-top:20px;
            background-color:#eee;
        }
        .card {
            margin-bottom: 24px;
            box-shadow: 0 2px 3px #e4e8f0;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }
        .avatar-md {
            height: 4rem;
            width: 4rem;
        }
        .rounded-circle {
            border-radius: 50%!important;
        }
        .img-thumbnail {
            padding: 0.25rem;
            background-color: #f1f3f7;
            border: 1px solid #eff0f2;
            border-radius: 0.75rem;
        }
        .avatar-title {
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: flex;
            font-weight: 500;
            height: 100%;
            justify-content: center;
            width: 100%;
        }
        .bg-soft-primary {
            background-color: rgba(59,118,225,.25)!important;
        }
        a {
            text-decoration: none!important;
        }
        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245,110,110,.1);
        }
        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99,173,111,.1);
        }
        .mb-0 {
            margin-bottom: 0!important;
        }
        .badge {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.75rem;
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
            z-index: 999999999999;
        }

        #loading-image {
            position: absolute;
            top: 100px;
            left: 240px;
            z-index: 999999999999;
        }
    </style>
</head>
<body>
<div id="loading" style="display: none;">
    <img id="loading-image" src="{{asset('loading.gif')}}" alt="Loading..." />
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">صفحة السكرتارية </h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <button href="#" onclick="window.location.reload(true);" class="btn btn-primary"><i class="bx bx-refresh me-1"></i> تحديث الصفحة</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    اضافة ضيف جديد
                </button>
                <div>
                    <ul class="nav nav-pills p-0">
                        <li class="nav-item">
                            <a aria-current="page" href="{{url('/')}}" class="router-link-active router-link-exact-active nav-link active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M6.499 6.498L3.5 9.5l3 3"/><path d="M8.5 15.5h5c2 0 3-1 3-3s-1-3-3-3h-10"/></g></svg>

                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

        @if(count($visitors) <= 0)
            <div class=" mb-5 mt-5 shadow"><div class="list-group-item"><div class="row align-items-center"><div class="col" style="
    text-align: center; padding: 4rem 0rem;
"> <strong class="mb-2" style="
    font-size: 2rem;
    text-align: center;
">عفوا لا يوجد زوار حاليا!</strong></div></div></div></div>
        @endif
        @foreach($visitors as $visitor)
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center">
                            <div><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="avatar-md rounded-circle img-thumbnail" /></div>
                            <div class="flex-1 ms-3">
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{$visitor->name}}</a></h5>
                                <span class="badge badge-soft-success mb-0" style="font-size: 15px;">المنصب : {{$visitor->position}}</span>
                                <span class="badge badge-soft-success mb-0">{{$visitor->created_at->format("Y-m-d H:m a")}}</span>

                            </div>
                        </div>

                        <div class="mt-3 pt-1">

                                @if($visitor->status == 'pending')
                                    <div class="border-end mb-4 bg-light border-warning border-5 p-3">
                                        <span class="mb-0">الضيف في انتظار رد معاليكم</span>
                                    </div>
                                @elseif($visitor->status == 'waiting')
                                <div class="border-end mb-4 bg-light border-warning border-5 p-3">
                                    <span class="mb-0">الضيف في صالة الانتظار</span>
                                </div>
                                @elseif($visitor->status == 'rejected')
                                <div class="border-end mb-4 bg-light border-danger border-5 p-3">
                                    <span class="mb-0">تم رفض المقابلة.</span>
                                </div>
                                @elseif($visitor->status == 'accepted')
                                <div class="border-end mb-4 bg-light border-success border-5 p-3">
                                    <span class="mb-0">تم دخول الضيف.</span>
                                </div>
                                @elseif($visitor->status == 'done')
                                <div class="border-end mb-4 bg-light border-info border-5 p-3">
                                    <span class="mb-0">تم مغادرة الضيف.</span>
                                </div>
                                @endif

                            <p class="text-muted my-2">
                                <i class="align-middle ps-2 text-primary border-bottom border-primary"
                                style="font-style: normal;font-weight: 800;font-size: larger;"
                                >رقم الطلب :</i>
                                {{ $visitor->id }}
                            </p>
                            <p class="text-muted my-2">
                                <i class="align-middle ps-2 text-primary border-bottom border-primary"
                                   style="font-style: normal;font-weight: 800;font-size: larger;"
                                >ملاحظات :</i>
                                {{ $visitor->notes }}
                            </p>
                            <p class="text-muted my-2">
                                <i class="align-middle ps-2 text-primary border-bottom border-primary"
                                   style="font-style: normal;font-weight: 800;font-size: larger;"
                                >ملاحظات الرئيس :</i>
                                {{ $visitor->other_notes }}
                            </p>

                            <p class="text-muted my-2">
                                <i class="align-middle ps-2 text-primary border-bottom border-primary"
                                   style="font-style: normal;font-weight: 800;font-size: larger;"
                                >مدة الانتظار :</i>
                                {{ $visitor->created_at->diffForHumans(\Carbon\Carbon::now()) }}
                            </p>

                        </div>
                        <div class="d-flex gap-2 "><hr style="width: 100%;"></div>
                        <div class="d-flex gap-2 ">
                            <form class="user d-flex gap-2 " onsubmit="otherStatus('{{$visitor->id}}');">
                                <div class="form-group">
                                        <textarea type="text" class="form-control form-control-user"
                                                  id="otherNotes_{{$visitor->id}}" aria-describedby="notes"
                                                  rows="1"
                                                  placeholder="بامكانكم كتابة الملاحظات ..."></textarea>
                                </div>
                                <button type="button" class="btn btn-primary btn-user btn-block" onclick="otherStatus('{{$visitor->id}}');">
                                    ارسال
                                </button>
                            </form>
                        </div>
                        <div class="d-flex gap-2 "><hr style="width: 100%;"></div>
                        <div class="d-flex gap-2 pt-0">
                            <button type="button" onclick="changeStatus('{{$visitor->id}}', 'accepted')" class="btn btn-primary btn-sm fw-bold w-50"><i class="bx bx-user me-1"></i> ادخل الضيف</button>
                            <button type="button" onclick="changeStatus('{{$visitor->id}}', 'waiting')" class="btn btn-warning btn-sm fw-bold  w-50"><i class="bx bx-message-square-dots me-1"></i> ارسال الضيف في صالة الانتظار</button>
                        </div>
                        <div class="d-flex gap-2 pt-2">
                            <button type="button"  onclick="changeStatus('{{$visitor->id}}', 'rejected')" class="btn btn-danger btn-sm fw-bold w-50"><i class="bx bx-user me-1"></i> رفض استقبال الضيف</button>
                            <button type="button" onclick="changeStatus('{{$visitor->id}}', 'done')" class="btn btn-dark btn-sm  fw-bold w-50"><i class="bx bx-message-square-dots me-1"></i> مغادرة الضيف</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة ضيف جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="employee-id" class="col-lg-12" style="display: flex;justify-content: center;align-items: center;">
                    <div class="p-5 w-100" >
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">برجاء كتابة بيانات الضيف !</h1>
                        </div>
                        <form class="user">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">اسم الضيف</label>
                                <input type="text" class="form-control form-control-user"
                                       id="nationalId" aria-describedby="nationalId"
                                       placeholder="برجاء كتابة اسم الضيف ...">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">المنصب</label>
                                <input type="text" class="form-control form-control-user"
                                       id="visitorPosition" aria-describedby="visitorPosition"
                                       placeholder="برجاء كتابة المنصب ...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">الملاحظات</label>
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
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('#loading').hide();
        $("#employee-id .btn-user").click(function(){
            $('#loading').show();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var nationalId = $('#nationalId').val();
            var visitorPosition = $('#visitorPosition').val();
            var request = $.ajax({
                url: "{{ route('login.send_visitor') }}",
                method: "POST",
                data: {name : nationalId, position: visitorPosition, _token: CSRF_TOKEN},
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

    function otherStatus(id) {
        $('#loading').show();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var other_notes = $('#otherNotes_'+id).val();
        var request = $.ajax({
            url: "{{ route('login.other_status') }}",
            method: "POST",
            data: {id,  other_notes, _token: CSRF_TOKEN},
        });

        request.done(function( data ) {
            if(data.status == 'success') {
                window.location.reload(true);
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
        return false;
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
    // $(window).load(function() {
    //     $('#loading').hide();
    // });
</script>
</body>
</html>
