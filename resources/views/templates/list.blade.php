@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('templates')}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('templates.create') }}" class="btn btn-primary">{{__('add')}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('template.title')}}</th>
                        <th>{{__('template.key')}}</th>
                        <th>{{__('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <th>{{ $template->id }}</th>
                            <th>{{ $template->title }}</th>
                            <th>{{ $template->key }}</th>
                            <th>
                                <a href="{{ route('templates.show', $template->id) }}" class="btn btn-info">{{__('goals')}}</a>
                                <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary">{{__('edit')}}</a>
                                {!! Form::open(['method' => 'delete','route' => ['templates.destroy', $template->id]]) !!}
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
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
