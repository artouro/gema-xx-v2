@extends('app.app')
@section('content')
    @push('css')
        <style>
            #pass1 {
                margin-bottom: 1em;
            }
            .table-responsive {
                margin-bottom: 2em !important;
            }
            .hide {
                display: none;
            }
            h4 small { text-transform: uppercase; }
        </style>
    @endpush
    @php 
        $user = \Auth::user();
    @endphp
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>Hasil Pengerjaan</h3>
                </div>
                <div class="col-12 row-button">
                    Sort by : <br>
                    <a href="{{ url('d/rekap-detail/peserta') }}" class="btn btn-primary">No. Peserta</a>
                    <a href="{{ url('d/rekap-detail/nilai') }}" class="btn btn-primary">Nilai</a>
                    <a href="{{ url('d/rekap-detail/waktu') }}" class="btn btn-primary">Waktu Pengerjaan</a>
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 text-left mt-5">
                    @foreach($matalomba as $row)
                    @php 
                        $materi = \App\Matalomba::find($row->id_matalomba);
                        if(empty($tipe)) $tipe = 'userid';
                        $direction = $tipe == 'nilai' ? 'desc' : 'asc';
                        $result = \App\Pengerjaan::where('id_matalomba', $row->id_matalomba)->orderBy($tipe, $direction)->get();
                    @endphp
                    <h4>{{ @$materi->nama_matalomba }} <small>|| {{ @$materi->tingkat }}</small></h4>
                        <button class="btn btn-primary" id="btnExport" onclick="javascript:xport.toCSV('table{{ $row->id_matalomba }}')">Export to Excel</button>
                    <!-- <button id="showTxt" class="btn btn-primary">Show Text</button> -->
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table{{ $row->id_matalomba }}">
                            <thead class="thead-dark">
                                <tr>
                                    <td>No. Peserta</td>
                                    <td>Nama Regu</td>
                                    <td>Pangkalan</td>
                                    <td>Waktu Pengerjaan</td>
                                    <td>Nilai</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $res)
                                    <tr>
                                        <td style="text-transform:capitalize">{{ $res->user['userid'] }}</td>
                                        <td>{{ $res->user['nama'] }}</td>
                                        <td>{{ $res->user['pangkalan'] }}</td>
                                        <td>{{ $res->waktu_pengerjaan }}</td>
                                        <td>{{ $res->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
            $(document).ready(function(){
                var table = document.getElementById('table').innerHTML;
                var text = document.createTextNode(table);
                document.getElementById('tableTxt').appendChild(text);
                $('#showTxt').click(function(){
                    $('#tableTxt').toggleClass('hide');
                });
            });
        </script>
        <script type="text/javascript" src="{{ asset('assets/app/js/export.js') }}"></script>
    @endpush
@endsection