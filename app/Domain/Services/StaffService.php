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
}
