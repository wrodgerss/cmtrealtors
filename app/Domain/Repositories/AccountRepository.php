<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 2:38 PM
 */

namespace App\Domain\Repositories;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountRepository
{
    /**
     * Save user details.
     *
     * @param array $data
     */
    public function save($data)
    {
        User::create([
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Get user details.
     *
     * @param  $id
     * @return \App\User
     */
    public function fetch($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Save updated user details.
     *
     * @param $id
     * @param array $data
     */
    public function update($id, $data)
    {
        $user =  $this->fetch($id);
        $user->update([
            'email' => $data['email'],
            'role' => $data['role'] ?? $user->role,
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->getAuthPassword()
        ]);
    }

    /**
     * Remove user details.
     *
     * @param  $id
     * @throws \Throwable
     */
    public function delete($id)
    {
        DB::table('users')->delete($id);
    }
}