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
     * @var StaffRepository
     */
    private $staffRepository;

    /**
     * StaffService constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * Create staff account.
     * @param $user
     */
    public function create($user)
    {
        $this->staffRepository->save($user);
    }

    /**
     * Load a user account.
     * @param $id
     * @return \App\User
     */
    public function fetch($id)
    {
        return $this->staffRepository->get($id);
    }

    /**
     * Change user account details.
     * @param $id
     * @param $data
     */
    public function edit($id, $data)
    {
        $this->staffRepository->update($id, $data);
    }

    /**
     * Delete user account.
     * @param $id
     * @throws \Exception
     */
    public function remove($id)
    {
        $this->staffRepository->delete($id);
    }
}
