<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pengaduan;
use \App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = array ('dbmenu'=>'active','pgmenu'=>'','tgmenu'=>'');
        $data['pengaduan'] = Pengaduan::select('id','tglPengaduan','isiLaporan','foto','user_id')->with([
            'user' => function($query) {
                $query->select('id','name');
            }
        ])->get();
        $data['jmlData'] = count($data['pengaduan']);
        $data['noUrut'] = 1;
        //dd($data);
        return view('pengaduan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        Pengaduan::create($request->all());
        return redirect()->back()->with('Pesan', 'Pengaduan berhasi disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pengaduan'] = Pengaduan::with('user')->find($id);
        $data['menu'] = array ('dbmenu'=>'','pgmenu'=>'active', 'tgmenu'=>'');
        $data['tanggapan'] = Tanggapan::select('id','pengaduan_id','tglTanggapan','tanggapan','user_id')->with([
            'user'=> function ($query) {
                $query->select('id','name');
            }
        ])->with([
            'pengaduan'=>function ($query) {
                $query->select('id');
            }
        ])->where('pengaduan_id',$id)->get();
        $data['jmlTanggapan'] = count($data['tanggapan']);
        //dd($data);
        return view('pengaduan.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "delete";
    }

    public function pengaduanUser()
    {
        $data['menu'] = array('dbmenu'=>'','pgmenu'=>'active');
        $userid = Auth::user()->id;
        $pengaduan = Pengaduan::select('id','tglPengaduan','isiLaporan','foto','user_id')->where('user_id',$userid)->get();
        $data['jmlPengaduan'] = count($pengaduan);
        $i = 0;
        foreach ($pengaduan as $pengaduan) {
            $i++;
            $tanggapan = Tanggapan::select('id','tglTanggapan','tanggapan','user_id','pengaduan_id')->with([
                'user'=> function($query) {
                    $query->select('id','name');
                }
            ])->where('pengaduan_id',$pengaduan->id)->get();

            if (count($tanggapan) == 0) {
                $data['jmlTanggapan'][$i] = 0;
                $data['tanggapan'][$i] = NULL;
            } else {
                $data['tanggapan'][$i] = $tanggapan;
                $data['jmlTanggapan'][$i] = count($tanggapan);
            }
            $data['id'][$i] = $pengaduan->id;
            $data['tglPengaduan'][$i] = $pengaduan->tglPengaduan;
            $data['isiLaporan'][$i] = $pengaduan->isiLaporan;
            $data['foto'][$i] = $pengaduan->foto;
        }
        //dd($data);
        return view('pengaduan.pengaduanku',$data);
    }
}
