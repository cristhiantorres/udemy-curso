<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


  public function __construct()
  {

    $this->middleware('auth');

    $this->middleware('roles:admin');

  }

  
  public function index()
  {

    $users = User::all();

    return view('users.index', compact('users'));

  }


  public function create()
  {

    $user = new User;

    return view('users.create', compact('user'));

  }

  
  public function store(Request $request)
  {
        //
  }

  
  public function edit($id)
  {

    $user = User::findOrFail($id);

    return view('users.edit', compact('user') );

  }

  
  public function update(Request $request, $id)
  {
        //
  }

  
  public function destroy($id)
  {
        //
  }
  
}
