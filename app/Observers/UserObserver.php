<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function created(User $user)
    {

      // dd($user);
    }

    /**
     * Listen to the User updated event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function updating(User $user)
    {
        dd($user);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param \App\User $user
     *
     * @return void
     */
    public function deleting(User $user)
    {
        dd($user);
    }
}
