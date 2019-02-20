@extends('app.app')
@section('content')
    @push('css')
        <style>
            #pass1 {
                margin-bottom: 1em;
            }
        </style>
    @endpush
    @php 
        $user = \Auth::user();
    @endphp
    <div class="content">
        <div class="container">
            <div class="button-row offset-sm-1">
                <a href="{{ url('d/k/'.$result->id_matalomba) }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>{{ $title }} Soal {{ $result->nama_matalomba }}</h3>
                </div>
                <div class="col-12 col-sm-6 offset-sm-3">
                    @if($result->tipe == 'Pilihan Ganda')`
                    <form action="{{ $title == 'Add' ? url('d/k/'. @$result->id_matalomba .'/add/store') : url('d/k/' . @$result->id_matalomba . '/e/'. $soal->id_soal .'/update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipe" value="{{ $result->tipe }}">
                        <div class="form-group">
                            <label for="soal" class="col-form-label">Pertanyaan</label>
                            <textarea name="soal" class="form-control" placeholder="Contoh : Siapa nama ayah kandung Baden Powell ?" required>{{ @$soal->soal }}</textarea>
                        </div>
                        @php
                            $options = ['Smith', 'Powell', 'Gilwell', 'George', 'Jensen'];
                        @endphp
                        @for($i = 1; $i <= 5; $i++)
                        <div class="form-group">
                            <label for="opsi{{ $i }}" class="col-form-label">Opsi ke- {{ $i }}</label>
                            <input type="text" name="opsi{{ $i }}" value="{{ @$opsi[$i-1]->teks_opsi }}" class="form-control" placeholder="Contoh : Robert Baden {{ $options[$i-1] }}" required>
                        </div>
                        @endfor
                        <div class="form-group">
                            <label for="" class="col-form-label">Jawaban Benar</label>
                            <select name="jawaban_benar" id="" class="form-control" required>
                                @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ @$soal->jawaban_benar == $i ? 'selected' : '' }}>Opsi ke-{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file">
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @elseif($result->tipe == 'Kalimat')
                        <form method="post" action="{{ $title == 'Add' ? url('d/k/'. @$result->id_matalomba .'/add/store') : url('d/k/' . @$result->id_matalomba . '/edit/update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="tipe" value="{{ $result->tipe }}">
                            @php
                                $contoh = ['Selamat', 'Datang', 'di', 'GEMA', 'XX', '2019', 'SMP', 'Negeri', '1', 'Baleendah'];
                            @endphp
                            @for($i = 1; $i <= 10; $i++)
                            <div class="form-group">
                                <label for="kata_{{ $i }}" class="col-form-label">Kata ke- {{ $i }}</label>
                                <input type="text" id="kata_{{ $i }}" name="kata_{{ $i }}" value="{{ @$soal->{'kata_' . $i} }}" class="form-control" placeholder="Contoh : {{ $contoh[$i-1] }}" required>
                            </div>
                            @endfor
                            <div class="form-group">
                                <label for="gambar" class="col-form-label">Gambar (opsional)</label>
                                <input type="file" id="gambar" name="gambar" class="form-control-file">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    @elseif($result->tipe == 'Kompasis')
                    <form method="post" action="{{ $title == 'Add' ? url('d/k/'. @$result->id_matalomba .'/add/store') : url('d/k/' . @$result->id_matalomba . '/edit/update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="tipe" value="{{ $result->tipe }}">
                            @php
                                $contoh = ['40.5', '35.45', '30', '25', '55'];
                            @endphp
                            @for($i = 1; $i <= 5; $i++)
                            <div class="form-group">
                                <label for="kata_{{ $i }}" class="col-form-label">Titik Bidik ke- {{ $i }}</label>
                                <input type="text" id="kata_{{ $i }}" name="kata_{{ $i }}" value="{{ @$soal->{'kata_' . $i} }}" class="form-control" placeholder="Contoh : {{ $contoh[$i-1] }}" required>
                            </div>
                            @endfor
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    @endif
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