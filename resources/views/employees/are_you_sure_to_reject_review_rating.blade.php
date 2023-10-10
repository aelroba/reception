@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('ratings.are_you_sure_to_reject_review_rating')}}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            {!!  Form::model(null, ['route' => ['employees.post.reject_review', $rating->id]])  !!}

            <div class="mb-3" style="display: flex;justify-content: space-between;">
                {{ Form::submit(__('yes'), ['class' =>'btn btn-primary', "style" =>"width: 45%;font-size: 2rem;padding: 2rem 0;"]) }}
                <a class="btn btn-danger" style="width: 45%;font-size: 2rem;padding: 2rem 0;" href="{{url()->previous()}}">{{__('no')}}</a>

            </div>

            <div class="mb-3">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
