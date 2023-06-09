<?php

namespace App\Http\Controllers;

use App\Models\Checkbox;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class CheckboxController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Mendapatkan nilai checkbox yang dipilih dari input
    //     $checkboxes = $request->input('checkbox');

    //     // Simpan nilai checkbox ke dalam database
        
    //     foreach ($checkboxes as $checkbox) {
           
    //         if (isset($checkbox['name'])) {
    //             $name = $checkbox['name'];
    //         } else {
    //             $name = 'nama'; // Atau berikan nilai default sesuai kebutuhan
    //         }
    //         if (isset($checkbox['value'])) {
    //             $value = $checkbox['value'];
    //         } else {
    //             $value = 'yahh'; // Atau berikan nilai default sesuai kebutuhan
    //         }
    //         Checkbox::create([
    //             'name' => $name,
    //             'value' => $value
    //         ]);
    //         return redirect()->back()->with('success', json_encode($checkbox));
    //     }

    //     // Redirect ke halaman yang tepat atau berikan respon sukses
    //     return redirect()->back()->with('success', 'Data checkbox berhasil disimpan.');
    // }
    public function simpanData(Request $request)
{
  $users = $request->input('users');
  $users = $request->all;
  $ab='ab';
  // Proses penyimpanan data ke database atau lakukan tindakan selanjutnya sesuai kebutuhan

  // Misalnya, kembalikan respons JSON jika menggunakan AJAX
  if(isset($users['save'])){
    return response()->json(['message' => 'Data berhasil disimpan']);
  }else{
  }
}
}
