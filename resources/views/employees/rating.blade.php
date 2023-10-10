@extends('layouts.app')

@section('content')
    <div class="card invoice">
        {!! Form::model(null, ['route' => ['employees.save_rating', $template->id]]) !!}
        {!! Form::hidden('user_id', $employee->employee->id) !!}
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
                    <div class="h3 text-white">{{$template->title}}</div>
                    #{{$template->key}}
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

        <div class="card-body p-4 p-md-5">

            <!-- Invoice table-->
            <div class="">
                @foreach($template->goals as $goal)
                    @if($goal->static_or_dynamic == 'static')
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                        <tr class="small text-uppercase text-primary">
                            <th scope="col fw-bold">{{$goal->title}}</th>
                            <th class="text-end" scope="col">{{__('degree.1')}}</th>
                            <th class="text-end" scope="col">{{__('degree.2')}}</th>
                            <th class="text-end" scope="col">{{__('degree.3')}}</th>
                            <th class="text-end" scope="col">{{__('degree.4')}}</th>
                            <th class="text-end" scope="col">{{__('degree.5')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($goal->items as $item)
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold text-secondary">{{$item->title}}</div>
                                </td>
                                <td class="text-end fw-bold">
                                    <div class="form-check">
                                        <input class="form-check-input" id="goal_item_{{$item->id}}" type="radio" name="goal_item[{{$item->id}}]" value="1" />
                                    </div>
                                </td>
                                <td class="text-end fw-bold">
                                    <div class="form-check">
                                        <input class="form-check-input" id="goal_item_{{$item->id}}" type="radio" name="goal_item[{{$item->id}}]" value="2" />
                                    </div>
                                </td>
                                <td class="text-end fw-bold">
                                    <div class="form-check">
                                        <input class="form-check-input" id="goal_item_{{$item->id}}" type="radio" name="goal_item[{{$item->id}}]" value="3" />
                                    </div>
                                </td>
                                <td class="text-end fw-bold">
                                    <div class="form-check">
                                        <input class="form-check-input" id="goal_item_{{$item->id}}" type="radio" name="goal_item[{{$item->id}}]" value="4" />
                                    </div>
                                </td>
                                <td class="text-end fw-bold">
                                    <div class="form-check">
                                        <input class="form-check-input" id="goal_item_{{$item->id}}" type="radio" name="goal_item[{{$item->id}}]" value="5" />
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                        <table class="table table-borderless mb-0" id="goalId_{{$goal->id}}">
                            <thead class="border-bottom">
                            <tr class="small text-uppercase text-primary">
                                <th scope="col fw-bold">{{$goal->title}}
                                    <button type="button" class="btn btn-primary" id="#addRow" onclick="addNewRowToGoalId('{{$goal->id}}')">+</button>
                                </th>
                                <th class="text-end" scope="col">{{__('degree.1')}}</th>
                                <th class="text-end" scope="col">{{__('degree.2')}}</th>
                                <th class="text-end" scope="col">{{__('degree.3')}}</th>
                                <th class="text-end" scope="col">{{__('degree.4')}}</th>
                                <th class="text-end" scope="col">{{__('degree.5')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    @endif
                @endforeach
            </div>


        </div>


        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary">{{__('save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>


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
