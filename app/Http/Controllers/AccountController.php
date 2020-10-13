<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $account = Account::create($request->all());

        return $account;
    }
}
