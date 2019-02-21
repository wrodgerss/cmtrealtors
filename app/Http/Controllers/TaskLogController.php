<?php

namespace App\Http\Controllers;

use App\Domain\Services\TaskLogService;
use App\Domain\Services\TaskService;
use App\Domain\ViewQueries\TaskLogQuery;
use App\Http\Requests\StoreTaskLogRequest;
use Illuminate\Http\Request;

class TaskLogController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function create(Request $request)
    {
        $task_id = $request->query('task');
        $this->authorize('task-owner', $task_id);
        return view('tasklog.create', compact('task_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskLogRequest  $request
     * @param  \App\Domain\Services\TaskLogService $taskLogService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskLogRequest $request, TaskLogService $taskLogService)
    {
        $taskLogService->create($request->all());
        session()->flash('success', 'Task log has been added!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Domain\ViewQueries\TaskLogQuery $taskLogQuery
     * @return \Illuminate\Http\Response
     */
    public function show($id, TaskLogQuery $taskLogQuery)
    {
        $taskLog = $taskLogQuery->load($id);
        return view('tasklog.show', compact('taskLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\TaskLogService $taskLogService
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TaskLogService $taskLogService)
    {
        $taskLog = $taskLogService->load($id);
        return view('tasklog.edit', compact('taskLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskLogRequest  $request
     * @param  int  $id
     * @param  \App\Domain\Services\TaskLogService $taskLogService
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskLogRequest $request, $id, TaskLogService $taskLogService)
    {
        $taskLogService->edit($id, $request->all());
        session()->flash('success', 'Task log has been updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\TaskLogService $taskLogService
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy($id, TaskLogService $taskLogService)
    {
        $taskLogService->remove($id);
        session()->flash('success', 'Task log has been updated!');
        return back();
    }
}
