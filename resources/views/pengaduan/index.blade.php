@extends('layoutadmin')
@section('style')
<!-- DataTables CSS -->
<link href="{{URL::asset('vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{URL::asset('vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
@endsection
@section('jscript')
<!-- DataTables JavaScript -->
<script src="{{URL::asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables').DataTable({
        responsive: true
    });
});
</script>
@endsection
@section('konten')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Data Pengaduan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengaduan Masyarakat
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Nama Pengirim</th>
                            <th>Isi Aduan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $peng)
                            @if ($noUrut%2 == 0)
                            <tr class="odd gradeX">
                            @else
                            <tr class="odd gradeC">
                            @endif
                                <td>{{ $noUrut++ }}</td>
                                <td>{{ date('d M Y',strtotime($peng->tglPengaduan)) }}</td>
                                <td>{{ $peng->user->name }}</td>
                                <td>{{ $peng->isiLaporan }}</td>
                                <td>
                                    <a class="btn btn-outline btn-primary" href="{{route('pengaduan.show',$peng->id)}}">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection