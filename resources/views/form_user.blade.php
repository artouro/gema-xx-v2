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
                    <h3>Registrasi Peserta</h3>
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 text-left">
                <form method="post" action="{{ url('/d/form_registrant/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-form-label">Nama Regu</label>
                      <input type="text" class="form-control" name="nama" placeholder="Contoh : Macan Tutul" required>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="gender" value="putra" required> Putra &nbsp;&nbsp;
                      <input type="radio" name="gender" value="putri" required> Putri
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Nama Pangkalan</label>
                      <input type="text" class="form-control" name="pangkalan" placeholder="Contoh : SMP Negeri 1 Baleendah" required>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="level" value="3" required> SD &nbsp;&nbsp;
                      <input type="radio" name="level" value="4" required> SMP &nbsp;&nbsp;
                      <input type="radio" name="level" value="5" required> SMA
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Email Pemimpin Regu / Sangga</label>
                      <input type="text" class="form-control" name="email_pinru" placeholder="Contoh : emailpinru@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Email Pembina Pendamping</label>
                      <input type="text" class="form-control" name="email_pembina" placeholder="Contoh : emailbindamping@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">No. Telepon Pemimpin Regu / Sangga</label>
                      <input type="text" class="form-control" name="telp_pinru" placeholder="Contoh : 081123456789" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">No. Telepon Pembina Pendamping</label>
                      <input type="text" class="form-control" name="telp_pembina" placeholder="Contoh : 081123456789" required>
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