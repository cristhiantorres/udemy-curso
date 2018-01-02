@extends('layouts.app')

@section('content')

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

        <a href="#" type="button" class="btn btn-primary">
          Editar
        </a>

        <a href="#" type="button" class="btn btn-danger">
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