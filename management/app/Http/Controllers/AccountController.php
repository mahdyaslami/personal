<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index', ['accounts' => Auth::user()->accounts]);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store()
    {
        $validatedData = $this->validateAccount();

        $account = Auth::user()->accounts()->create($validatedData);

        return view('accounts.show', ['account' => $account]);
    }

    public function show($id)
    {
        $account = Auth::user()->accounts->find($id);

        if (! $account) {
            abort(404, 'Account not found.');
        }

        return view(
            'accounts.show',
            ['account' => $account]
        );
    }

    public function edit($id)
    {
        $account = Auth::user()->accounts->find($id);

        if (! $account) {
            abort(404, 'Account not found.');
        }

        return view(
            'accounts.edit',
            ['account' => $account]
        );
    }

    public function update($id)
    {
        $account = Auth::user()->accounts->find($id);

        if (! $account) {
            abort(404, 'Account not found.');
        }

        $validatedData = $this->validateAccount();

        $account->fill($validatedData)->save();

        return view('accounts.show', ['account' => $account]);
    }

    public function destroy($id)
    {
        $account = Auth::user()->accounts->find($id);

        if (!$account) {
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
