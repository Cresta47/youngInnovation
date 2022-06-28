@extends("layouts.app")

@section("header")
    Edit Employee
@endsection

@section("content")
    <div class="row">
        @include("common.error")
    </div>
    <div class="row">
        {{ Form::model($employee, ["route" => ["employees.update", $employee->id], "method" => "PUT", "role" => "form", "files" => true]) }}
           @include("employee.partials._form")

            <div class="mb-3">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
