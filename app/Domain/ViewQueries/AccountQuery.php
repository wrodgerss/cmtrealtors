<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 2:40 PM
 */

namespace App\Domain\ViewQueries;


use App\User;

class AccountQuery
{
    /**
     * Retrieve a list of user accounts.
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::latest()->get();
    }
}