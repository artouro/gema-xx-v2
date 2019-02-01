@extends('app.app')
@section('content')
    @push('css')
        <style>
            table {
                overflow-x: auto;
            }
            div.table-responsive {
                margin: 1em 0;
            }
            div.table-responsive tr td {
                vertical-align: middle;
            }
            thead {
                background-color: #242849;
                color: #A4AADB;
            }
            .button-list {
                margin-bottom: 3em;
            }
            ul li {
                list-style: none;
                display: inline-block;
                padding-bottom: .5em;
            }
            ul {
                padding-left: 0;
            }
            .bukti {
                margin: 1em 0;
            }
            .bukti li {
                margin-right: .2em;
                padding: .2em;
                display: block;
            }
            .bukti li img,
            .bukti tr td a img {
                width: 80px;
                height: 80px;
                border-radius: 6px;
                box-shadow: 0px 1px 2px 1px rgba(0,0,0,.3);
            }
            h3 small {
                color: #4D5387;
            }
            .form-border {
                border: 1px solid #A4AADB;
                border-radius: 6px;
                padding: 1em;
                margin-bottom: 1em;
            }   
            
            .invoice p {
                margin-bottom: 0;
            }
            .indent {
                padding-left: 1em;
                margin-left: 2px;
                border-left: 3px solid #7A80B4;
            }
            #form-daftar {
                margin-top: 1em;
            }
        </style>
    @endpush
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    @php
                        if($user->level == 5) $title = 'Sangga';
                        else $title = 'Regu';
                    @endphp
                    <h3>{{ $title }} Anda<br><small>{{ $user->pangkalan }}</small></h3>
                </div>
                <div class="col-12">
                    <p>Mengikuti LKBB ? : <b>{{ $user->lkbb == 1 ? 'Ya' : 'Tidak' }}</b></p>
                    @if(\Auth::user()->level >= 3)
                    <button class="btn btn-primary" id="btnDaftar" data-toggle="collapse" data-target="#form-daftar"><i class="fa fa-plus-circle"></i>&nbsp; Daftar {{ $title }}</button>
                    @endif
                    @if(!$user->form_lkbb)
                    <a href="{{ url('d/form_lkbb') }}" class="btn btn-warning" id="btnUploadForm"><i class="fa fa-plus-circle"></i>&nbsp; Upload Formulir LKBB</a>
                    @endif
                    <div class="col-12 col-sm-6 offset-sm-3 form-border collapse" id="form-daftar">
                        <form action="{{ url('d/g/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama {{ $title }}</label>
                                <input type="text" id="nama" name="nama_regu" class="form-control" placeholder="Contoh: Macan Tutul" required>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" value="Putra" id="putra" required> 
                                <label for="putra">Putra</label>  &nbsp;&nbsp;
                                <input type="radio" name="gender" value="Putri" id="putri" required>
                                <label for="putri">Putri</label>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit" id="btnSubmit">Daftarkan</button>
                                <button class="btn btn-secondary" type="reset" id="btnReset">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Table Pendaftar -->
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama {{ $title }}</td>
                                <td>Gender
                                @if(\Auth::user()->level >= 3)
                                <td>Action</td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($peserta) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($peserta as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama_regu }}</td>
                                        <td>{{ $row->gender }}</td>
                                        @if(\Auth::user()->level >= 3)
                                        <td><button id="edit" class="btn btn-warning edit" data-a="{{ $row->nama_regu }}" data-b="{{ $row->gender }}">Edit</button></td>
                                        @endif
                                    </tr>
                                    @php 
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                            <tr><td colspan="4" class="text-center">Data tidak ada.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End of Table Pendaftar Panitia -->
                @if(count($peserta) >= 1)
                <div class="content-header">
                    <h3>Invoice<br><small>Pembayaran</small></h3>
                </div>
                <div class="col-12 invoice">
                    <p>
                        <b>Pangkalan/Basis :</b> {{ $user->pangkalan }}
                        <br>
                        <b>Jumlah {{ $title }} : </b> {{ $i-1 }} {{ $title }}
                        <br>
                        <b>Nama Regu :</b>
                        <br> 
                        <ol>
                            @foreach($peserta as $row)
                                <li>{{ $row->nama_regu }}</li>
                            @endforeach
                        </ol>
                        <b>Mengikuti LKBB :</b> {{ $user->lkbb == 0 ? 'Ya' : 'Tidak' }}
                        <hr>
                        @php
                            if($user->level == 3) $biaya = 200000;
                            elseif($user->level == 4 || $user->level == 5) $biaya = 220000;
                            $total = $biaya * ($i - 1);
                        @endphp
                        <b>Biaya Pendaftaran :</b> Rp. {{ $biaya }} x {{ $i - 1 }} {{ $title }}
                        <br>
                        <b>Total :</b> Rp. {{ $total }}
                        <br>
                        <b>Status Pembayaran :</b> 
                        @if($status === 'LUNAS')
                        <span class="box box-success">{{ $status }}</span>
                        @elseif($status && $status !== '-')
                        <span class="box box-warning">{{ $status }}</span>
                        @else
                        <span>{{ $status }}</span>
                        @endif

                        @if(count($bukti_pembayaran) > 0)
                        <table class="bukti table table-light table-striped">
                        <tr>
                            <td>Bukti</td>
                            <td>Keterangan</td>
                        </tr>
                        @foreach($bukti_pembayaran as $row)
                        <tr>
                            <td><a href="{{ url('storage/uploads/bukti_pembayaran/' . $row->bukti_pembayaran) }}" target="_blank"><img src="{{ url('storage/uploads/bukti_pembayaran/' . $row->bukti_pembayaran) }}"></a></td>
                            <td>{{ $row->keterangan != '' ? $row->keterangan : '-' }}</td>
                        </tr>
                        @endforeach
                        </table>
                        @endif
                        @if(!empty($user->form_lkbb) != NULL)
                        <hr>
                        <p>
                            Form LKBB : <a class="btn btn-primary" href="{{ asset('storage/uploads/form_lkbb/' . $user->form_lkbb) }}" target="_blank">Form LKBB</a>
                            @if($user->form_lkbb && \Auth::user()->level >= 3)
                                <a href="{{ url('d/g/form_lkbb') }}" class="btn btn-warning" id="btnUploadForm"> Ganti File</a>
                            @endif
                        </p>
                        @endif
                        <hr>
                        Silahkan transfer ke rekening berikut : 
                        <br>
                        <p class="indent">
                            BCA : 337 022 2141 a.n Asep Sudrajat<br>
                            BJB : 0017 2306 70100 a.b Atin Tresna
                        </p>
                    </p>
                    <div class="text-center">
                        @if(\Auth::user()->level < 3)
                            @if($status !== 'LUNAS')
                                <a href="{{ url('d/konfirmasi/pembayaran/' . $user->id) }}" class="btn btn-primary">Konfirmasi</a>
                            @endif
                        @else
                            <a href="{{ url('d/konfirmasi') }}" class="btn btn-primary">Konfirmasi Pembayaran</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
        </script>
        <script type="text/javascript">
            $(function(){
                $('.edit').click(function(){
                    let nama = $(this).data('a');
                    let gender = $(this).data('b');
                    $('#form-daftar').toggleClass('show');
                    $('#form-daftar form').attr('action', '{{ url("d/g/" . @$row->id_registrant . "/e") }}');
                    $('#nama').val(nama);
                    $('#putra').removeAttr('checked');
                    $('#putri').removeAttr('checked');
                    if(gender == 'Putra') $('#putra').attr('checked', 'checkhed');
                    else $('#putri').attr('checked', 'checkhed');
                    $('#btnSubmit').addClass('btn-warning').removeClass('btn-primary').html('Ubah');
                });
                $('#btnReset').click(function(){
                    $('#form-daftar').toggleClass('show');
                    $('#form-daftar form').attr('action', '{{ url("d/g/add") }}');
                    $('#nama').val('');
                    $('#putra').removeAttr('checked');
                    $('#putri').removeAttr('checked');
                    $('#btnSubmit').addClass('btn-primary').removeClass('btn-warning').html('Daftarkan');
                });
            });
        </script>
    @endpush
@endsection