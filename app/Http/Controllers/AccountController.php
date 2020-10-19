<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

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
