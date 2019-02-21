<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:29
 */

namespace App\Domain\ViewQueries;

use App\User;


class StaffQuery
{
    public function index()
    {
        return User::with('staff')->get();
    }
}
