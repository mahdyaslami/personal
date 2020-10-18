@extends('layout')

@section('content')

<div class="py-5 text-center">
    <h2>Accounts form</h2>
    <p class="lead">Add your accounts credential here.</p>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="/accounts" method="POST">
            @csrf

            <div class="form-group">
                <label for="domain">Domain</label>

                <input type="text" name="domain" class="form-control" id="domain">
            </div>

            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" name="username" class="form-control" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input type="text" name="password" class="form-control" id="password">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Save</button>
        </form>
    </div>
</div>

@endsection