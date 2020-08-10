@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
        <div class="text-center mt-70">
            <h4>Login</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">login</button>
                </div>
                </div>

            </form>
            </div>
        </div>

        </div>
    </section>
@endsection

@push('custom-css')
<style>
    .mt-70 {
    margin-top: 70px;
    }

    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    }
</style>
@endpush
