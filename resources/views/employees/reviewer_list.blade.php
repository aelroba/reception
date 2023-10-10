@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{__('employees')}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('employees.name')}}</th>
                        <th>{{__('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->employee->name }}</th>
                            <th>
                                <a href="{{ route('employees.show', $item->id) }}" class="btn btn-info">{{__('ratings')}}</a>
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

    <script>
        function saveEmployee() {
            var userId = $("select[name=user_id]").val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var request = $.ajax({
                url: "{{ route('employees.store') }}",
                method: "POST",
                data: { _token: CSRF_TOKEN, user_id: userId},
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

