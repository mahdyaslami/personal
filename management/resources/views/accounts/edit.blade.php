@extends('layouts.accounts')

@section('container')

<div class="py-5 text-center">
    <h2>Accounts Credential</h2>
    <p class="lead">{{ $account->domain }} credential.</p>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="domain">Domain</label>

                <div class="d-flex flex-row align-items-baseline">
                    <div class="font-weight-bold mr-2">https://</div>
                    <input type="text" value="{{ old('domain') ?? $account->domain }}" name="domain" class="form-control @error('domain') is-invalid @enderror" id="domain" @error('domain') aria-describedby="domain-validation-error" @enderror>
                </div>

                @error('domain')
                <div id="domain-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" value="{{ old('username') ?? $account->username }}" name="username" class="form-control @error('username') is-invalid @enderror" id="username" @error('username') aria-describedby="username-validation-error" @enderror>

                @error('username')
                <div id="username-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input type="text" value="{{ old('password') ?? $account->password }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" @error('password') aria-describedby="password-validation-error" @enderror>

                @error('password')
                <div id="password-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ??  $account-> description }}" name="description" id="description" rows="3" @error('description') aria-describedby="description-validation-error" @enderror>{{ old('description') ?? $account->description }}</textarea>

                @error('description')
                <div id="description-validation-error" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection