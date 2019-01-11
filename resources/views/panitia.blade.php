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
                    <h3>List Panitia</h3>
                </div>
                <!-- Table Pendaftar Panitia -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <td>No.</td>
                                <td>UserID</td>
                                <td>Nama</td>
                                <td>Divisi</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($panitia) > 0)
                                @php 
                                    $i = 1;
                                @endphp
                                @foreach($panitia as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->userid }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td><a href="" class="btn btn-warning">Edit</a></td>
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
                <!-- End of Table Pendaftar Panitia -->
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