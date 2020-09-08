@if ($errors->any())
<div class="text-danger">
    @foreach ($errors->all() as $error)
        <small>{{ $error }}</small> <br>
    @endforeach
</div>
@endif
