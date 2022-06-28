@extends("layouts.app")

@section("header")
    Add Company
@endsection

@section("content")
    <div class="row">
        @include('common.error')
    </div>
    <div class="row">
        {{ Form::open(["route" => "companies.store", "method" => "POST", "class" => "form-horizontal", "role" => "form", "files" => true]) }}

           @include("company.partials._form")

            <div class="mb-3">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
