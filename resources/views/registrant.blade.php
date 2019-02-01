@extends('app.app')
@section('content')
    @push('css')
        <style>
            table {
                overflow-x: auto;
            }
            div.table-responsive {
                margin-bottom: 1em;
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
        </style>
    @endpush
    <div class="content">
        <div class="container">
            @include('templates.feedback')
            <div class="col-12 wrapper">
                <div class="content-header">
                    <h3>List Pendaftar</h3>
                </div>
                <div class="button-list">
                    <ul>
                        <li><button class="btn btn-info" data-target="#table-sd" data-toggle="collapse">SD</button></li>
                        <li><button class="btn btn-info" data-target="#table-smp" data-toggle="collapse">SMP</button></li>
                        <li><button class="btn btn-info" data-target="#table-sma" data-toggle="collapse">SMA</button></li>
                    </ul>
                </div>
                <!-- Table Pendaftar SD -->
                <div class="table-responsive collapse" id="table-sd">
                    <h4>Pendaftar SD</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Pangkalan</td>
                                <td>Email</td>
                                <td>Telepon</td>
                                <td>Pembayaran</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sd) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($sd as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->telp }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Sudah Dikonfirmasi
                                            @elseif($row->aktif == 0 && $row->bukti_pembayaran != NULL)
                                                Belum Dikonfirmasi
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->bukti_pembayaran != NULL && $row->aktif == 0)
                                                <a href="{{ url('/d/registrant/konfirmasi/' . $row->userid) }}" class="btn btn-warning">Konfirmasi</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @php 
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                            <tr><td colspan="10" class="text-center">Data tidak ada.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End of Table Pendaftar SD -->
                 <!-- Table Pendaftar SMP -->
                 <div class="table-responsive collapse" id="table-smp">
                    <h4>Pendaftar SMP</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Pangkalan</td>
                                <td>Email</td>
                                <td>Telepon</td>
                                <td>Pembayaran</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($smp) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($smp as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->telp }}</td>
                                        <td>
                                            @if(empty($row->payment()->first()->bukti_pembayaran))
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->payment()->first()->status == 1)
                                                Sudah Dikonfirmasi
                                            @elseif($row->payment()->first()->status == 0 && $row->payment() != NULL)
                                                Belum Dikonfirmasi
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($row->payment()->first()->bukti_pembayaran) && $row->aktif == 0)
                                                <a href="{{ url('/d/g/' . $row->id) }}" class="btn btn-warning">More</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @php 
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                            <tr><td colspan="10" class="text-center">Data tidak ada.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End of Table Pendaftar SMP -->
                 <!-- Table Pendaftar SMA -->
                 <div class="table-responsive collapse" id="table-sma">
                    <h4>Pendaftar SMA</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Pangkalan</td>
                                <td>Email</td>
                                <td>Telepon</td>
                                <td>Pembayaran</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sd) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($sma as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->telp }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Sudah Dikonfirmasi
                                            @elseif($row->aktif == 0 && $row->bukti_pembayaran != NULL)
                                                Belum Dikonfirmasi
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->bukti_pembayaran != NULL && $row->aktif == 0)
                                                <a href="{{ url('/d/registrant/konfirmasi/' . $row->userid) }}" class="btn btn-warning">Konfirmasi</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @php 
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                            <tr><td colspan="10" class="text-center">Data tidak ada.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End of Table Pendaftar SMA -->
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