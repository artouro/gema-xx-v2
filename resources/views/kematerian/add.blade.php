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
                <a href="{{ url('d/k') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            @include('templates.feedback')
            <div class="col-12 col-sm-10 offset-sm-1 wrapper">
                <div class="content-header">
                    <h3>{{ $title }} Matalomba</h3>
                </div>
                <div class="col-12 col-sm-6 offset-sm-3">
                    <form action="{{ $title == 'Add' ? url('d/k/add/store') : url('d/k/' . @$result->id_matalomba . '/e/update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama_matalomba" class="col-form-label">Nama Matalomba</label>
                            <input id="nama_matalomba" type="text" name="nama_matalomba" class="form-control" value="{{ @$result->nama_matalomba }}" placeholder="Contoh: Sandi" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Tingkat</label>
                            <select name="tingkat" id="" class="form-control" required>
                                <option value="sd" {{ @$result->tingkat == 'sd' ? 'selected' : '' }}>SD</option>
                                <option value="smp" {{ @$result->tingkat == 'smp' ? 'selected' : '' }}>SMP</option>
                                <option value="sma" {{ @$result->tingkat == 'sma' ? 'selected' : '' }}>SMA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Tipe Soal</label>
                            <select name="tipe" id="" class="form-control" required>
                                <option value="Pilihan Ganda" {{ @$result->tipe == 'Pilihan Ganda' ? 'selected' : '' }}>Pilihan Ganda</option>
                                <option value="Kalimat" {{ @$result->tipe == 'Kalimat' ? 'selected' : '' }}>Kalimat</option>
                                <option value="Praktek" {{ @$result->tipe == 'Praktek' ? 'selected' : '' }}>Praktek</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="waktu" class="col-form-label">Lama Waktu Pengerjaan (menit)</label>
                            <input id="waktu" type="text" name="waktu" class="form-control" value="{{ @$result->waktu }}" placeholder="Contoh: 10" required>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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