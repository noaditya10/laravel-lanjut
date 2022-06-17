@extends('template')

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Masuk ke Sistem</p>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                            aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password"
                            aria-describedby="helpPass">
                    </div>

                    <button id="btn-login" class="btn btn-sm btn-primary float-end">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/assets/pages/login.js?v=3') }}"></script>
@endsection
