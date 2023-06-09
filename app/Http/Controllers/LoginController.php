<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        // $credentials = $request->only('EMAIL_PEGAWAI', 'PASSWORD_PEGAWAI');
        // echo 'console.log('.json_encode($credentials).');';
        
        // if (Auth::attempt($credentials)) {
        //     // Berhasil sign in
        //     return redirect()->intended('/products');
        // } else {
        //     // Gagal sign in
        //     echo 'alert(error)';
        //     return 
        //     // redirect()->intended('/products');
        //     back()->withErrors([
        //         'email' => 'Email atau password salah.',
        //     ]);
        // }

        $email = $request->input('EMAIL_PEGAWAI');
        $password = $request->input('PASSWORD_PEGAWAI');

        $pegawai = Pegawai::where('EMAIL_PEGAWAI', $email)->first();
        

        if ($pegawai && $password == $pegawai->PASSWORD_PEGAWAI) {
            Auth::login($pegawai);
            $idtoko = Pegawai::where('EMAIL_PEGAWAI', $email)->first();
            Session::put('id_shop', $idtoko);
            Cookie::queue('id_pegawai', $idtoko->ID_PEGAWAI, 60);
            Cookie::queue('id_shop', $idtoko->ID_SHOP, 60);
            Cookie::queue('nama_cookie',$idtoko->USERNAME_PEGAWAI,60);
            Cookie::queue('email_cookie',$idtoko->EMAIL_PEGAWAI,60);
            echo 'console.log('.json_encode($idtoko).');';
            return redirect()->intended('/products');
        } else {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
    }


public function logout(Request $request)
{
    $response = redirect('/'); // Ganti dengan URL tujuan setelah log out

    // Hapus semua cookies
    $response->withCookie(Cookie::forget('nama_cookie'));
    $response->withCookie(Cookie::forget('email_cookie'));
    $response->withCookie(Cookie::forget('id_shop'));
    $response->withCookie(Cookie::forget('id_pegawai'));
    // Tambahkan cookie lain yang ingin dihapus

    // Lakukan proses log out lainnya, seperti menghapus sesi atau data pengguna

    return $response;
}

}
