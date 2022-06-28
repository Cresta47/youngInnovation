@extends("layouts.app")

@section("header")
    Employee Detail
@endsection

@section("content")
   <div class="row">
    <table class="table table-bordered">
        <tr>
            <th>First Name</th>
            <td>{{ $employee->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $employee->last_name }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ isset($employee->company) ? $employee->company->name : "N/A" }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $employee->phone }}</td>
        </tr>
    </table>
   </div>
@endsection
