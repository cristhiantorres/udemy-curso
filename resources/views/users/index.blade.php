@extends('layouts.app')


@section('content')

<div class="page-header">

  <h1>Usuarios <small>Lista</small></h1>
  
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

        <ul>

          @foreach ($user->roles as $role)

          <li>{{ $role->display_name }}</li>

          @endforeach

        </ul>

      </td>

    </tr>

    @endforeach

  </tbody>

</table>

@endsection