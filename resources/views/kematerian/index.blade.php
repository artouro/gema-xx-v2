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
                    <h3>Daftar Materi</h3>
                </div>
                <a href="{{ url('d/k/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Materi</a>
                <div class="col-12 col-sm-8 offset-sm-2 text-left mt-5">
                    <h4>SD</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td>Nama Materi</td>
                                    <td>Tipe</td>
                                    <td>Jumlah Soal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($sd) > 0)
                                    @foreach($sd as $row)
                                        <tr>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba) }}">{{ $row->nama_matalomba }}</a></td>
                                            <td>{{ $row->tipe }}</td>
                                            <td>{{ count($row->jumlahSoal) }} Soal</td>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba) . '/e' }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('d/k/' . $row->id_matalomba) . '/delete' }}" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <h4>SMP</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td>Nama Materi</td>
                                    <td>Tipe</td>
                                    <td>Jumlah Soal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($smp) > 0)
                                    @foreach($smp as $row)
                                        <tr>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba) }}">{{ $row->nama_matalomba }}</a></td>
                                            <td>{{ $row->tipe }}</td>
                                            @if($row->tipe == 'Pilihan Ganda')
                                            <td>{{ count($row->jumlahSoal) }} Soal</td>
                                            @elseif($row->tipe == 'Kalimat')
                                                @php 
                                                    $res = $row->kalimat()->first();
                                                    $count = 0;
                                                    for($i = 1; $i <= 10; $i++){
                                                        if(empty($res->{'kata' . $i})){
                                                            $count += 1;
                                                        }
                                                    }
                                                @endphp
                                            <td>{{ $count }} kata</td>
                                            @endif
                                            <td></td>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba . '/e') }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('d/k/' . $row->id_matalomba . '/delete') }}" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <h4>SMA</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td>Nama Materi</td>
                                    <td>Tipe</td>
                                    <td>Jumlah Soal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($sma) > 0)
                                    @foreach($sma as $row)
                                        <tr>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba) }}">{{ $row->nama_matalomba }}</a></td>
                                            <td>{{ $row->tipe }}</td>
                                            <td>{{ count($row->jumlahSoal) }} Soal</td>
                                            <td></td>
                                            <td><a href="{{ url('d/k/' . $row->id_matalomba . '/e') }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('d/k/' . $row->id_matalomba . '/delete') }}" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
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
    @endpush
@endsection