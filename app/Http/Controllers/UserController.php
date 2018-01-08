<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{


  public function __construct()
  {

    $this->middleware('auth')->except(['show']);

    $this->middleware('roles:admin')->except(['edit', 'update', 'show']);

  }

  
  public function index()
  {

    $users = User::all();

    return view('users.index', compact('users'));

  }


  public function create()
  {

    $user = new User;

    $roles = Role::pluck('display_name', 'id');

    return view('users.create', compact('user', 'roles'));

  }

  
  public function store(UserCreateRequest $request)
  {

    $user = User::create($request->all());

    if ( $user ) {

      $user->roles()->attach($request->roles);

      $status = 'Usuario creado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );

  }

  public function show($id)
  {

    $user = User::findOrFail($id);

    return view('users.show', compact('user'));

  }

  
  public function edit($id)
  {

    $user = User::findOrFail($id);

    $this->authorize('edit' ,$user);

    $roles = Role::pluck('display_name', 'id');

    return view('users.edit', compact('user', 'roles') );

  }

  
  public function update(UserUpdateRequest $request, $id)
  {

    $user = User::findOrFail($id);

    $this->authorize('update', $user);

    if ( $user->update($request->only('name', 'email') ) ) {

      $user->roles()->sync($request->roles);

      $status = 'Usuario actualizado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with(['status' => $status, 'type' => $type]);

  }

  
  public function destroy($id)
  {

    $user = User::findOrFail($id);

    if ( $user->delete() ) {

      $status = 'Usuario eliminado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );

  }
  
}