<?php

namespace App\Observers;

use App\Message;

class MessageObserver
{

    /**
     * Listen to the Message created event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {

      // dd($message);

    }


    /**
     * Listen to the Message updated event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function updated(Message $message)
    {
    
      dd($message);
    
    }

    /**
     * Listen to the Message deleting event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function deleting(Message $message)
    {

      dd($message);

    }

  }