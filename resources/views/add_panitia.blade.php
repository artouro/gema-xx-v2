@extends('app.app')
@section('content')
    @push('css')
        <style>
            #pass1 {
                margin-bottom: 1em;
            }
        </style>
    @endpush
    @php 
        $user = \Auth::user();
    @endphp
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper text-center">
                <div class="content-header">
                    <h3>Add Panitia</h3>
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 text-left">
                <form method="post" action="{{ url('/d/add_panitia/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="Contoh : Artour Babaev" required>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="gender" value="putra" required> Putra &nbsp;&nbsp;
                      <input type="radio" name="gender" value="putri" required> Putri
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Divisi</label>
                      <input type="text" class="form-control" name="pangkalan" placeholder="Contoh : Divisi IT GEMA XX" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">UserID</label>
                      <input type="text" class="form-control" name="email_pinru" placeholder="Contoh : 99" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Kata Sandi</label>
                        <input type="password" id="pass1" class="form-control" name="password" required>
                        <input type="checkbox" onclick="toggleShow()"> Show Password
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
            function toggleShow(){
                var target = document.getElementById('pass1');
                if(target.type === 'password'){
                    target.type = 'text';
                } else {
                    target.type = 'password';
                }
            }
        </script>
    @endpush
@endsection