@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('departments')}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('departments.create') }}" class="btn btn-primary">{{__('add')}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('departments.title')}}</th>
                        <th>{{__('departments.manager')}}</th>
                        <th>{{__('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th>{{ $department->id }}</th>
                            <th>{{ $department->name }}</th>
                            <th>{{ $department->manager->name }}</th>
                            <th>
                                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">{{__('edit')}}</a>
                                {!! Form::open(['method' => 'delete','route' => ['departments.destroy', $department->id]]) !!}
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
