@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-success">{{ $error }}</div>
    @endforeach
@endif
