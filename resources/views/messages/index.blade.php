@extends('layouts.app')

@section('content')

<div class="page-header">

  <h1>Mensajes <small>Recibidos</small></h1>

</div>

<table class="table table-hover">

  <thead>

    <tr>

      <th>Nombre</th>

      <th>Correo</th>

      <th>Mensaje</th>

      <th>Acciones</th>

    </tr>

  </thead>

  <tbody>

    @forelse ($messages as $message)

    <tr>

      <td>{{ $message->name }}</td>
      
      <td>{{ $message->email }}</td>

      <td>{{ $message->text }}</td>

      <td>

        <a href="#" type="button" class="btn btn-primary btn-xs">
          Editar
        </a>

        <a href="#" type="button" class="btn btn-danger btn-xs">
          Eliminar
        </a>

      </td>

    </tr>

    @empty

      <td>No hay ningun mensaje</td>

    @endforelse

  </tbody>

</table>    

@endsection