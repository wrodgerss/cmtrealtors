<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:18
 */

namespace App\Domain\Events;


use App\User;

class StaffObserver
{
    /**
     * User post created event.
     * @param User $user
     */
    public function created(User $user)
    {

    }
}
