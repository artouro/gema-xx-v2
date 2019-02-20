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
            thead th {
                white-space: nowrap;
                font-weight: 300;
            }
            .gambar-soal {
                margin-bottom: 1em;
            }
            .gambar-soal img {
                width: 100%;
                border-radius: 10px;
                box-shadow: 0px 1px 2px 1px rgba(0,0,0,.3);
            }
        </style>
    @endpush
    @php 
        $user = \Auth::user();
    @endphp
    <div class="content">
        <div class="container">
            <div class="button-row offset-sm-1">
                <a href="{{ url('d/k/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>{{ $result->nama_matalomba }} <br> <small>tingkat {{ $result->tingkat }}</small></h3>
                </div>
                <a href="{{ url('d/k/'. $result->id_matalomba .'/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Soal</a>
                <div class="col-12 col-sm-8 offset-sm-2 text-left mt-5">
                    @if($result->tipe === 'Pilihan Ganda')
                        @php
                            $i = 1;
                        @endphp
                        @foreach($result->jumlahSoal as $soal)
                            <div class="mt-3" style="border-bottom: 1px solid #cdcdcd">
                                @if($soal->gambar)
                                    <div class="gambar-soal">
                                        <img src="{{ asset('storage/uploads/soal/' . $soal->gambar) }}">
                                    </div>
                                @endif
                                {{ $i++ }}. &nbsp;&nbsp;{{ $soal->soal }}
                                @php 
                                    $id = $soal->id_soal;
                                    $data = \App\Soal::find($id)->opsi;
                                    $jawaban_benar = $soal->jawaban_benar;
                                    $teks_jawaban = '';
                                @endphp
                                @foreach($data as $row)
                                    @php
                                        if($row->opsi_ke == $jawaban_benar) $teks_jawaban = $row->teks_opsi;
                                    @endphp
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jawaban" value="{{ $row->id_opsi }}">{{ $row->teks_opsi }}
                                        </label>
                                    </div>
                                @endforeach
                                <br>
                                Jawaban Benar : {{ $teks_jawaban }}
                                <br>
                                <a href="{{ url('d/k/' . $result->id_matalomba . '/e/' . $row->id_soal) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ url('d/k/soal/'. $row->id_soal .'/destroy') }}" class="btn btn-danger">Delete</a>
                                <br>
                                <br>
                            </div>
                        @endforeach
                    @elseif($result->tipe === 'Kalimat')
                        <div class="col-12 gambar-soal">
                            @if(@$result->kalimat->gambar)
                                <a href="{{ asset('uploads/soal2/' . @$result->kalimat->gambar) }}" data-toggle="lightbox">
                                    <img src="{{ asset('uploads/soal2/' . @$result->kalimat->gambar) }}" width="300">
                                </a>
                            @endif
                        </div>
                        <table class="table table-striped">
                            @for($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>Kata {{ $i }} </td>
                                    <td>{{ @$result->kalimat->{'kata_' . $i} }}</td>
                                </tr>
                            @endfor
                        </table>
                    @elseif($result->tipe === 'Kompasis')
                        <table class="table table-striped">
                            @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>Titik Bidik ke-{{ $i }} </td>
                                    <td>{{ @$result->kalimat->{'kata_' . $i} }}</td>
                                </tr>
                            @endfor
                        </table>
                    @endif
                </div>
            </div>
        </div>            
    </div>
    @push('js')
        <script type="text/javascript">
            $(document).on("click", '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
            function logout(){
                document.getElementById('formLogout').submit();
            }
        </script>
    @endpush
@endsection