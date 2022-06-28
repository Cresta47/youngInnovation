@extends("layouts.app")

@section("header")
    Employees
@endsection

@section("content")

    <div class="row">
        @include('common.success')
    </div>

    <div class="row">
        <a href="{{ route('employees.create') }}">
            <button  class="btn btn-primary">Add Employee</button>
        </a>
    </div>
    <div class="row mt-5">
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ isset($employee->company) ? $employee->company->name : "N/A" }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route("employees.edit", $employee->id) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>

                        <a href="{{ route("employees.show", $employee->id) }}">
                            <button class="btn btn-primary">Detail</button>
                        </a>

                        {{ Form::open(["route" => ["employees.destroy", $employee->id], "method" => "delete",
                             "class" => "form-horizontal", "style" => "display: inline" ]) }}
                            <button class="delete-employee btn btn-danger">Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>

            @endforeach

        </table>
        {!! $employees->render() !!}

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-employee').click(function(e){
                e.preventDefault();
                if (confirm('Are you sure?')) {
                    $(e.target).closest('form').submit();
                }
            });
        });
    </script>
@endsection
