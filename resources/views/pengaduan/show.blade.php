@extends('layoutadmin')
@section('konten')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Detail Pengaduan</h1>
    </div>
    @if (session('pesan'))
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('pesan') }}
            </div>
        </div>
    @endif
    <!-- /.col-lg-12 -->
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $pengaduan->user->name }}
            </div>
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Detail Aduan</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                {{ $pengaduan->isiLaporan }}
                            </div>
                        </div>
                    </div>
                    @if($jmlTanggapan == 0 )
                        <p>---Belum ada Tanggapan---</p>
                    @else
                        @foreach ($tanggapan as $tgp)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Ditanggapi oleh: {{$tgp->user->name}}</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{$tgp->tanggapan}}
                                    <form action="{{ route('tanggapan.destroy',$tgp->id) }}" method="POST">        
                                        @csrf
                                        @method('DELETE')      
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif  
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tanggapi
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" action="{{ Route('tanggapan.store') }}">
                            @csrf
                            <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}" />
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            <input type="hidden" name="tglTanggapan" value="{{ date('Y-m-d') }}" />
                            <div class="form-group">
                                <label>Tanggapan</label>
                                <textarea class="form-control" rows="7" name="tanggapan" required></textarea>
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
@endsection