@extends('layouts.app')

@section('content')

<div class="page-header">
  <h1>Usuarios <small>Editar {{ $user->name }}</small></h1>
</div>

<form action="{{ route('users.update', [ 'user' => $user->id ] ) }}" method="POST" class="form-horizontal" role="form">

  {{ csrf_field() }}
  
  {{ method_field('PATCH') }}

  @include('users.partials.fields')
  
</form>

@endsection