@extends('layoutmasyarakat')
@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Selamat datang di website Pengaduan Masyarakat Online</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Silahkan masukkan aduan anda!
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="{{ Route('pengaduan.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                <input type="hidden" name="tglPengaduan" value="{{ date('Y-m-d') }}" />
                                <div class="form-group">
                                    <label>Isi Aduan</label>
                                    <textarea class="form-control" rows="7" name="isiLaporan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar / Foto </label>
                                    <input type="file" name="foto" />
                                </div>
                                <button type="submit" class="btn btn-default">Kirim</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection