@extends("layouts.app")

@section("header")
    Add Company
@endsection

@section("content")
   <div class="row">
    <table class="table table-bordered">
        <tr>
            <th>Company Name</th>
            <td>{{ $company->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $company->email }}</td>
        </tr>
        <tr>
            <th>Logo</th>
            <td>{{ $company->logo }}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $company->website }}</td>
        </tr>
    </table>
   </div>
@endsection
