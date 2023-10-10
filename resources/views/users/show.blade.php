@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $template->title }}</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{__('goals')}}</h6>
            <a href="{{ route('goals.create') }}" class="btn btn-primary">{{__('add')}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('goals.title')}}</th>
                        <th>{{__('goals.percentage')}}</th>
                        <th>{{__('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($template->goals as $goal)
                        <tr>
                            <th>{{ $goal->id }}</th>
                            <th>{{ $goal->title }}
                                @if(count($goal->items) > 0)
                                    <p class="badge-primary p-2 mt-2">{{__('goals.items')}}</p>
                                <ul>
                                    @foreach($goal->items as $item)
                                    <li>{{$item->title}}
                                        <a href="#" onclick="deleteGoalItem('{{$item->id}}')">{{__('delete')}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                    @endif
                            </th>
                            <th>{{ $goal->percentage }}%</th>
                            <th>

                                @include('goals.items.create', ['goal_id' => $goal->id])
{{--                                <a href="{{ route('goals.show', $goal->id) }}" class="btn btn-info">{{__('show')}}</a>--}}
                                <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-primary">{{__('edit')}}</a>
                                {!! Form::open(['method' => 'delete','route' => ['goals.destroy', $goal->id]]) !!}
                                {{ Form::submit(__('delete'), ['class' =>'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $(".saveGoalItem #saveGoalItem").click(function(){
        alert("The paragraph was clicked.");
    });

    function saveGoalItem(modalId) {
        var goalId = $("#goalItem_"+modalId+" input[name=goal_id]").val();
        var goalItemName = $("#goalItem_"+modalId+" input[name=title]").val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var request = $.ajax({
            url: "{{ route('goal_items.store') }}",
            method: "POST",
            data: {goal_id: goalId, _token: CSRF_TOKEN, title: goalItemName},
        });

        request.done(function( data ) {
            if(data.status == 'success') {
                location.reload()
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });

    }


    function deleteGoalItem(goalItemId) {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var request = $.ajax({
            url: "{{url(app()->getLocale() . '/goal_items')}}/"+goalItemId,
            method: "DELETE",
            data: {_token: CSRF_TOKEN},
        });

        request.done(function( data ) {
            if(data.status == 'success') {
                location.reload()
            }
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });

    }
</script>
@endsection
