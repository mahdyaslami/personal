@extends('layout')

@section('content')

<div class="py-5 text-center">
    <h2>Accounts Credential</h2>
    <p class="lead">List of your accounts credential.</p>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $key => $account)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        <a href="{{ $account->path() }}">
                            {{ $account->domain }}
                        </a>
                    </td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->password }}</td>
                    <td>{{ $account->description }}</td>
                    <td>
                        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{ route('accounts.create') }}" class="btn btn-success">+ New</a>
    </div>
</div>

@endsection