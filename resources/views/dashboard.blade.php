@extends('app.app')
@section('content')
    @push('css')
        <style>
            .wrapper {
                padding: 5em 1em !important;
            }
            .wrapper img {
                width: 250px;
            }
            .wrapper p {
                margin-top: 2em;
                font-family: 'Lato', sans-serif !important;
                font-size: 1.5em;
                font-weight: 100;
            }
            .wrapper span {
                color: #485094;
                font-family: 'Lato', sans-serif !important;
                font-weight: 900;
                font-size: 2em;
            }
            @media screen and (max-width: 335px){
                .wrapper img {
                    width: 200px;
                }
                .wrapper p {
                    font-size: 1.2em;
                }
                .wrapper span {
                    font-size: 1.7em;
                }
            }
        </style>
    @endpush
    @php 
        $user = \Auth::user();
    @endphp
    <div class="content">
        <div class="container">
            <div class="col-12 col-sm-10 offset-sm-1 wrapper text-center">
                <img src="{{ asset('assets/app') }}/images/welcome.svg">
                <p>Selamat Datang di <br><span>GEMA XX 2019</span></p>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
        </script>
    @endpush
@endsection