<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 8:57 PM
 */

namespace App\Domain\Services;


use App\Domain\Repositories\TaskLogRepository;

class TaskLogService
{
    /**
     * @var \App\TaskLog
     */
    private $taskLogRepository;

    /**
     * TaskLogService constructor.
     *
     * @param TaskLogRepository $taskLogRepository
     */
    public function __construct(TaskLogRepository $taskLogRepository)
    {
        $this->taskLogRepository = $taskLogRepository;
    }

    /**
     * Create a task log.
     *
     * @param array $data
     */
    public function create($data)
    {
        $this->taskLogRepository->save($data);
    }

    /**
     * Retrieve a task log details.
     *
     * @param  $id
     * @return \App\TaskLog
     */
    public function load($id)
    {
        return $this->taskLogRepository->fetch($id);
    }

    /**
     * Update a task log.
     *
     * @param $id
     * @param array $data
     */
    public function edit($id, $data)
    {
        $this->taskLogRepository->update($id, $data);
    }

    /**
     * Delete a task log.
     *
     * @param $id
     * @throws \Throwable
     */
    public function remove($id)
    {
        $this->taskLogRepository->delete($id);
    }
}