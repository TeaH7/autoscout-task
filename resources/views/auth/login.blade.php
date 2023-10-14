@extends('front.layout.app')

@section('content')
    <div class="container mx-auto mt-5">

        <div class="d-flex align-items-center justify-content-center p-4">
            <div class="card mt-5 w-50">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-5">
                            <h2 class="text-black text-center">Login</h2>
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email"
                                name="email" placeholder="Email" autofocus />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <input type="password" class="form-control @error('password') is-invalid  @enderror"
                                id="password" name="password" placeholder="Password" autofocus />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-1 mt-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <a href="{{ route('register') }}">
                                <span>Create an Account</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
