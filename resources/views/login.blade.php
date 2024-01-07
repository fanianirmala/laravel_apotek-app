@extends('layouts.template')


@section('content')
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 400px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

</style>

<div class="row">
    <div class="col">
        @if(Session::get('failed'))
            <div class="alert alert-danger"> {{ Session::get('failed') }}</div>
        @endif
        @if (Session::get('logout'))
            <div class="alert alert-primary">{{ Session::get('logout') }}</div>
        @endif
        @if (Session::get('canAccess'))
            <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
        @endif
        @if (Session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin w-100 m-auto">
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
              <h1 class="h3 fw-normal mt-5 mb-5 text-center">Please sign in</h1>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}"/>
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </form>
        </main>
    </div>
</div>

@endsection
