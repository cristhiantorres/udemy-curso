<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificacionToTheOwner implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param MessageWasReceived $event
     *
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;

        Mail::send('emails.contact', ['msg' => $message], function ($m) use ($message) {
            $m->from($message->email, $message->name)

          ->to('cristhiantorres95@gmail.com', 'Cristhia')

          ->subject("Tu mensaje fue recibido $message->name");
        });
    }
}
