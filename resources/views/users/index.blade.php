@extends('layouts.app')


@section('content')

<div class="page-header">

  <h1>Usuarios <small>Lista</small></h1>
  
  <a href="{{ route('users.create') }}" class="btn btn-primary  ">Crear</a>

</div>

<table class="table table-hover">

  <thead>

    <tr>

      <th>Nombre</th>

      <th>Correo Electronico</th>

      <th>Roles</th>

    </tr>

  </thead>

  <tbody>

    @foreach ($users as $user)

    <tr>

      <td>{{ $user->name }}</td>

      <td>{{ $user->email }}</td>

      <td>

        @foreach ($user->roles as $role)

        <ul>

          <li>{{ $role->display_name }}</li>

        </ul>

        @endforeach

      </td>

      <td>

        <a class="btn btn-primary btn-xs" href="{{ route('users.edit', [ 'user' => $user->id ] ) }}" role="button">

          Editar

        </a>

        <form action="{{ route('users.destroy', [ 'user' => $user->id ] ) }}" style="display: inline;" method="POST">

          {{ csrf_field() }}

          {{ method_field('DELETE') }}

          <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>    

        </form>
        
      </td>
      
    </tr>

    @endforeach

  </tbody>

</table>

@endsection