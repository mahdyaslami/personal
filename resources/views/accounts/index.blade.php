@extends('layout')

@section('content')

<div class="py-5 text-center">
    <h2>Accounts</h2>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection