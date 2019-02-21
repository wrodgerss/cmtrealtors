<?php

namespace App\Http\Controllers;

use App\Domain\Services\TaskService;
use App\Domain\ViewQueries\AccountQuery;
use App\Domain\ViewQueries\TaskQuery;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Domain\ViewQueries\TaskQuery $taskQuery
     * @return \Illuminate\Http\Response
     */
    public function index(TaskQuery $taskQuery)
    {
        $tasks = $taskQuery->index();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Domain\ViewQueries\AccountQuery $accountQuery
     * @return \Illuminate\Http\Response
     */
    public function create(AccountQuery $accountQuery)
    {
        $users = $accountQuery->index();
        return view('task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @param  \App\Domain\Services\TaskService $taskService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, TaskService $taskService)
    {
        $taskService->create($request->all());
        session()->flash('success', 'Task has been saved!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Domain\ViewQueries\TaskQuery $taskQuery
     * @return \Illuminate\Http\Response
     */
    public function show($id, TaskQuery $taskQuery)
    {
        $task = $taskQuery->load($id);
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\TaskService $taskService
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TaskService $taskService)
    {
        $task = $taskService->load($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @param  int  $id
     * @param  \App\Domain\Services\TaskService $taskService
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, $id, TaskService $taskService)
    {
        $taskService->edit($id, $request->all());
        session()->flash('success', 'Task has been updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\TaskService $taskService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, TaskService $taskService)
    {
        $taskService->remove($id);
        session()->flash('success', 'Task has been deleted!');
        return back();
    }
}
