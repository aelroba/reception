@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('profile')}}</h1>

    <div class="card shadow mb-4">

        <div class="card-body">
            {!!  Form::model(auth()->user(), ['route' => ['dashboard.post.profile']])  !!}
            <div class="mb-3">
                <label for="name" class="form-label">{{__('fields.name')}}</label>
                {{ Form::text('name', null, array_merge(['class' => 'form-control', 'id' => 'name'])) }}
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{__('fields.email')}}</label>
                {{ Form::email('email', null, array_merge(['disabled' => 'disabled', 'class' => 'form-control', 'id' => 'email'])) }}
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">{{__('fields.password')}}</label>
                {{ Form::password('pass', array_merge(['class' => 'form-control', 'id' => 'pass'])) }}
            </div>
            <div class="mb-3">
                <label for="direct_manager" class="form-label">{{__('fields.direct_manager')}}</label>
                {{ Form::select('direct_manager', $users, null, ['class' => 'form-control', 'id' => 'direct_manager']) }}
            </div>
            <div class="mb-3">
                <label for="employee_id" class="form-label">{{__('fields.employee_id')}}</label>
                {{ Form::text('employee_id', null, array_merge(['disabled' => 'disabled','class' => 'form-control', 'id' => 'employee_id'])) }}
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">{{__('fields.job_title')}}</label>
                {{ Form::text('job_title', null, array_merge(['class' => 'form-control', 'id' => 'job_title'])) }}
            </div>
            <div class="mb-3">
                <label for="specialization" class="form-label">{{__('fields.specialization')}}</label>
                {{ Form::text('specialization', null, array_merge(['class' => 'form-control', 'id' => 'specialization'])) }}
            </div>
            <div class="mb-3">
                <label for="qualification" class="form-label">{{__('fields.qualification')}}</label>
                {{ Form::text('qualification', null, array_merge(['class' => 'form-control', 'id' => 'qualification'])) }}
            </div>
            <div class="mb-3">
                <label for="job_grade" class="form-label">{{__('fields.job_grade')}}</label>
                {{ Form::text('job_grade', null, array_merge(['class' => 'form-control', 'id' => 'job_grade'])) }}
            </div>

            <div class="mb-3">
                <label for="level_one" class="form-label">{{__('fields.level_one')}}</label>
                {{ Form::text('level_one', null, array_merge(['class' => 'form-control', 'id' => 'level_one'])) }}
            </div>
            <div class="mb-3">
                <label for="level_two" class="form-label">{{__('fields.level_two')}}</label>
                {{ Form::text('level_two', null, array_merge(['class' => 'form-control', 'id' => 'level_two'])) }}
            </div>
            <div class="mb-3">
                <label for="level_three" class="form-label">{{__('fields.level_three')}}</label>
                {{ Form::text('level_three', null, array_merge(['class' => 'form-control', 'id' => 'level_three'])) }}
            </div>
            <div class="mb-3">
                {{ Form::submit(__('fields.save'), ['class' =>'btn btn-primary']) }}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
