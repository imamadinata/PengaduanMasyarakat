@extends('layoutmasyarakat')
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
        <h1 class="page-header">Data Pengaduan Saya</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengaduan Saya
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Nama Pengirim</th>
                            <th>Isi Aduan</th>
                            <th>Tanggapan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=1; $i<=$jmlPengaduan; $i++)
                            @if ($i%2 == 0)
                            <tr class="odd gradeX">
                            @else
                            <tr class="odd gradeC">
                            @endif
                                <td>{{ $i }}</td>
                                <td>{{ date('d M Y',strtotime($tglPengaduan[$i])) }}</td>
                                <td>{{ $isiLaporan[$i] }}</td>
                                <td>{{ $foto[$i] }}</td>
                                <td>
                                    @if ($jmlTanggapan[$i] == 0)
                                        <button type="button" class="btn btn-default disabled">0</button>
                                    @else
                                        <a href="{{ URL('detailTanggapan', $id[$i])}}">
                                            <button type="button" class="btn btn-info">{{ $jmlTanggapan[$i] }}</button>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline btn-primary" href="">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection