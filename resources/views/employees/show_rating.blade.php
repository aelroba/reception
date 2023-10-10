@extends('layouts.app')

@section('content')
    <div class="card invoice">
        <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                    <!-- Invoice branding-->
                    <img class="invoice-brand-img rounded-circle mb-1" src="{{asset('backend/img/logo-circle.svg')}}" width="80" alt="">
                    <div class="h2 text-white mb-0">{{__('hrc')}}</div>
                    {{__('hr_department')}}
                </div>
                <div class="col-12 col-lg-auto text-center text-lg-end">
                    <!-- Invoice details-->
                    <div class="h3 text-white">{{$rating->template->title}}</div>
                    #{{$rating->template->key}}
                    <br>
                    January 1, 2021
                </div>
            </div>
        </div>
        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.name')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->name}}</div>
                        </div>

                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.employee_id')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->employee_id}}</div>
                        </div>

                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.job_title')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->job_title}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.specialization')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->specialization}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.qualification')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->qualification}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.job_grade')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->job_grade}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_one')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->level_one}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_two')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->level_two}}</div>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Invoice - sent to info-->
                            <div class="font-weight-bold text-primary text-uppercase mb-1">{{__('fields.level_three')}}</div>
                            <div class="h6 text-secondary mb-1">{{$rating->employee->level_three}}</div>
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

        <div class="card-body p-4 p-md-5">

            <!-- Invoice table-->
            <div class="">
                <h4 class="font-weight-bold text-primary">{{__('goals')}}</h4>
                @php
                $employeeTotalPoints = 0;
                @endphp
                @foreach($rating->template->goals as $goal)
                        <table class="table table-borderless mb-2 border ">
                            <thead class="border-bottom">
                            <tr class="small text-uppercase text-primary">
                                <th scope="col fw-bold text-center">{{$goal->title}}</th>
                                <th class="text-center" scope="col">{{__('degree.1')}}</th>
                                <th class="text-center" scope="col">{{__('degree.2')}}</th>
                                <th class="text-center" scope="col">{{__('degree.3')}}</th>
                                <th class="text-center" scope="col">{{__('degree.4')}}</th>
                                <th class="text-center" scope="col">{{__('degree.5')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $records = $rating->records->where('goal_id', $goal->id);
                            $itemsCount = collect($records)->count();
                            $totalPoints = 0;
                            @endphp
                            @foreach($records as $item)
                                @php
                                    $totalPoints = $totalPoints + (int) $item->result;
                                @endphp
                                <tr class="border-bottom">
                                    <td>
                                        <div class="fw-bold text-secondary">{{$item->goal_item->title}}</div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" {{ $item->result == 1 ? 'checked' : '' }}  disabled="disabled"/>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2" {{ $item->result == 2 ? 'checked' : '' }} disabled="disabled"/>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="3" {{ $item->result == 3 ? 'checked' : '' }} disabled="disabled"/>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="4" {{ $item->result == 4 ? 'checked' : '' }} disabled="disabled"/>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="5" {{ $item->result == 5 ? 'checked' : '' }} disabled="disabled"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-light text-uppercase text-primary text-center">
                                <td scope="col fw-bold"> مجموع التقييم الكلي</td>
                                <td class="text-center" colspan="5">
                                    @php
                                    $goalPoints = $totalPoints / $itemsCount;
                                    $employeeTotalPoints = $employeeTotalPoints + ((int) $goalPoints * (int) $goal->percentage) / 100;
                                    @endphp
                                    {{ $goalPoints }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                @endforeach
            </div>


            <div class="mt-5">
                    <table class="table table-borderless mb-0 bg-light">
                        <thead class="border">
                        <tr class="text-uppercase text-primary" style="font-size: 1.5rem;">
                            <th scope="col fw-bold text-center" colspan="3" style="text-align: center">
                                التقييم الكلي للموظف
                                <br>
                                <small style="font-size: 14px;">                                ( عبارة عن مجموع  ناتج الدرجة الكلية لكل فئة تقييم مضروبة بالوزن النسبي لها)</small>
                            </th>
                            <th class="text-center  bg-primary text-white w-50" style="vertical-align: middle;">{{  $employeeTotalPoints }}</th>
                        </tr>
                        </thead>
                    </table>
            </div>


        </div>


        @if($rating->created_by_id == auth()->user()->id && !$rating->adopt && auth()->user()->hasRole('director'))
        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 ">
                            <a href="{{ route('employees.show.adopt', $rating->id) }}" class="btn btn-primary">{{__('adopt')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($rating->adopt && auth()->user()->hasRole('reviewer') && !$rating->review)
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('employees.show.review', $rating->id) }}" class="btn btn-primary">{{__('ratings.review')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($rating->adopt && auth()->user()->hasRole('reviewer'))
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('employees.show.reject_review', $rating->id) }}" class="btn btn-danger">{{__('ratings.reject_review')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>


@endsection
@section('css')
    <style>
        input[type="radio"]:checked {
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            padding: 2px;
            background-clip: content-box;
            border: 2px solid #335bcb;
            background-color: #3158c9;
            border-radius: 50%;
        }
    </style>
    @endsection
@section('js')
    <script>
        var dynamicGoals = [];
        function addNewRowToGoalId(goalId) {
            if (dynamicGoals.length == 0) {
                dynamicGoals[goalId] = 1;
            } else {
                dynamicGoals[goalId] = dynamicGoals[goalId] + 1;
            }

            var newItem = '' +
                '<tr class="border-bottom">' +
                '    <td>' +
                '        <div class="mb-3 d-flex align-items-center">' +
                '            <label class="form-label mr-4 mb-0">{{__("goals.items.title")}}</label>' +
                '            <input class="form-control" name="goal_title_'+goalId+'['+dynamicGoals[goalId]+']" type="text" value="">' +
                '        </div>' +
                '    </td>' +
                '    <td class="text-end fw-bold">' +
                '        <div class="form-check">' +
                '            <input class="form-check-input" type="radio" name="goal_item_'+goalId+'['+dynamicGoals[goalId]+']" value="1" />' +
                '        </div>' +
                '    </td>' +
                '    <td class="text-end fw-bold">' +
                '        <div class="form-check">' +
                '            <input class="form-check-input" type="radio" name="goal_item_'+goalId+'['+dynamicGoals[goalId]+']" value="2" />' +
                '        </div>' +
                '    </td>' +
                '    <td class="text-end fw-bold">' +
                '        <div class="form-check">' +
                '            <input class="form-check-input" type="radio" name="goal_item_'+goalId+'['+dynamicGoals[goalId]+']" value="3" />' +
                '        </div>' +
                '    </td>' +
                '    <td class="text-end fw-bold">' +
                '        <div class="form-check">' +
                '            <input class="form-check-input" type="radio" name="goal_item_'+goalId+'['+dynamicGoals[goalId]+']" value="4" />' +
                '        </div>' +
                '    </td>' +
                '    <td class="text-end fw-bold">' +
                '        <div class="form-check">' +
                '            <input class="form-check-input" type="radio" name="goal_item_'+goalId+'['+dynamicGoals[goalId]+']" value="5" />' +
                '        </div>' +
                '    </td>' +
                '</tr>' +
                '';

            $('#goalId_'+goalId+' tbody').append(newItem);
        }
    </script>
@endsection
