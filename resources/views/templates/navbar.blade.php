<!-- Navbar -->
@php
    $user = \Auth::user();
@endphp
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="col-4 text-left sidebar-toggler-wrapper">
        <a class="navbar-link" id="sidebar-toggler" class="mr-auto" href="#"><i class="fa fa-bars"></i></a>
    </div>
    <div class="col-4 text-center navbar-brand-wrapper">
        <a class="navbar-brand" href="{{ url('/') }}">GEMA XX</a>
    </div>
    <div class="col-4 text-right auth-user-wrapper">
        <a class="navbar-link  auth-user" id="authToggler"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;<span>{{ @$user->nama }}</span></a>
        <div class="auth-user-collapse hide" id="auth-dropdown">
            {{ @$user->nama }}<br>
            <small>{{ @$user->pangkalan }}</small>
            <ul>
                <hr>
                <a href="" onClick="event.preventDefault();logout()"><li class="btn btn-outline-danger btn-block">Logout</li></a>
                <form id="formLogout" method="post" action="{{ route('logout')}}">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>        
    </div>
</nav>
<!-- End of Navbar -->