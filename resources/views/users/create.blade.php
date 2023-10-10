@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('users.create')}}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('add_details')}}</h6>
        </div>
        <div class="card-body">
            {!!  Form::model(null, ['route' => ['users.store']])  !!}

            @include('users.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection