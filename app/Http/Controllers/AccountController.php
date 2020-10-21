<?php

namespace App\Http\Controllers;

use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', ['accounts' => Account::all()]);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store()
    {
        $validatedData = $this->validateAccount();

        $account = Account::create($validatedData);

        return view('accounts.show', ['account' => $account]);
    }

    public function show($id)
    {
        return view(
            'accounts.show',
            ['account' => Account::findOrFail($id)]
        );
    }

    public function edit($id)
    {
        return view(
            'accounts.edit',
            ['account' => Account::findOrFail($id)]
        );
    }

    public function update($id)
    {
        $account = Account::findOrFail($id);

        $validatedData = $this->validateAccount();

        $account->fill($validatedData)->save();

        return $account;
    }

    protected function validateAccount()
    {
        return request()->validate([
            'domain' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'description' => 'sometimes|required|max:4000',
        ]);
    }
}
