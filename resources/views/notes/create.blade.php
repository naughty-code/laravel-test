@extends('layout')

@section('content')
<h2> Create a Note </h2>
  @include('partials/errors')

<form method="post" action="{{ url('notes')}}" class="form">
  {!! csrf_field() !!}
  <textarea name="text" class="form-control" placeholder="Write your note here">{{ old('text') }}</textarea>
  <button type="subit" class="btn btn-primary"> Create note </button>
</form>
@endsection
