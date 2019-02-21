<?php

namespace App\Http\Controllers;

use App\Domain\Services\AccountService;
use App\Domain\ViewQueries\AccountQuery;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Domain\ViewQueries\AccountQuery $accountQuery
     * @return \Illuminate\Http\Response
     */
    public function index(AccountQuery $accountQuery)
    {
        $users = $accountQuery->index();
        return view('account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @param  \App\Domain\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request, AccountService $accountService)
    {
        $accountService->create($request->all());
        session()->flash('success', 'Account has been saved!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function edit($id, AccountService $accountService)
    {
        $account = $accountService->load($id);
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  int  $id
     * @param  \App\Domain\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id, AccountService $accountService)
    {
        $accountService->edit($id, $request->all());
        session()->flash('success', 'Account has been updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Domain\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy($id, AccountService $accountService)
    {
        $accountService->remove($id);
        session()->flash('success', 'Account has been deleted!');
        return back();
    }
}
