<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $now = date ('Y-m-d');
        //echo $now; exit();
        $data['menu'] = array ('dbmenu'=>'active','pgmenu'=>'','tgmenu'=>'');
        $data['pengaduan'] = Pengaduan::select('id','tglPengaduan','isiLaporan','foto','user_id')->with([
            'user' => function($query) {
                $query->select('id','name');
            }
        ])->where('tglPengaduan',$now)->get();
        $pengaduan = Pengaduan::select('id','tglPengaduan','isiLaporan','foto','user_id')->with([
            'user' => function($query) {
                $query->select('id','name');
            }
        ])->get();
        $data['pengaduanNow'] = count($data['pengaduan']);
        $data['jmlPengaduan'] = count($pengaduan);
        $data['masyarakat']['jml'] = User::select('*')->where('id','3')->count();
        //dd($data);
        return view('dashboard.admin', $data);
    }
}
