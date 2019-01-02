@extends('app.app')
@section('content')
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="col text-center navbar-brand-wrapper">
            <a class="navbar-brand" href="{{ url('/') }}">GEMA XX</a>
        </div>
    </nav>
    <!-- End of Navbar -->
    <div class="content">
        <div class="container">
            <div class="col-12 col-sm-8 col-md-4 offset-md-4 offset-sm-2 wrapper text-center login">
                <h2>Sign In</h2>
                <img src="{{ asset('assets/app') }}/images/login.svg" width="80">
                <p>
                    Silahkan <i>sign in</i> untuk melanjutkan ke <span>GEMA XX</span>
                    <br>
                </p>
                <p class="text-left login-note"><small>Note: <br>Gunakan email pemimpin regu/sangga yang didaftarkan <br>sebagai UserID</small></p>
                <form method="post" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="UserID">
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