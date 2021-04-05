@extends('layout')
@section('menu')
<li class="sidebar-search">
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
    <!-- /input-group -->
</li>
<li class="{{ $menu['dbmenu'] }}">
    <a href="{{URL('masyarakat')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
</li>
<li>
    <a href="#"><i class="fa fa-files-o fa-fw"></i> Pengaduan <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="{{ $menu['pgmenu'] }}">
            <a href="{{URL('pengaduanku')}}">Pengaduan Anda</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
@endsection