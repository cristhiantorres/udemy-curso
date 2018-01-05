@extends('layouts.app')



@section('content')

<div class="page-header">

  <h1>Usuario<small> Crear</small></h1>
  
  <hr>

</div>

<form action="{{ route('users.store') }}" method="POST" role="form" class="form form-horizontal">
  
  <legend>Crear Usuario</legend>
    
    {{ csrf_field() }}

    @include('users.partials.fields') 

</form>

@endsection