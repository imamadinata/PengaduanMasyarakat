@extends('layout')
@section('menu')
<li class="{{ $menu['dbmenu'] }}">
    <a href="{{ URL('admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
</li>
<li class="{{ $menu['pgmenu'] }}">
    <a href="{{ URL('pengaduan') }}"><i class="fa fa-table"></i> <span class="nav-label">Pengaduan</span></a>
</li>
@endsection