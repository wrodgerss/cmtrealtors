<?php

namespace App\Event;

use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserAccountCreated
{
    use Dispatchable, SerializesModels;

    /**
     * User account.
     *
     * @var \App\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
