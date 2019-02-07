<?php

namespace App\Http\Controllers;

use App\Domain\ViewModels\StaffView;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Http\Request;
use App\Domain\Services\StaffService;
use App\Http\Requests\StoreStaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Domain\ViewModels\StaffView $staffView
     * @return \Illuminate\Http\Response
     */
    public function index(StaffView $staffView)
    {
        $users = $staffView->index();
        return view('staff.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStaffRequest $request
     * @param \App\Domain\Services\StaffService $staffService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request, StaffService $staffService)
    {
        $staffService->create($request->all());
        session()->flash('success', 'Staff account has been created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param \App\Domain\Services\StaffService $staffService
     * @return \Illuminate\Http\Response
     */
    public function show($id, StaffService $staffService)
    {
        $user = $staffService->fetch($id);
        return view('staff.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \App\Domain\Services\StaffService $staffService
     * @return \Illuminate\Http\Response
     */
    public function edit($id, StaffService $staffService)
    {
        $user = $staffService->fetch($id);
        return view('staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id, StaffService $staffService)
    {
        $staffService->edit($id, $request->all());
        session()->flash('success', 'Account has been updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\StaffService $staffService
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id, StaffService $staffService)
    {
        $staffService->remove($id);
        session()->flash('success', 'Account has been deleted!');
        return back();
    }
}
