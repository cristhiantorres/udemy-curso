<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
  

  public function __construct()
  {

    $this->middleware('auth');
    $this->middleware('roles:admin');

  }


  public function index()
  {

    $messages = Message::all();

    return view('messages.index', compact('messages'));

  }


  public function create()
  {

    $message = new Message;

    return view('messages.create', compact('message'));

  }


  public function store(CreateMessageRequest $request)
  {

    $message = new Message;

    $status = '';

    $type = '';

    if ( $message->create( $request->all() ) ) {

      $status = 'Mensaje enviado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );

  }


  public function edit(Message $message)
  {

    return view('messages.edit', compact('message'));

  }


  public function update(UpdateMessageRequest $request, Message $message)
  {

    $status = '';

    $type = '';

    if ( $message->update( $request->all() ) ) {

      $status = 'Mensaje actualizado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );
  }


  public function destroy(Message $message)
  {

    $status = '';

    $type = '';

    if ( $message->delete() ) {

      $status = 'Mensaje eliminado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );

  }

}
