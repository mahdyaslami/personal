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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'domain' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'description' => 'required|max:4000',
        ]);

        $account = Account::create($validatedData);

        return view('accounts.show', ['account' => $account]);
    }
}
