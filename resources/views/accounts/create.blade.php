@extends('layout')

@section('content')

<div class="py-5 text-center">
    <h2>Accounts Credential</h2>
    <p class="lead">Add your accounts credential here.</p>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="domain">Domain</label>

                <input type="text" value="{{ old('domain') }}" name="domain" class="form-control @error('domain') is-invalid @enderror" id="domain" @error('domain') aria-describedby="domain-validation-error" @enderror>

                @error('domain')
                <div id="domain-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" value="{{ old('username') }}" name="username" class="form-control @error('username') is-invalid @enderror" id="username" @error('username') aria-describedby="username-validation-error" @enderror>

                @error('username')
                <div id="username-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input type="text" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" @error('password') aria-describedby="password-validation-error" @enderror>

                @error('password')
                <div id="password-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" name="description" id="description" rows="3" @error('description') aria-describedby="description-validation-error" @enderror>{{ old('description') }}</textarea>

                @error('description')
                <div id="description-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary mb-2">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection