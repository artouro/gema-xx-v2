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
            <div class="col-12 col-sm-10 offset-sm-1 button-row">
                <a href="{{ url('d/g') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>Formulir Pendaftaran</h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/app') }}/images/uploading.svg">
                </div>
                <p>
                    Untuk mengunggah formulir pendaftaran, unggah formulir pendaftaran LKBB yang sudah diisi form yang tersedia dibawah.
                    <br>
                    Ketentuan : Format file harus .pdf
                </p>
                <div class="col-12">
                    <p id="filename" class="text-center"></p>
                </div>
                @php
                    $user = \Auth::user();
                @endphp
                    <form method="post" id="formUpload" action="{{ url('d/g/form_lkbb/upload') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group text-center">
                            <div id="file-input">
                                <label for="inputFile" class="text-center"><i class="fa fa-file"></i>&nbsp; Pilih File</label>
                                <input type="file" id="inputFile" name="form_lkbb" required>
                                <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i> Unggah</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
            (() => {
                $('#inputFile').change(function(){
                    let filename = $('#inputFile')[0].files[0].name;
                    $('#filename').html(filename);
                    $('#btnSubmit').show();
                }); 
            })();
        </script>
    @endpush
@endsection