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

      <th>Email</th>

      <th>Roles</th>

      <th>Acciones</th>

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

        <a class="btn btn-danger btn-xs" href="{{ route('users.edit', [ 'user' => $user->id ] ) }}" role="button">
          
          Eliminar

        </a>
        
      </td>
      
    </tr>
    @endforeach

  </tbody>

</table>

@endsection