<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareCookiesData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->hasCookie('nama_cookie') && $request->hasCookie('email_cookie')) {
            $nama = $request->cookie('nama_cookie');
            $email = $request->cookie('email_cookie');
            $toko = $request->cookie('id_shop');
            $pegawai = $request->cookie('id_pegawai');

            // Simpan data ke variabel global (global variable)
            config(['app.nama_cookie' => $nama]);
            config(['app.email_cookie' => $email]);
            config(['app.id_shop' => $toko]);
            config(['app.id_pegawai' => $pegawai]);
            
        }

        return $next($request);
    }


}
