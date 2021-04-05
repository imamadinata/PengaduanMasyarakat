<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view ('login');
    }

    public function register() {
        return view ('register');
    }

    public function prosesReg(Request $req)
    {
        if ($req->password != $req->repassword ) {
            return redirect()->back()->with('error','password tidak sama');
        } else {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->level = "masyarakat";
            $user->created_at = date('Y-m-d');
            $user->save();

            return redirect('login')->with('error', 'pendaftaran berhasil silahkan login');
        }
    }

    public function prosesLogin(Request $req) {
        //dd($req);
        request()-> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email','password');
        if (Auth::attempt($credentials)) {
            $user = Auth::User();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'petugas') {
                return redirect()->intended('petugas');
            } elseif ($user->level == 'masyarakat') {
                return redirect()->intended('masyarakat');
            }
            return redirect('/');
        }
        return redirect('login')->with('error','Username atau password salah');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login')->withSucces('anda berhasil logout');
    }
}
