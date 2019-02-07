<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:29
 */

namespace App\Domain\ViewModels;

use App\User;


class StaffView
{
    public function index()
    {
        return User::with('staff')->get();
    }
}
