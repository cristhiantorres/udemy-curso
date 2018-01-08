@extends('layouts.app')

@section('content')

<form action="{{ route('users.update', [ 'user' => $user->id ] ) }}" method="POST" class="form-horizontal" role="form">

  <div class="form-group">

    <legend>Actualizar - {{ $user->name }}</legend>

  </div>


  
  @include('users.partials.fields')


  <div class="form-group">

    <div class="col-sm-10 col-sm-offset-2">

      <button type="submit" class="btn btn-primary">Actualizar</button>

    </div>

  </div>
  
</form>

@endsection