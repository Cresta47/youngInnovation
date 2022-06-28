@extends("layouts.app")

@section("header")
    Company
@endsection

@section("content")

    <div class="row">
        @include('common.success')
    </div>

    <div class="row">
        <a href="{{ route('companies.create') }}">
            <button  class="btn btn-primary">Add Company</button>
        </a>
    </div>
    <div class="row mt-5">
        <table class="table table-bordered">
            <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if(isset($company->logo))
                            <img src="{{ $company->logo }}"  class="img-thumbnail">
                        @endif
                    </td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a href="{{ route("companies.edit", $company->id) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>

                        <a href="{{ route("companies.show", $company->id) }}">
                            <button class="btn btn-primary">Detail</button>
                        </a>

                        {{ Form::open(["route" => ["companies.destroy", $company->id], "method" => "delete",
                             "class" => "form-horizontal", "style" => "display: inline" ]) }}
                            <button class="delete-company btn btn-danger">Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>

            @endforeach

        </table>
        {!! $companies->render() !!}

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {


            $('.delete-company').click(function(e){
                e.preventDefault();
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
        });

    </script>
@endsection
