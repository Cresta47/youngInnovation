@extends("layouts.app")

@section("header")
    Edit Company
@endsection

@section("content")
    <div class="row">
        @include("common.error")
    </div>
    <div class="row">
        {{ Form::model($company, ["route" => ["companies.update", $company->id], "method" => "PUT", "role" => "form", "files" => true]) }}
           @include("company.partials._form")

            <div class="mb-3">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
