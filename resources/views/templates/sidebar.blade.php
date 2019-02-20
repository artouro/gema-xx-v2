@php
    $user = \Auth::user();
@endphp
<div class="sidebar" id="sidebar">
    <div class="col-12">
        <div class="row">
            <div class="col">
                <h2>MENU</h2>
            </div>
            <div class="col text-right">
                <span class="fa fa-times sidebar-close" id="sidebar-close"></span>
            </div>
        </div>
    </div>
    <ul class="list-group">
        <a href="{{ url('d/') }}"><li class="list-group-item"><i class="fa fa-fw fa-home"></i> Beranda</li></a>
        @if(@$user->level == 1 || @$user->level == 2)
            <a href="{{ url('d/k') }}"><li class="list-group-item"><i class="fa fa-fw fa-book"></i> Kematerian</li></a>
        @endif
        @if(@$user->level == 1)
            <a href="{{ url('d/panitia') }}"><li class="list-group-item"><i class="fa fa-fw fa-user-circle"></i> List Panitia</li></a>
            <a href="{{ url('d/form_panitia') }}"><li class="list-group-item"><i class="fa fa-fw fa-user-plus"></i> Add Panitia</li></a>
        @endif
    </ul>
    <hr class="divider-sidebar"> 
    <ul class="list-group">
        <a href="{{ url('d/rekap') }}"><li class="list-group-item"><i class="fa fa-fw fa-book"></i> Rekapitulasi</li></a>
        <a href="{{ url('d/rekap-detail') }}"><li class="list-group-item"><i class="fa fa-fw fa-book"></i> Kompetisi</li></a>
        <a href="{{ url('d/medali') }}"><li class="list-group-item"><i class="fa fa-fw fa-book"></i> Perolehan Medali</li></a>
    </ul>
    <hr class="divider-sidebar"> 
    <ul class="list-group">
        @if(@$user->level == 1 || @$user->level == 2)
            <a href="{{ url('d/registrant') }}"><li class="list-group-item"><i class="fa fa-fw fa-list-alt"></i> List Pendaftar</li></a>
            <a href="{{ url('d/form_registrant') }}"><li class="list-group-item"><i class="fa fa-fw fa-user-plus"></i> Registrasi Peserta</li></a>
        @endif
        <a href="{{ url('d/g') }}"><li class="list-group-item"><i class="fa fa-fw fa-book"></i>Daftar Regu/Sangga</li></a>
        <a href="{{ url('d/konfirmasi') }}"><li class="list-group-item"><i class="fa fa-fw fa-hand-holding-usd"></i> Konfirmasi Pembayaran</li></a>
    </ul>
</div>