@extends('admin.layout')
@section('Headerkonten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Selamat datang di dashboard admin aplikasi pengaduan masyarakat</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/admin">Home</a>
            </li>
        </ol>
    <div>
    <div class="col-lg-2"></div>
</div>
@endsection
@section('konten')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Tahunan</span>
                        <h5>Pengaduan</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $jmlPengaduan }}</h1>
                        <div class="stat-percent font-bold text-success">0% <i class="fa fa-bolt"></i></div>
                        <small>Total Ditanggapi</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">Masyarakat Terdaftar</span>
                        <h5>User</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{ $masyarakat['jml'] }}</h1>
                        <div class="stat-percent font-bold text-info">1 <i class="fa fa-level-up"></i></div>
                        <small>Pendaftar hari ini</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pengaduan Hari Ini</h5>
                        <div class="pull-right">
                            {{ date('d-m-Y') }}
                        </div>
                    </div>
                    @if ($pengaduanNow == 0)
                        <div class="ibox-content">
                            -- Tidak ada pengaduan hari ini --
                        </div>
                    @else
                        @foreach ($pengaduan as $pengaduans)
                            <div class="ibox-content">
                                <p><strong>{{ $pengaduans->user->name }}</strong></p>
                                <p>{{ $pengaduans->isiLaporan }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('welcome')
setTimeout(function() {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 1000
    };
    toastr.success('Aplikasi Pengaduan Online', 'Welcome to PENGADUANs');
}, 4000);
@endsection