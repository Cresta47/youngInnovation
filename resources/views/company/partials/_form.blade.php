<div class="mb-3">
    {!! Form::label("name", "Company Name", ["class" => "form-label"]) !!}
    {!! Form::text("name", null, ["class" => "form-control", "id" => "email", "placeholder" => "Enter Company Name", "required" => "required"]) !!}
</div>

<div class="mb-3">
    {!! Form::label("email", "Email Address", ["class" => "form-label"]) !!}
    {!! Form::email("email", null, ["class" => "form-control", "id" => "email-address", "placeholder" => "Enter Email Address"]) !!}
</div>

<div class="mb-3">
    {!! Form::label("logo", "Logo", ["class" => "form-label"]) !!}
    {{ Form::file('logo', null, ['required' => 'required', 'class' => 'form-control', "accept" => ".png,.jpg,.jpeg"] ) }}
</div>

<div class="mb-3">
    {!! Form::label("website", "Website", ["class" => "form-label"]) !!}
    {!! Form::url("website", null, ["class" => "form-control", "id" => "website", "placeholder" => "Enter website"]) !!}
</div>
