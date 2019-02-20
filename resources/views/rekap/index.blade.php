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
            .content-header {
                margin-bottom: 2em;
            }
            
            .btnMateri {
                margin-bottom: 1em;
            }
            .up {
                text-transform: uppercase;
            }
            table.keterangan tr td {
                text-align: left !important;
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
            th { font-weight: 300; }
            .row-button {
                text-align: left;
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
                <div class="row-button row">
                    <div class="col">
                        <a href="{{ url('d/rekap/sd') }}" class="btn btn-primary">Rekap SD</a>
                        <a href="{{ url('d/rekap/smp') }}" class="btn btn-primary">Rekap SMP</a>
                        <a href="{{ url('d/rekap/sma') }}" class="btn btn-primary">Rekap SMA</a>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary" id="btnExport" onclick="javascript:xport.toCSV('tableTest')">Export to Excel</button>
                    </div>
                </div>
                <div class="keterangan">
                        <table class="table keterangan">
                            <tr>
                                @php 
                                    $k = 1;
                                @endphp
                                @foreach($sdm as $val)
                                    <td>A{{$k}} : {{ $val->nama_matalomba }}</td>
                                    @php 
                                        $k++;
                                    @endphp
                                @endforeach
                            </tr>
                        </table>
                    </div>
                <div class="table-responsive">
                    <table id="tableTest" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>No.Peserta</th>
                                <th>Nama Regu</th>
                                <th>Basis</th>
                                @for($j = 0; $j < count($sdm); $j++)
                                    <th>A{{ $j+1 }}</th>
                                @endfor
                                <th>Total Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sd as $row)
                                @php
                                    $arr = [];
                                    foreach($sdm as $m){
                                        $arr[] = $m->id_matalomba;
                                    }
                                    $total = 0;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td class="up">{{ $row->userid }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->pangkalan }}</td>
                                    @for($h = 0; $h < count($sdm); $h++)
                                        @php
                                            if(!empty($arr[$h])){
                                                $target = \App\Pengerjaan::where('id_matalomba', $arr[$h])
                                                        ->where('userid', $row->userid)->first();
                                                if(!empty($target)) $nilai = $target->nilai;
                                                else $nilai = NULL;
                                            } else {
                                                $nilai = NULL;
                                            }
                                            $total += $nilai;
                                        @endphp
                                        <td>{{ !empty($nilai) ? $nilai : 0 }}</td>
                                    @endfor
                                    <td>{{ $total }}</td>
                                    <td>-</td>
                                </tr>
                                @php 
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    <table>
                </div>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            function logout(){
                document.getElementById('formLogout').submit();
            }
        </script>
        <script type="text/javascript" src="{{ asset('assets/app/js/export.js') }}"></script>
    @endpush
@endsection