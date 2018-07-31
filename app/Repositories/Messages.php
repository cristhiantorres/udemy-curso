<?php

namespace App\Repositories;

use App\Message;

class Messages
{
    public function getPaginated()
    {
        return Message::latest()->paginate(10);
    }

    public function store($request)
    {
        $message = Message::create($request->all());

        if (auth()->check()) {
            auth()->user()->messages()->save($message);
        }

        return $message;
    }

    public function update($request, $message)
    {
        return $message->update($request->all());
    }

    public function findById($message)
    {
        return $message;
    }

    public function destroy($message)
    {
        return $message->delete();
    }
}
