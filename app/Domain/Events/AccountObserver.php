<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 2:38 PM
 */

namespace App\Domain\Events;

use App\Event\UserAccountCreated;
use App\User;

class AccountObserver
{
    /**
     * User account has been created.
     *
     * @param \App\User $user
     */
    public function created(User $user)
    {
        event(new UserAccountCreated($user));
    }
}