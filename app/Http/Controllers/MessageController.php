<?php

namespace App\Http\Controllers;

use App\Message;
use App\Repositories\CacheMessages;
use App\Repositories\Messages;
use App\Events\MessageWasReceived;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
  protected $messages;



  public function __construct(Messages $messages)
  {

    $this->middleware('auth')->except(['store', 'create']);
    
    $this->middleware('roles:admin')->except(['store', 'create']);

    $this->messages = $messages;
  }


  public function index()
  {   

    $messages = $this->messages->getPaginated();

    return view('messages.index', compact('messages'));

  }


  public function create()
  {

    $message = new Message;

    return view('messages.create', compact('message'));

  }


  public function store(CreateMessageRequest $request)
  {

    $status = '';

    $type = '';

    $message = $this->messages->store($request);

    if ($message) {

      // Evento se encarga de notificar mails
      event(new MessageWasReceived($message));
      
      $status = 'Mensaje enviado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';
    }

    return redirect()->route('messages.index')->with( [ 'status' => $status, 'type' => $type ] );

  }


  public function edit(Message $message)
  {

    $message = $this->messages->findById($message);


    return view('messages.edit', compact('message'));

  }


  public function update(UpdateMessageRequest $request, Message $message)
  {

    $status = '';

    $type = '';

    $message = $this->messages->update($request, $message);

    if ($message) {


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

    $message = $this->messages->destroy($message);

    if ($message) {

      $status = 'Mensaje eliminado correctamente';

      $type = 'success';

    } else {

      $status = 'Ocurrio un error';

      $type = 'danger';

    }

    return back()->with( [ 'status' => $status, 'type' => $type ] );

  }

}
