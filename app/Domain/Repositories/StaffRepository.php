<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:11
 */

namespace App\Domain\Repositories;

use App\Staff;
use Illuminate\Support\Facades\DB;


class StaffRepository
{
    /**
     * Save a user record.
     *
     * @param array $data
     */
    public function save($data)
    {
        Staff::create($data);
    }

    /**
     * Fetch a user record.
     *
     * @param  $id
     * @return \App\User
     */
    public function get($id)
    {
        return Staff::findOrFail($id);
    }

    /**
     * Update user record.
     *
     * @param $id
     * @param array $data
     */
    public function update($id, $data)
    {
        DB::table('staff')->where('id', $id)->update($data);
    }

    /**
     * Soft delete a user record.
     *
     * @param  $id
     * @throws \Throwable
     */
    public function delete($id)
    {
        DB::table('staff')->delete($id);
    }
}
