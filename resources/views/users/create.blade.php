@extends('layouts.app')

@section('content')

<div class="page-header">
  
  <h1>Usuario <small>Crear</small></h1>

</div>

<form action="{{ route('users.store') }}" method="POST" class="form-horizontal" role="form">

  {{ csrf_field() }}

  @include('users.partials.fields')      
  
  <div class="form-group">

    <div class="col-sm-10 col-sm-offset-2">

      <button type="submit" class="btn btn-primary">Crear</button>

    </div>

  </div>
  
</form>

@endsection