@extends('layouts.app') 


@section('content')

<div class="page-header">

  <h1>

    {{ $user->name }}

  </h1>

</div>

<table class="table">

  <tr>

    <th>Nombre</th>

    <td>{{ $user->name }}</td>

  </tr>

  <tr>

    <th>Correo Electronico</th>

    <td>{{ $user->email }}</td>

  </tr>


</table>

@can('edit', $user)

<a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}" role="button">Editar</a>

@endcan



@endsection