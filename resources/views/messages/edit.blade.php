@extends('layouts.app')

@section('content')

<form action="{{ route('messages.update', ['message' => $message->id]) }}" method="POST" class="form-horizontal" role="form">

  <div class="form-group">

    <legend>Editar Mensaje</legend>

  </div>

  {{ csrf_field() }}

  {{ method_field('PATCH') }}

  @include('messages.partials.fields')

</form>

@endsection