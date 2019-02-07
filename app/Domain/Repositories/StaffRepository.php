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
    /**
     * Save a user record.
     * @param $data
     */
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

    /**
     * Fetch a user record.
     * @param $id
     * @return \App\User
     */
    public function get($id)
    {
        return User::with('staff')->find($id);
    }

    /**
     * Update user record
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $user = $this->get($id);
        $user->update([
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->getAuthPassword(),
            'role' => $data['role'] ?? $user->role
        ]);
        $user->staff()->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone']
        ]);
    }

    /**
     * Soft delete a user record
     * @param $id
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->get($id)->delete();
    }
}
