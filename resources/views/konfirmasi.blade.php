@extends('app.app')
@section('content')
    @push('css')
        <style>
            #inputFile {
                display: none;
            }
            .wrapper img {
                width: 250px;
                margin-bottom: 2em;
            }
            label[for="inputFile"]{
                font-size: 1em;
                font-weight: 300;
                background: #7A80B4;
                color: #fff;
                border-radius: 6px;
                padding:1em 2em;
                cursor: pointer;
                transition: .4s;
            }
            label[for="inputFile"]:hover {
                background: #485094;
            }
            #formUpload {
                text-align: center;
            }
            button[type="submit"]{
                margin-left: 1em;
                padding: .92em 2em !important;
                border-radius: 6px !important;
                transform: translateY(-1px);
                display: none;
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
            @media screen and (max-width: 333px){
                button[type="submit"]{
                    margin-left: 0;
                    margin-top: 3em;
                }
            }
        </style>
    @endpush
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>Konfirmasi Pembayaran</h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/app') }}/images/confirm_payment.svg">
                </div>
                <p>
                    Untuk melakukan konfirmasi pembayaran, unggah foto/screenshot bukti transfer bank pada form yang tersedia dibawah.
                    <br>Setelah itu, tunggu konfirmasi dari pihak panitia.
                    <br><br>Ketentuan file : <br>1. Berformat gambar (jpg, png) <br>2. Ukuran file maksimal 1 Mb
                </p>
                <div class="col-12">
                    <p id="filename" class="text-center"></p>
                </div>
                @php
                    $user = \Auth::user();
                @endphp
                @if($user->level > 2 && $user->level < 6)
                    @if($user->aktif == 0 && $user->bukti_pembayaran == '')
                    <form method="post" id="formUpload" action="{{ url('d/konfirmasi/upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group text-center">
                            <label for="" class="col-form-label">Keterangan (opsional) : <br><span class="text-primary">Contoh : Transfer ke BCA a.n Budiman Suryadi</span></label><br>
                            <textarea name="keterangan" cols="50" rows="2"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <label for="inputFile" class="text-center"><i class="fa fa-file"></i>&nbsp; Pilih File</label>
                            <input type="file" id="inputFile" name="bukti_pembayaran" required>
                            <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i> Unggah</button>
                        </div>
                    </form>
                    @elseif($user->aktif == 0 && $user->bukti_pembayaran != '')
                    <div class="text-center col-12">
                        <p class="box box-warning">Bukti pembayaran anda telah diunggah. <br>Menunggu konfirmasi dari panitia.</p>    
                    </div>
                    <form method="post" id="formUpload" action="{{ url('d/konfirmasi/upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group text-center">
                            <label for="inputFile" class="text-center"><i class="fa fa-file"></i>&nbsp; Pilih File</label>
                            <input type="file" id="inputFile" name="bukti_pembayaran" required>
                            <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i> Unggah</button>
                        </div>
                    </form>
                    @else
                        <div class="text-center">
                            <p class="box box-success">Pembayaran anda telah dikonfirmasi</p>
                        </div>
                    @endif
                @else
                    <form method="post" id="formUpload" action="{{ url('d/konfirmasi/upload/panitia') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group text-center">
                            <div class="col-6 offset-3 text-center">
                                <input type="email" id="input-userid" name="userid" class="form-control" placeholder="Email Pinru/Pinsa">
                            </div>
                            <br>
                            <div id="file-input" style="display: none">
                                <label for="inputFile" class="text-center"><i class="fa fa-file"></i>&nbsp; Pilih File</label>
                                <input type="file" id="inputFile" name="bukti_pembayaran" required>
                                <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i> Unggah</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
            (() => {
                $('#input-userid').change(function(){
                    let val = $('#input-userid').val();
                    if(val == ''){
                        $('#file-input').css('display', 'none');
                    } else {
                        $('#file-input').css('display', 'block');
                    }
                })
                $('#inputFile').change(function(){
                    let filename = $('#inputFile')[0].files[0].name;
                    $('#filename').html(filename);
                    $('#btnSubmit').show();
                });
            })();
        </script>
    @endpush
@endsection