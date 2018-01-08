@extends('layouts.app')

@section('content')

<div class="page-header">

  <h1>Mensajes <small>Recibidos</small></h1>

  <a href="{{ route('messages.create') }}" class="btn btn-primary">Crear</a>

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

        <a href="{{ route('messages.edit', [ 'message' => $message->id ] ) }}" type="button" class="btn btn-primary btn-xs">
          Editar
        </a>

        <form action="{{ route('messages.destroy', [ 'messages' => $message->id ] ) }}" style="display: inline;" method="POST">
          
          {{ csrf_field() }}

          {{ method_field('DELETE') }}

          <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>    

        </form>
      
      </td>

    </tr>

    @empty

    <td>No hay ningun mensaje</td>

    @endforelse

  </tbody>

</table>    

@endsection