@extends('layout')

@section('content')

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
                    <td>{{ $account->domain }}</td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->password }}</td>
                    <td>{{ $account->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection