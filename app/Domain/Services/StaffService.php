<?php
/**
 * Created by IntelliJ IDEA.
 * User: timothynzuna
 * Date: 2019-02-06
 * Time: 16:11
 */

namespace App\Domain\Services;


use App\Domain\Repositories\StaffRepository;

class StaffService
{
    /**
     * @var \App\Domain\Repositories\StaffRepository
     */
    private $staffRepository;

    /**
     * StaffService constructor.
     *
     * @param \App\Domain\Repositories\StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * Create staff account.
     *
     * @param $id
     * @param array $user
     */
    public function create($id, $user)
    {
        $this->staffRepository->save(array_merge($user, ['user_id' => $id]));
    }

    /**
     * Load a user account.
     *
     * @param $id
     * @return \App\User
     */
    public function fetch($id)
    {
        return $this->staffRepository->get($id);
    }

    /**
     * Change user account details.
     *
     * @param $id
     * @param $data
     */
    public function edit($id, $data)
    {
        $this->staffRepository->update($id, $data);
    }

    /**
     * Delete user account.
     *
     * @param $id
     * @throws \Throwable
     */
    public function remove($id)
    {
        $this->staffRepository->delete($id);
    }
}
