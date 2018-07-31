<?php

namespace App\Repositories;

use Cache;

class CacheMessages
{
    private $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function getPaginated()
    {
        $key = 'messages.page.'.request('page', 1);

        return Cache::tags('messages')->rememberForever($key, function () {
            return $this->messages->getPaginated();
        });
    }

    public function store($request)
    {
        $message = $this->messages->store($request);

        Cache::tags('messages')->flush();

        return $message;
    }

    public function findById($message)
    {
        return Cache::tags('messages')->rememberForever("message.$message->id",

      function () use ($message) {
          return $this->messages->findById($message);
      });
    }

    public function update($request, $message)
    {
        Cache::tags('messages')->flush();

        return $this->messages->update($request, $message);
    }

    public function destroy($message)
    {
        Cache::tags('messages')->flush();

        return $this->messages->destroy($message);
    }
}
