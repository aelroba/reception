@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $employee->employee->name }}</h1>

    <div class="card invoice mb-5">
        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.name')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->name}}</div>
                        </div>

                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.employee_id')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->employee_id}}</div>
                        </div>

                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.job_title')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->job_title}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.specialization')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->specialization}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.qualification')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->qualification}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.job_grade')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->job_grade}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_one')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->level_one}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_two')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->level_two}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_three')}}</div>
                            <div class="h6 text-secondary mb-1">{{$employee->employee->level_three}}</div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Invoice - additional notes-->
                    <div class="small text-muted text-uppercase fw-700 mb-2">{{__('notes')}}</div>
                    <div class="small mb-0">لا توجد ملاحظات</div>
                </div>
            </div>
        </div>


    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{__('ratings')}}</h6>
            @if(auth()->user()->hasRole('director'))
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#addNewRating">
                {{__('add_new_rating')}}
            </button>
            @endif
        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('employees.name')}}</th>
                        <th>{{__('adopt')}}</th>
                        <th>{{__('ratings.review')}}</th>
                        <th>{{__('date')}}</th>
                        <th>{{__('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ratings as $rating_item)
                        <tr>
                            <th>{{ $rating_item->id }}</th>
                            <th>{{ $rating_item->employee->name }}</th>
                            <th>{!! $rating_item->adopt ? '<label class="btn btn-success">'.__('yes').'</label>' : '<label class="btn btn-danger">'.__('no').'</label>' !!}</th>
                            <th>
                                @if(!$rating_item->adopt)
                                    <label class="btn btn-light">{{__('ratings.review_is_waiting')}}</label>
                                @elseif(!$rating_item->review)
                                    <label class="btn btn-warning">{{__('ratings.under_review')}}</label>
                                @else
                                    <label class="btn btn-success">{{__('ratings.reviewed')}}</label>

                                @endif
                            </th>
                            <th dir="ltr">{{ $rating_item->created_at->format('Y-m-d H:s:m') }}</th>
                            <th>

                                <a href="{{ route('employees.show.rating', $rating_item->id) }}" class="btn btn-info">{{__('show')}}</a>
                                @if ($rating_item->created_by_id == auth()->user()->id && !$rating_item->adopt && auth()->user()->hasRole('director'))
                                {!! Form::open(['method' => 'delete','route' => ['employees.destroy.rating', $rating_item->id]]) !!}
                                {{ Form::submit(__('delete'), ['class' =>'btn btn-danger']) }}
                                {!! Form::close() !!}
                                @endif
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    @if(auth()->user()->hasRole('director'))
        <!-- Modal -->
    <div class="modal fade" id="addNewRating" tabindex="-1"
         aria-labelledby="addNewRatingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('add_new_rating')}}</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="templates" class="form-label">{{__('templates')}}</label>
                        {!!  Form::select('selected_template', $templates, null, array_merge(['class' => 'form-control', 'id' => 'templates']))  !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{__('fields.close')}}
                    </button>
                    <button type="button"
                            onclick="createNewForm('{{$employee->id}}')"
                            class="btn btn-primary">
                        {{__('fields.save')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
        @endif

@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
<script>
    function createNewForm(employeeId) {
        var template = $("select[name=selected_template]").val();
        location.href = '{{url('/'.app()->getLocale())}}/employees/' + employeeId + '/' + template;
    }

</script>
@endsection
