@extends('layouts.app')

@section('content')

<div class="page-header">
  <h1>Mensaje<small> Enviar</small></h1>
</div>

<form action="{{ route('messages.store') }}" method="POST" class="form-horizontal" role="form">

  {{ csrf_field() }}

  @include('messages.partials.fields')

</form>

@endsection