@extends('layouts.app')

@section('content')

<form action="{{ route('messages.store') }}" method="POST" class="form-horizontal" role="form">

  <div class="form-group">

    <legend>Enviar Mensaje</legend>

  </div>

  {{ csrf_field() }}

  @include('messages.partials.fields')

</form>

@endsection