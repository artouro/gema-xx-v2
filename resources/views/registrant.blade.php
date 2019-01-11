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
                        <li><button class="btn btn-info" data-target="#table-sdputra" data-toggle="collapse">SD Putra</button></li>
                        <li><button class="btn btn-info" data-target="#table-sdputri" data-toggle="collapse">SD Putri</button></li>
                        <li><button class="btn btn-info" data-target="#table-smpputra" data-toggle="collapse">SMP Putra</button></li>
                        <li><button class="btn btn-info" data-target="#table-smpputri" data-toggle="collapse">SMP Putri</button></li>
                        <li><button class="btn btn-info" data-target="#table-smaputra" data-toggle="collapse">SMA Putra</button></li>
                        <li><button class="btn btn-info" data-target="#table-smaputri" data-toggle="collapse">SMA Putri</button></li>
                    </ul>
                </div>
                <!-- Table Pendaftar SD Putra -->
                <div class="table-responsive collapse" id="table-sdputra">
                    <h4>SD Putra</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sdputra) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($sdputra as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SD Putra -->

                <!-- Table Pendaftar SD Putri -->
                <div class="table-responsive collapse" id="table-sdputri">
                    <h4>SD Putri</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sdputri) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($sdputri as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SD Putri -->

                <!-- Table Pendaftar SMP Putra -->
                <div class="table-responsive collapse" id="table-smpputra">
                    <h4>SMP Putra</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($smpputra) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($smpputra as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SMP Putra -->

                <!-- Table Pendaftar SMP Putri -->
                <div class="table-responsive collapse" id="table-smpputri">
                    <h4>SMP Putri</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($smpputri) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($smpputri as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SMP Putri -->

                <!-- Table Pendaftar SMA Putra -->
                <div class="table-responsive collapse" id="table-smaputra">
                    <h4>SMA Putra</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($smaputra) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($smaputra as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SMA Putra -->

                <!-- Table Pendaftar SMA Putri -->
                <div class="table-responsive collapse" id="table-smaputri">
                    <h4>SMA Putri</h4>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>Nama Regu</td>
                                <td>Pangkalan</td>
                                <td>Email Pinru/Pinsa</td>
                                <td>Email Bindamping</td>
                                <td>Telepon Pinru/Pinsa</td>
                                <td>Telepon Bindamping</td>
                                <td>Status Pembayaran</td>
                                <td>Aktif</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($smaputri) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($smaputri as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->email_pinru }}</td>
                                        <td>{{ $row->email_pembina }}</td>
                                        <td>{{ $row->telp_pinru }}</td>
                                        <td>{{ $row->telp_pembina }}</td>
                                        <td>
                                            @if($row->bukti_pembayaran == NULL)
                                                Belum Bayar
                                            @else
                                                Sudah Bayar
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->aktif == 1)
                                                Aktif
                                            @else
                                                Tidak Aktif
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
                <!-- End of Table Pendaftar SMA Putri -->
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