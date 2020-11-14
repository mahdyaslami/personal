@extends('layouts.accounts')

@section('container')

<div class="py-5 text-center">
    <h2>Account Credential</h2>
    <p class="lead">{{ $account->domain }} credential.</p>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Domain</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="https://{{ $account->domain }}" target="_blank">
                            {{ $account->domain }}
                        </a>
                    </td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->password }}</td>
                    <td>{{ $account->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{ route('accounts.index') }}" class="btn btn-primary">Show all</a>
        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
</div>

@endsection