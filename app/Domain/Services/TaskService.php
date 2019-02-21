<?php
/**
 * Created by PhpStorm.
 * User: Brian Kolil
 * Date: 2/20/2019
 * Time: 7:23 PM
 */

namespace App\Domain\Services;


use App\Domain\Repositories\TaskRepository;

class TaskService
{
    private $taskRepository;

    /**
     * TaskService constructor.
     *
     * @param \App\Domain\Repositories\TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Create a new task.
     *
     * @param array $data
     */
    public function create($data)
    {
        $this->taskRepository->save($data);
    }

    /**
     * Update a task.
     *
     * @param $id
     * @param array $data
     */
    public function edit($id, $data)
    {
        $this->taskRepository->update($id, $data);
    }

    /**
     * Deletea task.
     *
     * @param $id
     */
    public function remove($id)
    {
        $this->taskRepository->delete($id);
    }
}