@extends('app.app')
@section('content')
    @push('css')
        <style>
            .backBtn {
                color: #485094 !important;
            }
        </style>
    @endpush
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="col-4">
            <a href="{{ url('/') }}" class="backBtn"><i class="fa fa-arrow-left"></i> &nbsp;Back</a>
        </div>
        <div class="col-4 text-center navbar-brand-wrapper">
            <a class="navbar-brand" href="{{ url('/') }}">GEMA XX</a>
        </div>
    </nav>
    <!-- End of Navbar -->
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 col-sm-8 col-md-4 offset-md-4 offset-sm-2 wrapper text-center login">
                <h2>Sign In</h2>
                <img src="{{ asset('assets/app') }}/images/login.svg" width="80">
                <p>
                    Silahkan <i>sign in</i> untuk melanjutkan ke <span>GEMA XX</span>
                    <br>
                </p>
                <!-- <p class="text-left login-note"></p> -->
                <form method="post" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-block">Sign In</button>
                </form>
            </div>
        </div>
    </div>        
@endsection