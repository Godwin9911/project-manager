@if ($errors->any())
    <div class="mt-1">
        @foreach ($errors->all() as $error)
            <div  class="alert alert-dismissible alert-danger">{{ $error }}</div>
        @endforeach
    </div>
@endif
