@extends('layouts.app')

@section('content')

<div class="page-header">
  
  <h1>Usuario <small>Crear</small></h1>

</div>

<form action="{{ route('users.store') }}" method="POST" class="form-horizontal" role="form">

  {{ csrf_field() }}

  @include('users.partials.fields')      
  
</form>

@endsection