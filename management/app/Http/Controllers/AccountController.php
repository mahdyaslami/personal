<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', ['accounts' => Account::getByUser(Auth::user()->id)]);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store()
    {
        $validatedData = $this->validateAccount();

        $validatedData['user_id'] = Auth::user()->id;

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

        $validatedData['user_id'] = Auth::user()->id;

        $account->fill($validatedData)->save();

        return view('accounts.show', ['account' => $account]);
    }

    public function destroy($id)
    {
        $account = Account::find($id);

        if ($account->user_id !== Auth::user()->id) {
            abort(404, 'Account not found.');
        }

        $account->delete();

        return redirect()->route('accounts.index');
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
