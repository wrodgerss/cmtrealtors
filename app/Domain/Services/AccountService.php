<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 2:37 PM
 */

namespace App\Domain\Services;


use App\Domain\Repositories\AccountRepository;

class AccountService
{
    private $accountRepository;

    /**
     * AccountService constructor.
     *
     * @param \App\Domain\Repositories\AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Create user account.
     *
     * @param array $data
     */
    public function create($data)
    {
        $this->accountRepository->save($data);
    }

    /**
     * Retrieve user account.
     *
     * @param  $id
     * @return \App\User
     */
    public function load($id)
    {
        return $this->accountRepository->fetch($id);
    }

    /**
     * Update user details.
     *
     * @param $id
     * @param array $data
     */
    public function edit($id, $data)
    {
        $this->accountRepository->update($id, $data);
    }

    /**
     * Delete user account.
     *
     * @param  $id
     * @throws \Throwable
     */
    public function remove($id)
    {
        $this->accountRepository->delete($id);
    }
}