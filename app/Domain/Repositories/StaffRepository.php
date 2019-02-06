<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:11
 */

namespace App\Domain\Repositories;

use App\User;
use Illuminate\Support\Facades\Hash;


class StaffRepository
{
    public function save($data)
    {
        $user = User::create([
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make('secret')
        ]);

        $user->staff()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone']
        ]);
    }
}
