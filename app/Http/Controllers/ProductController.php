<?php

namespace App\Http\Controllers;

use App\Models\Checkbox;
use App\Models\Container;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class ProductController extends Controller
{
    //
    public function loadProduct2(Request $request)
{
    // Ambil data pencarian dari request
    $search = $request->input('search','');
    $stat=$request->input('stat','');
    if($search=='' && $stat==''){
        $container_view = DB::select("call search_product_shop('','',?)",[config('app.id_shop')]);
    }
    else if($search==''){
        $container_view = DB::select("call search_product_shop('',?,?)",[$stat,config('app.id_shop')]);
    }
    else if($stat==''){
        $container_view = DB::select("call search_product_shop(?,'',?)", [$search,config('app.id_shop')]);
    }
    else{
        $container_view = DB::select("call search_product_shop(?,?,?)", [$search,$stat,config('app.id_shop')]);
    }

    // Lakukan query ke database dengan menggunakan pencarian
    // $container_view = DB::select("call search_product_shop(?,?)", [$search,$stat]);

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
    public function loadProduct(Request $request)
    {
        if (request()->hasCookie('id_shop')) {
            // Cookie ditemukan
            // Lakukan tindakan yang diinginkan
            // Ambil data pencarian dari request
        $search = $request->input('search','');
        $stat=$request->input('stat','');
    
        // Lakukan query ke database dengan menggunakan pencarian
        $container_view = DB::select("call search_product_shop(?,?,?)", [$search,$stat, config('app.id_shop') ]);
    
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
    
        return view('products')->with(array('containers' => $currentPageItemsArray,'total' => $containers->count(),
        'per_page' => $perPage,
        'current_page' => $currentPage));
        // return $currentPageItemsArray;
        } else {
            // Cookie tidak ditemukana;
            // Lakukan tindakan yang diinginkan
            return view('signin')->withErrors(['login' => 'Login terlebih dahulu']);
        }
        
        
    
    }
public function loadProduct3(Request $request)
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

        return response()->$currentPageItemsArray;
    
}

    public function addproduct(){
        $categories = Category::whereRaw("substring(ID_CATEGORY,1,2)='CT'")->orderBy('NAME_CATEGORY', 'asc')->get();
        $categorieslain=Category::where('ID_CATEGORY','=','LLCT1')->get();
        return view('add-product',['categories'=> $categories,'categorieslain'=>$categorieslain]);
        
    }

    public function editproduct($idcontainer,$idproduct){
        $container = Container::where('ID_CONTAINER', '=', $idcontainer)->first();
        $subproducts=Product::where('ID_CONTAINER','=',$idcontainer)->get();
        if($idproduct=='0'){
            $idprod=$subproducts->first()->ID_PRODUCT;
        }
        else
        {
            $idprod=$idproduct;
        }
        $cekproduct=Product::where('ID_CONTAINER','=',$idcontainer)->where('ID_PRODUCT','=',$idprod)->count();

        $categories = Category::whereRaw("substring(ID_CATEGORY,1,2)='CT'")->orderBy('NAME_CATEGORY', 'asc')->get();
        $categorieslain=Category::where('ID_CATEGORY','=','LLCT1')->get();

        if($cekproduct>0){
            return view('edit-product',['categories'=> $categories,'categorieslain'=>$categorieslain,'subproducts'=>$subproducts, 'container'=>$container ,'idcontainer'=>$idcontainer,'idprod'=>$idprod]);
        }
        else{
            return view('404error');
        }
        
        
    }
    public function editproduct2($idcontainer)
    {
        $subproducts = Product::where('ID_CONTAINER', '=', $idcontainer)->get();
        $container = Container::where('ID_CONTAINER', '=', $idcontainer)->get();
        $categories = Category::whereRaw("substring(ID_CATEGORY,1,2)='CT'")->orderBy('NAME_CATEGORY', 'asc')->get();
        $categorieslain = Category::where('ID_CATEGORY', '=', 'LLCT1')->get();
    
        return view('add-subproduct', ['categories' => $categories, 'categorieslain' => $categorieslain, 'subproducts' => $subproducts, 'container'=>$container]);
    }

    function simpanGambar(Request $request) {
        $imageDataAll = $request->input('upImages');
    
     // Path folder tujuan gambar
     $folderPath = 'shop_images/'.'id_container2/';
    
     // // Membuat folder jika belum ada
     // Storage::makeDirectory($folderPath);
     // Cek apakah folder sudah ada sebelumnya
    if (!is_dir($folderPath)) {
     // Membuat folder
     if (mkdir($folderPath, 0775, true)) {
         echo "Folder berhasil dibuat: " . $folderPath;
     } else {
         echo "Gagal membuat folder: " . $folderPath;
     }
    } else {
     echo "Folder sudah ada: " . $folderPath;
    }
    
    foreach ($imageDataAll as $image) {
      $src = $image['src'];
      $nama = $image['nama'];
    
      // Decode base64 menjadi data biner gambar
      $image = base64_decode($src);
      // Generate nama file baru
      $timestamp = time();
      // $fileName = "gambar_$timestamp.png";
      $fileName = $nama;
      
    
    
     
      
      // Simpan gambar ke folder tujuan
      file_put_contents($folderPath . $fileName, $image);
    
    return redirect()->action(
            [ProductController::class, 'addproduct']
    );
}
}
public function simpanData(Request $request)
    {
        // Ambil data dari request
        $result = DB::select("SELECT fid_container('".config('app.id_shop')."') AS id");
        $id = $result[0]->id;
        $idcon=$id;
        $result2 = DB::select("SELECT fid_product('".$id."') AS id");
        $idprod = $result2[0]->id;
        $idsub=$idprod;
        $cat=$request->input('category');
        $name=$request->input('judul');
        $jenis=$request->input('jenis');
        // $image=$request->input('upImages');
        $desk = $request->input('desk');
        $harga=$request->input('harga');
        $qty=100;
        $addon = $request->input('addon');
        $status=$request->input('stat');
        $status_delete=0;
        $berat=$request->input('berat');
        $unit=$request->input('unit');

        //Gambar
        $imageDataAll = $request->input('upImages');
        $imageDataAllS3 = $request->file('upImages');
    
     // Path folder tujuan gambar
     $folderPath = 'shop_images/'.$idcon.'/';
    
     // // Membuat folder jika belum ada
     // Storage::makeDirectory($folderPath);
     // Cek apakah folder sudah ada sebelumnya
    if (!is_dir($folderPath)) {
     // Membuat folder
     if (mkdir($folderPath, 0775, true)) {
         echo "Folder berhasil dibuat: " . $folderPath;
     } else {
         echo "Gagal membuat folder: " . $folderPath;
     }
    } else {
     echo "Folder sudah ada: " . $folderPath;
    }
    $imageku=[];
    foreach ($imageDataAll as $image) {
      $src = $image['src'];
      $nama = $image['nama'];
        array_push($imageku,$nama);
      // Decode base64 menjadi data biner gambar
      $image = base64_decode($src);
      // Generate nama file baru
      $timestamp = time();
      // $fileName = "gambar_$timestamp.png";
      $fileName = $nama;
      // Simpan gambar ke folder tujuan
      file_put_contents($folderPath . $fileName, $image);
       

    }
    
    

    $imageku=json_encode($imageku);

        // Lakukan penyimpanan data ke database atau tindakan lainnya sesuai kebutuhan

        // Contoh: Menyimpan data ke database
        // $data = [
        //     'ID_CONTAINER' => $idcon,
        //     'ID_PRODUCT' => $idsub,
        //     'PRODUCT_NAME' => $name,
        //     'JENIS' => $jenis,
        //     'IMAGE' => $imageku,
        //     'DESC_PRODUCT' => $desk,
        //     'PRICE_PRODUCT' => $harga,
        //     'QTY_PRODUCT' => $qty,
        //     'TAMBAHAN' => $addon,
        //     'STATUS' => $status,
        //     'STATUS_DELETE' => $status_delete,
        //     'BERAT' => $berat,
        //     'UNIT' => $unit,
        //     // tambahkan kolom dan nilainya sesuai kebutuhan
        // ];
        // $data2 = [
        //     'PRODUCT_NAME' => $name
        // ];

            $cont=new Container();
            $cont['ID_CONTAINER'] = $idcon;
            $cont['ID_SHOP'] = config('app.id_shop');
            $cont['ID_CATEGORY'] = $cat;
            $cont['TAMBAHAN_SAMA'] = 1;
            $cont['STATUS'] = '1';
            $cont['STATUS_DELETE'] = '0';
           
            
            $cont->save();

            $prod=new Product();
            $prod['ID_CONTAINER'] = $idcon;
            $prod['ID_PRODUCT'] = $idsub;
            $prod['PRODUCT_NAME'] = $name;
            $prod['JENIS'] = $jenis;
            $prod['IMAGE'] = $imageku;
            $prod['DESC_PRODUCT'] = $desk;
            $prod['PRICE_PRODUCT'] = $harga;
            $prod['QTY_PRODUCT'] = $qty;
            $prod['TAMBAHAN'] = $addon;
            $prod['STATUS'] = $status;
            $prod['STATUS_DELETE'] = $status_delete;
            $prod['BERAT'] = $berat;
            $prod['UNIT'] = $unit;
            
            $prod->save();

            // Product::create($data2);
            // return response()->json(['message' => $data2]);
        // return error($data);
    }

    public function uploadgambaraws(Request $request ){

        $imageDataAllS3 = $request->file('image');
        $s3 = new S3Client([
            'region' => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAWDTHEB3NX46GZ4IS',
                'secret' => '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',
            ],
        ]);
        $bucket = 'cetakno';
        $folderPath2 = 'product-images/';
    
        try {
            $s3->putObject([
                'Bucket' => $bucket,
                'Key' => $folderPath2,
                'Body' => '',
            ]);
            echo "Folder created successfully.";
        } catch (AwsException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        // foreach ($imageDataAll as $image) {
        //     $image->storeAs('cetakno/'.$idcon,$image->nama);
    
        // }
        
        foreach ($imageDataAllS3 as $image) {
            $folderPath = 'cetakno/product-images';
            echo 'console.log('.$folderPath.')';
            $filePath = $image->storeAs($folderPath, $image->nama);
        }
    }

    public function simpanData2(Request $request)
    {
        // Ambil data dari request
        $name=$request->input('judul');

        // Lakukan penyimpanan data ke database atau tindakan lainnya sesuai kebutuhan

        // Contoh: Menyimpan data ke database
            $prod=new Product();
            $prod['PRODUCT_NAME']=$name;
            $prod->save();
            // Checkbox::create([
            //     'name' => '$name'
            // ]);
        
    }

    public function addsub(Request $request){
           // Ambil data dari request

        // $idcon=$request->input('idcon');
        // $isiprod=Product::where('ID_CONTAINER',$idcon)->first();   
        // $result2 = DB::select("SELECT fid_product('".$idcon."') AS id");
        // $idprod = $result2[0]->id;
        // $idsub=$idprod;
        // $name=$isiprod->PRODUCT_NAME;
        // $jenis='...';
        // $image=$isiprod->IMAGE;
        // $desk = $isiprod->DESC_PRODUCT;
        // $harga='';
        // $qty=100;
        // $addon = $isiprod->TAMBAHAN;
        // $status=3;
        // $status_delete=0;
        // $berat=$request->$isiprod->berat;
        // $unit=$request->$isiprod->unit;
        $idcon = $request->input('idcon');
        $isiprod = Product::where('ID_CONTAINER', $idcon)->first();
        $result2 = DB::select("SELECT fid_product('" . $idcon . "') AS id");
        $idprod = $result2[0]->id;
        $idsub = $idprod;
        $name = $isiprod->PRODUCT_NAME ?? '';
        $jenis = '...';
        $image = $isiprod->IMAGE ?? '';
        $desk = $isiprod->DESC_PRODUCT ?? '';
        $harga = '';
        $qty = 100;
        $addon = $isiprod->TAMBAHAN ?? '';
        $status = 3;
        $status_delete = 0;
        $berat = $isiprod->berat ?? '';
        $unit = $isiprod->unit ?? '';

    $data = [
        'ID_CONTAINER' => $idcon,
        'ID_PRODUCT'=> $idsub,
        'PRODUCT_NAME' => $name,
        'JENIS' => $jenis,
        'IMAGE' => $image,
        'DESC_PRODUCT' => $desk,
        'PRICE_PRODUCT' =>  $harga,
        'QTY_PRODUCT' => $qty,
        'TAMBAHAN' => $addon,
        'STATUS' => $status,
        'STATUS_DELETE' => $status_delete,
        'BERAT' => $berat,
        'UNIT' => $unit,

    ];
        Product::create($data);
            // return response()->json(['message' => 'berhasil membuat subProduct']);

            // return redirect()-> route('edit-product', ['id' => $idcon,'i'=>$idsub]);
            return response()->json(['redirect' => route('edit-product', ['id' => $idcon,'i'=>$idsub])]);
            // return  route('loadproduct');
            // redirect()->route('edit-product', ['id' => $idcon, 'i' => $idsub]);
           

    }
    

    public function updateData(Request $request)
    {
        // Ambil data dari request
        $idcon=$request->input('idcon');
        $idsub=$request->input('idpro');
        $name=$request->input('judul');
        $jenis=$request->input('jenis');
        // $image=$request->input('upImages');
        $desk = $request->input('desk');
        $harga=$request->input('harga');
        $qty=100;
        $addon = $request->input('addon');
        $status=$request->input('stat');
        $status_delete=0;
        $berat=$request->input('berat');
        $unit=$request->input('unit');

        //Gambar
        $imageDataAll = $request->input('upImages');
        $imageDataLama = $request->input('gambarlama');
    $imageku=[];
   if($imageDataLama!=''){
    foreach ($imageDataLama as $imagenama) {
        array_push($imageku,$imagenama);
    }
    
   }
   $folderPath = 'shop_images/'.$idcon.'/';
   if($imageDataAll!=''){
    foreach ($imageDataAll as $image) {
      
      $src = $image['src'];
      $nama = $image['nama'];
        array_push($imageku,$nama);
      // Decode base64 menjadi data biner gambar
      $image = base64_decode($src);
      // Generate nama file baru
      $timestamp = time();
      // $fileName = "gambar_$timestamp.png";
      $fileName = $nama;
      // Simpan gambar ke folder tujuan
      file_put_contents($folderPath . $fileName, $image);
      
    }
}
    $data = [
        'PRODUCT_NAME' => $name,
        'JENIS' => $jenis,
        'IMAGE' => $imageku,
        'DESC_PRODUCT' => $desk,
        'PRICE_PRODUCT' =>  $harga,
        'QTY_PRODUCT' => $qty,
        'TAMBAHAN' => $addon,
        'STATUS' => $status,
        'STATUS_DELETE' => $status_delete,
        'BERAT' => $berat,
        'UNIT' => $unit,

    ];
            $prod=Product::where('ID_CONTAINER', $idcon)->where('ID_PRODUCT',$idsub);
            $prod->update($data);
            
            return response()->json(['message' => 'Data berhasil diperbarui']);

            // Product::create($data2);
            // return response()->json(['message' => $data2]);
        // return error($data);
    }
}
