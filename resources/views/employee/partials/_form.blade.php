<div class="mb-3">
    {!! Form::label("first_name", "First Name", ["class" => "form-label"]) !!}
    {!! Form::text("first_name", null, ["class" => "form-control", "id" => "first-name", "placeholder" => "Enter First Name", "required" => "required"]) !!}
</div>

<div class="mb-3">
    {!! Form::label("last_name", "Last Name", ["class" => "form-label"]) !!}
    {!! Form::text("last_name", null, ["class" => "form-control", "id" => "last-name", "placeholder" => "Enter Last Name", "required" => "required"]) !!}
</div>

<div class="mb-3">
    {!! Form::label("company_id", "Company Name", ["class" => "form-label"]) !!}
    {!! Form::select("company_id", $companies, null, ["class" => "form-control", "id" => "company-name", "required" => "required"]) !!}
</div>

<div class="mb-3">
    {!! Form::label("email", "Email", ["class" => "form-label"]) !!}
    {{ Form::email('email', null, ['class' => 'form-control'] ) }}
</div>

<div class="mb-3">
    {!! Form::label("phone", "Phone", ["class" => "form-label"]) !!}
    {!! Form::text("phone", null, ["class" => "form-control", "id" => "website", "placeholder" => "Enter Phone"]) !!}
</div>
