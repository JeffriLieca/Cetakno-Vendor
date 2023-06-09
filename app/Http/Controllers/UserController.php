<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Checkbox;
use App\Models\Container;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class UserController extends Controller
{
    //
    public function loginfunction(Request $request){
        $input = $request->all(); // ambil semua input
        Session::put('id', '123');
        if(isset($input['login'])){
            return view('index',['toko'=> 'D\'RAYA']);
        }
        return view('index',['toko'=> 'D\'RAYA']);
        // return redirect()->action(
        //     [UserController::class, 'index'], ['message' => $message]
        // );
    }

    public function login(Request $request){
        $input = $request->all(); // ambil semua input
        if(isset($input['login'])){
            return redirect()->action(
                    [ProductController::class, 'loadproduct'], ['message' => 'a123']
                );
        }
        else{
            return view('login',['toko'=> 'D\'RAYA']);
        }
        
        return view('login',['toko'=> 'D\'RAYA']);
    }
    public function simpanData2(Request $request)
    {
        // Ambil data dari request
        $userData = $request->input('users');
        $quilldata = $request->input('content');

        // Lakukan penyimpanan data ke database atau tindakan lainnya sesuai kebutuhan

        // Contoh: Menyimpan data ke database
       
            Checkbox::create([
                'name' => $userData,
                'value' => $quilldata,
            ]);
        
        
           

    // Mendapatkan instance file yang diunggah
    $file = $request->file('gambar');
    $datanya=base64_decode("iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAYAAAA5ZDbSAAAAAXNSR0IArs4c6QAAIABJREFUeF7tvQe4XWWZNnyvvvvpJye9JwQChBqKCihipYgKKCpjAYf5LNjFcSyA3+gooqOj43yKzoijju1TFBzEgjCgAgFCQks9SU7J6Wf3vVf7r/t513uyRUDyieGEn5XrXCdn77XXXut93qfdTzPughHj2eMZuQI/LRRgPEvgZyRt5aGeJfAzl7bPEvgZTttnCfwsgf//sALP8Gd8Vgc/S+Bn+Ao8zuMZALTvGBs4aB3JZzn4cQjcSlTDMBDHBydU8MwnsGEAJI6wpAETQDTDm5DXjdhIXonVafJyjAED6IlNOK3nH2QC7ZlP4EcTxDAQxYqQ/PENwDYMGBHJyh8LgRHCgoEAMezYkPMO1uMZSWATMUJShISLY0SGgZHYQJ8R48E4RgEGuhBj0DDgIkYOBh6EiXVxjLphIB+H2GKYWIoY6ZgcTyI/K6JnxSaPSVzThBlHqMcGduSy+JUfIsykMG4Z2D05iZ4ImDSAV8NEOY4wDgPDcYR2GHgeYozDxBFC+BgpIe7Bexz0HExjSJhVjCADgwZQiYHlRow32zbcw1Yj9ANU6hVYtouJ0RGg6WPugnmoNhqwbBupUgVZWCjvHUNbHMMGcIVh4H0APh1HSKlvQGQA5kHGyActgfe5MTFo5VbiGD8xDPzP8kWwcu1wMmlUqhUM7h2CbZNkESqVqpwbxxEQxejq6oZl2WjUqzAsG1EcwYpjdBVrGJycxlmGiZchQldswkSEKNHbBxM/H2QENhAnkc06gLti4B4beHjxUhQWzcHQ4Ahs10Lgx6jWawjiELZpY2J8HKYRw3VSqNfrYl2lUi6iKILnuLAsE56XQhAE8FIuQj+CZVuw6k3M2T2Mf6QWTqzwGTM7MdMMI0IsYmR2svZBRmB6OgZ2xDGucWxMzOuEl8vD90NYBlCtNhBbJprNprwWhiHqlSpM00QY+vA8T17zPBI3RhTRDovgmSYs20TayyIIfdgpJZR5Hc+ykTFj5PfsxXFhjLMMYBjAijixwBHDiOl8/TGBZ4vvfJAQWHEILeNbDODWtgJ2z+1BGAaYKpbRaDSEG+cvWIjBvcOoVGoIQnKvCceyhaiuawtYwfMMw0QQ+HAcR8S1ZRiwYgOZXBauZ6NWq8FyHCFytVoVMe54KXhRDGdoDEcZMc6OgS4AaQChYSDNWxRXa3YdBwmB1aJ92TLRf/KxGJucRKNaR61UheE6Inani0URs8VKFYvmz8ckz2k0ROfyJ51OC+Goj0lwimWKXW4Sx3FhWiaCRgM93Z1yPRK/wvMdD36zKbSLfR9upYETDANTiHFJbKANMXoTKJMWvPKuZ89xEBCYHmiEjxgmhtYuh2mYKE5Po1qqwQ98ZHI51GrUyECxVIZtO0LATCYj3EeOJXF93xfiNsNAOM1NODSKgoSrgbTjIgwCZDIeHM8TjjdM4lgxXM8T4hWLJXSNTYr/fBYMvNgwBAyJDRpovNfZxcWzn8CGgZ1xjPdnPNi9HfAbPhqBjzCMYMYGKo0mspm0sqSr1YR1lB6mziVhSWTLshDEEQz6yAlXE72KolA4mcS0TQNpL4UwaCrxbQBpN4NGFIjRFYWxXNeGgVw6g+cMDuNVRoxecm1XB8LxSVizi76zPWXHwF4DuGbZQuxBE5l0FuVSBZVyDSFiNP0AtmWJ6CVBCEGSUGGof1MUW8K51MnEoLkRuDlIVJeuUegLd8ZRJJxvmxZcl26RIZvDsh3EJp0kwG/6iIIQjmOhkC/g7LEpvMhvogGgG0BqlhGXu31Wc7AP4E2OBXPZQlTKZdRrdaTTGQRRiKDeRBhFYlWTqE3fTyI+BhoNimMrISYJogwmcrBAFqYpAQgFWkTyf3I7DbnAD+BaFny/Ia/RBYppYWeymJ6alnNSPDcKsbhUx3uiGMsTbDswY1hEQ2bRMasJ/FsD+FQhh2xbHtNTUzAtCynPQdAMhOMMw0K1QYPIJtWE46gnKUZTKU88F4YVKKKFO11LvecqfUpOtm1F7Fq9gUw6pTZJEMCylGFWJjhiKQlAd2vhooUYHxtHs1rB4dUmzokinCQyXhN2drHxrCUwl+uz2RRu9hz4PnWgjWwmI+K4WWvAMiGc7KYUUejKkDPL5SK8VAqu46JWqaKzowPlalXcIYpwbhLLNODYjiBdDCBmXBeVZgPdnZ2olMrI5XKYnpyCYcbwwxCNZgDbIZEjRGGIdDqFnJtGXC7jyloDaygRQglvzLpjlhJYIVb/YFjYUEihngAXJGRbgcCGL5ZzX3cnDNuAX/MRRD5y+RzqzQBh00cYhPAcG7brwHPSqJQrMD1TMGtHXKsqwtAQQ63erGL+/PmYni6Ki0SdLf4ybAEoSWQ/CNCggSUbLY2M5yEqlvA35RpeJlGrWUdbuaHZSWCxak2cZ8dodLaL7qWOFR8ziuDaJuZ35bGguw0dHQUMD40Bri0ECKMYQeSgWW+iGTRFnKfzBZDlg1oF3e3tiIIAuXQKU+UqotCAHzZhWAa6OrswNjmB0AQa9TqyuRzC2MLQ2Ah6uudgYHAAzboCSNKuI2J8wWQFn0aM7LME3p8dTuQAuLI9hzuMCPVaU7xL/tiGhbxr4qS1c9CRy8Bx0gjjCNV6HaVKA7aTQrFUR0/PHAwO7BGAgoRPp1w4QYRCLg3bNeEyt8O2MVmtib62TA/VUgmmbaMaNFBr1EUkB46HrXsYUKRqDkXXOoaCJt20g4vGpnAW0wSeKQQ2LBNxqKzRv+ZBu+XyXAb3u5boQK4f4UUu9MtOWInejInOzg7l6sASI2lyuox0KofRiSmk3JREgBYtWoLBgQF0d3QC9TJyGQ/VegNhownDzaBYraAZ+8ik0zD8EH4M1IMaQjMQsZuf043rf3k/BieVvibMSeub7lYml4I9Oo7/Est5dlJ4v0X0gSCwwLow8K5sGttznhhLFL1pz0N71sGZxy7D/N5OuC7BCBMdHV2il6emKxgdKyKfLyCd8lCcrqDRqIle7c4V0Jaxkc64iOIQU9NVlGsVpHNZVEoV8adpNQdhAFMo6GPlmjXYMbAbD/cP48Y/9GNquiSqwzZMOZ9W9WWlMk6XWPSzBH7yDC95U8CbMimMkiBBKG5KIZ9DVyrGJa84BXkRqw4i0xAMOuVlMD42hXLdFwy6Ld+G4vSUQI/1ShltuSwc00Am5Ykl3ghDFMtF9PT0CqSZyWbAiL5lG3A8G909HWgv5DBemsTdGx/Cj/7nQewcmhbghNEjAiLk4oXVMr7sU6I9QwhsObZkSPy1D+ZVfWDhAjwcNFGpVMSazaZSWDW3Ha85/RjM7Zkr7lFs0Lf1kUqlMF0sIzJMuG4KkdyjgTj0MTo0KO/TAm6US6KT2zoJe9ZhODZc15UfjWGnsyl0tnfASQHVSgUbH3wEP7jlLjwyWEYziBFHhlyfHHx0pYJPCIAyuwAOTZ/9FtEHisDkiHPzGaR7ejA+PoZsPgcjCnDiIYvxkpPWYl73HEWQdB61oCncPDw8LDClCuI7iKMAE3tHVOjQJQTpoF4qC+eZjqWiSo4tXMngBN0sy7TQ3dsFz3XQaJTFXdq+ux8//M0GbNiyF1PlBsD4bxAIxLmuWMRVgoY9Qwh8IHSwCDsDeFVbHnGGwXeG/IB8ysExK+fiBccehmULFsIU4rgCJ9LvHR0dRalYw+JlSxDW6hJ1Kk1OoVarwEtnRfROjY0jIAyZ9pDOZmEx+GBZ6J4zB11dXZLVQT3NoEYYVYWDy/U6rr/l9/j1PdsxVmkibDKtliIaOKHewEcJcszSxPj95mCTURW6C3/Fg/Aiwf5Xz+lE5NiiI7s6O5FxgXVL5uDM09ajp9AGJ+XBS2VQL9cFJ6bv6mULmDt/vhCS/m6lWMTwnt3It+WQLRSwd/eQhBkLHTmhyZzeOTA9D/OWLUK1XJbgP9HLKPJRr1QQxoGoiFs2bMStm7Zj845xcZeM0BR/+BXlIt74TNLBB4LASRkCLlk0H9Mm4Lke6o0qOnMprFvSi5c+73h0ZXICNxKNYmxXFt320N7XJxI0qtUxOjiMermEyvSUABm246BepmVdR6GzHY7rIpMvYN6SxYjNGA5DikETYaPBsAOqpaIYT/VmA7ff+wBu2rAJ2wbKKFd9xM0Qrufg3EoNbxIQZnYe+83BB0JEawK/89BVqJgmxicnkUm76Mx6OH71fJxx4jHI2y5Mg9mSBlwvgyCIkevoQCqfR7NZF5+ZmRjF4RHUytOib7PZHJqNJiYnJtDe04l8IY90Li9fZzsW3JQHk8BKqSIJQo16WbKim4GPex7ehls3PoJ7HxkA1TAT8zJeCu8bG8WJNPaeKUbWgSEwucHE/1rUB2NuH6rlEsrlaaxZtADrFnfjxKMOQ8owRTzTuDJMG4EfiSVM/d1s1CTaFEcxmvUa6jVmdjBCpIL2JGCusx2ZLCNOKt/G8lzZHG3tbQjqVTQJhoRVATvKtSoe2jWAux/sx+b+YezcO4mgFqPQnsOHdg3i8NnJvLMXi9aZTZfN7UGtbw78JiNIFSxqy+BVZ5yERXPnwAwZ33UQRAaafgNBrQE7jmCaFsJ6XVJ5aC07ro16vSbRJMl05OeaNXGPaPfS0JJiNNOC5XmCPzNiBITwjKYEPRhoGJ6cwO82PoJNu8ewacsACHamPBdf3zMkgf7Zlqrz/+wmHbDNSiy6bw52dLbDS1tIxw0cu7QPp6w/RvKxBkeKKFUbCA0Lw+PjyFgWOlIu2lIeOtMZZNpyyGSYJekIOkU5TKOIwEetUgIlURA2BTGj71zxI5QboSTadbQXkM9nYNSK6GzLwHEt1Bt1bN65C7/etAODEw1Uqz5K41O4vkgxPnuP/dbBB/JRbsxl8ZOVy+AHVSxtc/Dy5x6LTDaHR7bsxtBYEaVSGXvGJlFrBmjUGwjqDaxcuAhziER15bBo/hzMmd");

    // Mendapatkan ID pengguna saat ini
    // $userId = auth()->user()->id;
    // $userId = 'Jeffri';

    // // Membuat nama file yang unik
    // $filename = uniqid() . '.' . $file->getClientOriginalExtension();

    // // Menentukan path folder pengguna
    // $folderPath = 'public/shop_images/' . $userId;

    // // Membuat folder jika belum ada
    // Storage::makeDirectory($folderPath);

    // // // Menyimpan file ke dalam folder pengguna dengan menggunakan Storage Laravel
    // // $path = $file->storeAs('public/user_images/' . $userId, $filename);

    // // // Mendapatkan URL file yang tersimpan
    // // $url = Storage::url($path);

    // // // Melakukan sesuatu dengan URL file, seperti menyimpan ke database
    // // Checkbox::create([
    // //             'gambar' => $url
    // //         ]);

    // // Contoh lain:
    // // Menyimpan URL file ke dalam kolom gambar pada tabel User
    // // auth()->user()->update([
    // //     'gambar' => $url,
    // // ]);

    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    //     $file = $_FILES['file'];
    //     $targetDirectory = $folderPath; // Ganti dengan path direktori tujuan Anda
    //     $targetFile = $targetDirectory . basename($file['name']);
      
    //     // Periksa apakah file yang diunggah adalah gambar
    //     $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    //     $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    //     if (!in_array($fileType, $allowedExtensions)) {
    //       echo 'Hanya file gambar yang diizinkan!';
    //       exit;
    //     }
      
    //     // Pindahkan file ke folder tujuan
    //     if (move_uploaded_file($file['tmp_name'], $targetFile)) {

    //         Checkbox::create([
    //             'gambar' => $targetFile
    //         ]);
    //       echo 'File berhasil diunggah!';
    //     } else {
    //       echo 'Gagal mengunggah file.';
    //     }
    //   }

    // // Mengembalikan URL file sebagai respons
    // return response()->json(['url' => $url]);
        // Response berhasil
        return response()->json(['message' => $datanya]);
        // return status()->json(['message' => 'Data berhasil disimpan dari Controller']);
    }

    public function loadProduct(Request $request)
{
    // Ambil data pencarian dari request
    $search = $request->input('search','');

    // Lakukan query ke database dengan menggunakan pencarian
    $container_view = DB::select("call search_product_shop(?)", [$search]);

    // Mengatur jumlah item per halaman
    $perPage = 10;

    // Membuat objek Paginator dari hasil query
    $containers = new Paginator($container_view, count($container_view), $perPage);

    // Mengambil nomor halaman saat ini dari request
    $currentPage = $request->input('page', 1);

    // Mengambil hanya item yang sesuai dengan halaman saat ini
    $currentPageItems = $containers->forPage($currentPage, $perPage);

    // Mengubah item ke dalam bentuk array
    $currentPageItemsArray = json_decode(json_encode($currentPageItems), true);

    // Mengembalikan data dalam format yang sesuai dengan respons Ajax
    $hasil=response()->json([
        'data' => $currentPageItemsArray,
        'total' => $containers->count(),
        'per_page' => $perPage,
        'current_page' => $currentPage,
    ]);

    return view('upload_gambar')->with('containers', $currentPageItemsArray);
    // return $currentPageItemsArray;
}

public function loadProduct2(Request $request)
{
    // Ambil data pencarian dari request
    $search = $request->input('search','');
    if($search==''){
        $container_view = DB::select("call search_product_shop('')");
    }
    else{
        $container_view = DB::select("call search_product_shop(?)", [$search]);
    }

    // Lakukan query ke database dengan menggunakan pencarian
    

    // Mengatur jumlah item per halaman
    $perPage = 10;

    // Membuat objek Paginator dari hasil query
    $containers = new Paginator($container_view, count($container_view), $perPage);

    // Mengambil nomor halaman saat ini dari request
    $currentPage = $request->input('page', 1);

    // Mengambil hanya item yang sesuai dengan halaman saat ini
    $currentPageItems = $containers->forPage($currentPage, $perPage);

    // Mengubah item ke dalam bentuk array
    $currentPageItemsArray = json_decode(json_encode($currentPageItems), true);

    // Mengembalikan data dalam format yang sesuai dengan respons Ajax
    $hasil=response()->json([
        'data' => $currentPageItemsArray,
        'total' => $containers->count(),
        'per_page' => $perPage,
        'current_page' => $currentPage,
    ]);
    $data=array(
        'current_page' => $currentPage,
        'items' => $currentPageItemsArray,
        'total' => $containers->count(),
        'per_page' => $perPage,
    );
    // return view('upload_gambar')->with('containers', $currentPageItemsArray);
    // return $currentPageItemsArray;
    return $data;

}
}
