@php
    $activePage = 'products'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')

@section('main-content')

    <!-- main -->
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Products</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ route('add-product') }}" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6 ">
                            <div class="row justify-content-between">
                                <!-- form -->
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                    <form class="d-flex" role="search">
                                        <input class="form-control" id='searchBox' type="search" placeholder="Search Products"
                                            aria-label="Search">
                                    </form>
                                </div>
                                <!-- select option -->
                                <div class="col-lg-2 col-md-4 col-12">
                                    <select id='statusSelect'  class="form-select">
                                        <option selected value="">Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Deactive</option>
                                        <option value="3">Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll">
                                                    <label class="form-check-label" for="checkAll">

                                                    </label>
                                                </div>
                                            </th>
                                            <th>Image</th>
                                            <th>Proudct Name</th>
                                            {{-- <th>Buy</th> --}}
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Sub Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <div id='ubahpage'>
                                        <tbody id='ubahpage2'>
                                            @if (isset($containers))
                                                @php
                                                    // $containersdecode=json_decode($containers);
                                                @endphp
                                                @foreach ($containers as $container)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="productOne">
                                                                <label class="form-check-label" for="productOne">
                            
                                                                </label>
                                                            </div>
                                                        </td>
                                                        {{--                           
                                  <td>{{ $counter+=1 }}</td>
                                  <td>{{ $container->ID_PRODUCT }}</td>
                                  <td>{{ $container->ID_CONTAINER }}</td> --}}
                                                        {{-- <td>
                                                            @if (!empty($container['gambar']) && is_array(json_decode($container['gambar'])))
                                                                <a href="{{ route('edit-product', ['id' => $container['container'], 'i' => 0]) }}">
                                                                    <img src="{{ asset('shop_images/'.$container['container'].'/'.reset($container['gambar'])) }}"
                                                                        alt="" class="icon-shape icon-md">
                                                                </a>
                                                            @endif
                                                        </td> --}}

                                                        <td>
                                                            @if (!empty(json_decode($container['gambar'])))
                                                                <a href="{{ route('edit-product', ['id' => $container['container'], 'i' => 0]) }}">
                                                                    <img src="{{ asset('shop_images/'.$container['container'].'/'.json_decode($container['gambar'])[0]) }}"
                                                                        alt="" class="icon-shape icon-md">
                                                                </a>
                                                        @endif
                                                        @if (empty(json_decode($container['gambar'])))
                                                        <a href="{{ route('edit-product', ['id' => $container['container'], 'i' => 0]) }}">
                                                            <img src="{{ asset('shop_images/no image.jpg') }}"
                                                                alt="" class="icon-shape icon-md">
                                                        </a>
                                                        @endif
                                                        </td>
                                                        @php
                                                            // $product = $container->products->first();
                                                            // $category = $container->categories;
                                                            
                                                            // if ($product) {
                                                            //     $productName = $product->PRODUCT_NAME;
                                                            // }
                                                            // if ($category) {
                                                            //     $categoryName = $category->NAME_CATEGORY;
                                                            // }
                            
                                                                $productName = $container['nama'];
                                                                $categoryName = $container['cat'];
                                                            
                                                        @endphp
                                                        <td><a href="" class="text-reset">{{ $productName }}</a></td>
                                                        {{-- <td>
                                                               
                                                            <div class="modal fade modal-lg" id="exampleModalToggleni" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h2 class="modal-title" id="exampleModalToggleLabel">Order</h2>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                   
                                                                      <div>
                                                                     
                                                                        <form id="addonForm">
                                                                          <div id="addonContainer">
                                                                            <!-- Tampilkan addon berdasarkan data -->
                                                                            <!-- Looping melalui data addon -->
                                                                            <!-- Jika jenis addon adalah "Checkbox" -->
                                                                            <!-- Tampilkan checkbox untuk setiap keterangan addon -->
                                                                            <!-- Checkbox akan memiliki nilai harga yang terkait -->
                                                                            <!-- Jika jenis addon adalah "Radio-Button" -->
                                                                            <!-- Tampilkan radio button untuk setiap keterangan addon -->
                                                                            <!-- Radio button akan memiliki nilai harga yang terkait -->
                                                                            <!-- Setiap addon akan memiliki input hidden untuk mengirim nilai yang dipilih ke server -->
                                                                            
                                                                          </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <span id="totalHarga">Total Addon: Rp </span>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggleni2" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade modal-lg" id="exampleModalToggleni2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h2 class="modal-title" id="exampleModalToggleLabel2">Order Detail</h2>
                                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <span id="totalHarga"></span>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      <button class="btn btn-primary" data-bs-target="#exampleModalToggleni" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                                                                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Add to Cart</button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="btn btn-primary" data-bs-toggle="modal"   data-bs-target="#exampleModalToggleni" role="button">Add to Cart</a>
                                                        </td> --}}
                                                        <td>{{ $categoryName }}</td>
                            
                                                        <td>
                                                            <span class="badge  {{$container['status']== 1 ? 'bg-light-primary text-dark-primary': ($container['status']== 2 ? 'bg-light-danger text-dark-danger' :'bg-light-warning text-dark-warning')}} ">{{$container['status']== 1 ? 'Active': ($container['status']== 2 ? 'Deactive' : 'Draft')}}</span>
                                                        </td>
                                                        <td>{{ 'Rp ' . $container['harga']}}</td>
                                                        {{-- number_format($container['harga'], 0, ',', '.') --}}
                                                        <td>{{$container['subproduct']}}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="feather-icon icon-more-vertical fs-5"></i>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"><i
                                                                                class="bi bi-trash me-3"></i>Delete</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('edit-product', ['id' => $container['container'],'i'=>'0']) }}">
                                                                        <i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                            
                            
                            
                            
                            
                                        </tbody>
                                    </div>
                                </table>

                            </div>
                        </div>
                        {{-- @php
                            $current_page=1;
                        @endphp --}}
                        <div class=" border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                            <span id='ubahShow'>Showing {{count($containers)<1? 0 :(($current_page-1)*($per_page) +1)}} to {{($current_page*($per_page)<$total?$current_page*($per_page):$total)}} of {{$total}} entries</span>
         
                            <nav aria-label="Page navigation example" id="paginationUbah2" class="mt-2 mt-md-0">
                                <ul class="pagination mb-0" id="paginationUbah">
                                  <li class="page-item disabled">
                                    <a class="page-link"  tabindex="-1" aria-disabled="true">Previous</a>
                                  </li>
                                  @php
                                     for ($pageng = 1; $pageng <= ceil($total / $per_page); $pageng++) {
                                            echo '<li class="page-item' . ($current_page == $pageng ? " active" : '') . '"><a class="page-link paging" name="page" value="' . $pageng . '">' . $pageng . '</a></li>';
                                        }
                                  @endphp
                                  
                                  <li class="page-item {{($current_page >= ceil($total / $per_page)? " disabled" : '')}}" >
                                    <a class="page-link" >Next</a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                        
                       
                       

                    </div>

                </div>

            </div>
        </div>
    </main>

    </div>

    <script>
//  var userDataFromDatabase = JSON.parse('[{"jenis":"Checkbox","judul":"HAHAHAHH","keterangan":["a1"],"harga":["100"]},{"jenis":"Radio-Button","judul":"HIHHIHI","keterangan":["b1","b2"],"harga":["222","222"]}]');
//         // Mendapatkan referensi elemen container addon
//   var addonContainer = document.getElementById('addonContainer');

//   for(var o=0;o<5;o++){

  
// // Loop melalui data addon
// for (var i = 0; i < userDataFromDatabase.length; i++) {
//   var addon = userDataFromDatabase[i];
//   var addonHtml = '';

//   // Jika jenis addon adalah "Checkbox"
//   if (addon.jenis === 'Checkbox') {
//   addonHtml += '<h5>' + addon.judul + '</h5>';

//   // Loop melalui keterangan addon
//   for (var j = 0; j < addon.keterangan.length; j++) {
//     var keterangan = addon.keterangan[j];
//     var harga = addon.harga[j];
//     var inputId = 'addon_' + i + '_' + j;

//     addonHtml += '<div class="d-flex justify-content-between">';
//         addonHtml+='<div>';
//     addonHtml += '<input class="form-check-input" required type="checkbox" id="' + inputId + '" name="addon_' + i + '[]" value="' + keterangan + ':' + harga + '">';
//     addonHtml += '<label class="form-check-label px-2" for="' + inputId + '">' + keterangan + '</label>';
//         addonHtml+='</div>';
//     addonHtml += '<span>Rp ' + harga + '</span>';
//     addonHtml += '</div>';
//   }
// }

// // Jika jenis addon adalah "Radio-Button"
// else if (addon.jenis === 'Radio-Button') {
//   addonHtml += '<h5>' + addon.judul + '</h5>';

//   // Loop melalui keterangan addon
//   for (var j = 0; j < addon.keterangan.length; j++) {
//     var keterangan = addon.keterangan[j];
//     var harga = addon.harga[j];
//     var inputId = 'addon_' + i + '_' + j;

//     addonHtml += '<div class="d-flex justify-content-between">';
//         addonHtml+='<div>';
//     addonHtml += '<input class="form-check-input" required type="radio" id="' + inputId + '" name="addon_' + i + '" value="' + keterangan + ':' + harga + '">';
//     addonHtml += '<label class="form-check-label px-2" for="' + inputId + '">' + keterangan + '</label>';
//         addonHtml+='</div>';
//     addonHtml += '<span>Rp ' + harga + '</span>';
//     addonHtml += '</div>';
//   }
// }

//     addonHtml+='<br>';
//   // Tambahkan addon ke dalam container
//   addonContainer.innerHTML += addonHtml;
// }
//   }
// // event check-radio
// // Mengambil semua elemen input checkbox dan radio button di dalam modal
// var inputElements = document.querySelectorAll('#exampleModalToggleni input[type="checkbox"], #exampleModalToggleni input[type="radio"]');

// // Mendefinisikan fungsi untuk menghitung total harga
// function hitungTotalHarga() {
//   var totalHarga = 0;

//   // Loop melalui setiap elemen input
//   inputElements.forEach(function (element) {
//     if (element.checked) {
//       // Mendapatkan harga dari atribut value
//       var harga = parseFloat(element.value.split(':')[1]);
      
//       // Menambahkan harga ke total harga
//       totalHarga += harga;
//     }
//   });

//   // Menampilkan total harga
//   var totalHargaElement = document.getElementById('totalHarga');
//   totalHargaElement.textContent = 'Total Addon: Rp ' + totalHarga;
//   totalHargaElement.innerHTML = 'Total Addon: Rp ' + totalHarga;
// }

// // Menambahkan event listener untuk setiap elemen input
// inputElements.forEach(function (element) {
//   element.addEventListener('change', hitungTotalHarga);
// });



// Submit form
// document.getElementById('addonForm').addEventListener('submit', function(event) {
//   event.preventDefault();
//   var form = event.target;
//   var formData = new FormData(form);

//   // Lakukan sesuatu dengan data yang dikirim ke server
//   // Contoh: ambil nilai addon yang dipilih
//   for (var pair of formData.entries()) {
//     console.log(pair[0] + ': ' + pair[1]);
//   }
// });
        
  function loadPage(url) {
    // Menggunakan Ajax untuk memuat konten halaman baru secara dinamis
    // dengan menggunakan URL yang diberikan.

    // Buat objek XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Atur fungsi callback saat permintaan selesai
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Tangkap konten halaman baru dari respons
        var newContent = xhr.responseText;

        // Update elemen HTML yang diinginkan dengan konten halaman baru
        var targetElement = document.getElementById('content');
        targetElement.innerHTML = newContent;
      } else {
        console.error('Error:', xhr.status);
      }
    };

    // Buat permintaan GET ke URL yang diberikan
    xhr.open('GET', url);
    xhr.send();
  }

    </script>

<!-- PAGINATION -->
<script>
    $statvalue='';
    $(document).ready(function() {
        var searchtext=''
        var selectedValue=''
        $(document).on('change', '#statusSelect', function(event){
        selectedValue = $(this).val();
        console.log(selectedValue);
        console.log($('#statusSelect').val());
        $statvalue=$('#statusSelect').val();
        console.log($statvalue);

        // $searchnya=$('#statusSelect').val()
        _token: '{{ csrf_token() }}' // Menambahkan token CSRF
      $.ajax({
        // url: "{{route('coba_pagination3')}}",
        url: "{{route('coba_pagination3')}}",
        type: 'GET',
        data: { page: 1 ,search:searchtext,stat:selectedValue},
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Mengatur header CSRF token
                },
        success: function(response) {
          console.log('pagination');
          console.log(response.length);
          console.log(response['items']);
          $current_page=response['current_page'];
          $('#ubahpage').empty();
          $current_page=response['current_page'];
          $total=response['total'];
          $per_page=response['per_page'];
          loadproductpagination(response['items']);
          $('#ubahShow').text('Showing ' + (response['items'].length<1? 0 :(($current_page-1)*($per_page) +1)) +' to ' + ($current_page*($per_page)<$total?$current_page*($per_page):$total) +' of ' +$total+ ' entries');
        
        //   $('#ubahpage2').text(JSON.stringify(response));
    
          // Ambil referensi ke elemen div dengan ID 'ubahpage'
    // var divElement = document.getElementById('ubahpage');
    var divElement = $('#ubahpage');
    
    // Buat elemen tbody baru
    var tbodyElement = document.createElement('tbody');
    // while (divElement.firstChild) {
    //     divElement.removeChild(divElement.firstChild);
    // }
    
    // Loop melalui data response dan buat elemen <tr> untuk setiap data
     
       
    
       
            },
            error: function(xhr, status, error) {
            console.error('Terjadi kesalahan saat pagination:', error);
            }
        });



        // Lakukan tindakan atau panggil fungsi lain dengan selectedValue sebagai parameter
    });
    $statvalue='';
    $(document).on('input', '#searchBox', function(event) {
    $searchnya= event.target.value;
    searchtext=$searchnya;
    console.log($searchnya);
    $statvalue = 'duh ga isa ia';
  console.log('coba selected value: ' + $statvalue);
// Mengambil nilai yang dipilih
// var selectedValue = $(this).find('#statusSelect').attr('value');
// $('#statusSelect').val()

// Menampilkan nilai yang dipilih

console.log('selected value:'.selectedValue);
// console.log('Select value nya :'.$('#statusSelect').val());
  _token: '{{ csrf_token() }}' // Menambahkan token CSRF
      $.ajax({
        url: "{{route('coba_pagination3')}}",
        type: 'GET',
        data: { page: 1 ,search:$searchnya,stat:selectedValue},
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Mengatur header CSRF token
                },
        success: function(response) {
          console.log('pagination');
          console.log(response.length);
          console.log(response['items']);
          $current_page=response['current_page'];
          $('#ubahpage').empty();
          $current_page=response['current_page'];
          $total=response['total'];
          $per_page=response['per_page'];
          loadproductpagination(response['items']);
          $('#ubahShow').text('Showing ' + (response['items'].length<1? 0 :(($current_page-1)*($per_page) +1)) +' to ' + ($current_page*($per_page)<$total?$current_page*($per_page):$total) +' of ' +$total+ ' entries');
        
        //   $('#ubahpage2').text(JSON.stringify(response));
    
          // Ambil referensi ke elemen div dengan ID 'ubahpage'
    // var divElement = document.getElementById('ubahpage');
    var divElement = $('#ubahpage');
    
    // Buat elemen tbody baru
    var tbodyElement = document.createElement('tbody');
    // while (divElement.firstChild) {
    //     divElement.removeChild(divElement.firstChild);
    // }
    
    // Loop melalui data response dan buat elemen <tr> untuk setiap data
     
       
    
       
            },
            error: function(xhr, status, error) {
            console.error('Terjadi kesalahan saat pagination:', error);
            }
        });

        

});
       
    //     $('.page-item').click(function() {
    //     var value = $(this).find('.paging').attr('value');
    //     console.log(value); // Menampilkan nilai value ke konsol
    //   });
    
    // var pagination=$('.page-link');
    // $(document).on('click', '.page-item', function()
    // $searchnya='';
    // $('.page-item').on('click', function() 
    $(document).on('click', '.page-item', function(){
        
        var selectElement = document.getElementById("statusSelect");

// Mengambil nilai yang dipilih

// Menampilkan nilai yang dipilih
console.log('selected value:'.selectedValue);

        var loadkah=true;
        if($(this).find('.paging').attr('value')=='-1'){
            var value = $current_page-1;
            console.log('value'.value);
            if(value<1){
                value=1;
                loadkah=false;
            }
        }
        else if($(this).find('.paging').attr('value')=='+1'){
            var value = parseInt($current_page) + 1;
            console.log('value'.value);
            console.log(Math.ceil($total / $per_page));
            if(value>Math.ceil($total / $per_page)){
                value=Math.ceil($total/$per_page);
                loadkah=false;
                console.log('gak ngeload');
            }
        }
        else{
            var value = $(this).find('.paging').attr('value');
        }
        
        if (loadkah){
        // var value = $(this).find('a').attr('value');
      // Kode yang akan dieksekusi saat event terjadi
      console.log('Tombol diklik!');
    //   console.log($(this).val());
    console.log(value);
      _token: '{{ csrf_token() }}' // Menambahkan token CSRF
      $.ajax({
        url: "{{route('coba_pagination3')}}",
        type: 'GET',
        data: { page: value ,search:searchtext ,stat:selectedValue},
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Mengatur header CSRF token
                },
        success: function(response) {
          console.log('pagination');
          console.log(response['items']);
          $current_page=response['current_page'];
          $('#ubahpage').empty();
          $current_page=response['current_page'];
          $total=response['total'];
          $per_page=response['per_page'];
          console.log('response items:'+response['items']);
          loadproductpagination(response['items']);
          $('#ubahShow').text('Showing ' + (($current_page-1)*($per_page) +1) +' to ' + ($current_page*($per_page)<$total?$current_page*($per_page):$total) +' of ' +$total+ ' entries');
        
        //   $('#ubahpage2').text(JSON.stringify(response));
    
          // Ambil referensi ke elemen div dengan ID 'ubahpage'
    // var divElement = document.getElementById('ubahpage');
    var divElement = $('#ubahpage');
    
    // Buat elemen tbody baru
    var tbodyElement = document.createElement('tbody');
    // while (divElement.firstChild) {
    //     divElement.removeChild(divElement.firstChild);
    // }
    
    // Loop melalui data response dan buat elemen <tr> untuk setiap data
     
       
    
       
            },
            error: function(xhr, status, error) {
            console.error('Terjadi kesalahan saat pagination:', error);
            }
        });
        }
    });
    
    
    });
    
    function loadproductpagination(res){
            var divElement = $('#ubahpage2');
            divElement.innerHTML="";
            var tbodyElement = document.createElement('tbody');
            $('#ubahpage').empty();
            divElement.empty();
            var loadbaru="";
            $containers=res;
            console.log('ini res :'.res);
            console.log(res);
            console.log($containers);
            for (var key in res) {
                loadbaru=$(
                    '@if (isset($containers))'+
                        '@php'+
                        '@endphp'+
                        '@foreach ($containers as $container)'+
                            '<tr>'+
                                '<td>'+
                                   ' <div class="form-check">'+
                                        '<input class="form-check-input" type="checkbox" value=""'+
                                            'id="productOne">'+
                                        '<label class="form-check-label" for="productOne">'+
    
                                       ' </label>'+
                                   ' </div>'+
                               ' </td>'+
                                
                                   ' <a href="#!"> <img src="images/product cetak/1.jpg"'+
                                            'alt="" class="icon-shape icon-md"></a>'+
                                '</td>'+
                                '@php'+
                                    // $product = $container->products->first();
                                    // $category = $container->categories;
                                    
                                    // if ($product) {
                                    //     $productName = $product->PRODUCT_NAME;
                                    // }
                                    // if ($category) {
                                    //     $categoryName = $category->NAME_CATEGORY;
                                    // }
    
                                        "$productName = $container['nama'];"+
                                       " $categoryName = $container['cat'];"+
                                    
                                '@endphp'+
                                '<td><a href="#" class="text-reset">{{ $productName }}</a></td>'+
                                '<td>{{ $categoryName }}</td>'+
    
                                '<td>'+
                                   "<span class='badge  {{$container['status']== 1 ? 'bg-light-primary text-dark-primary': ($container['status']== 2 ? 'bg-light-danger text-dark-danger' :'bg-light-warning text-dark-warning')}} ''>{{$container['status']== 1 ? 'Active': ($container['status']== 2 ? 'Deactive' : 'Draft')}}</span>"+
                                '</td>'+
                                "<td>{{ 'Rp ' . number_format($container['harga'], 0, ',', '.')}}</td>"+
                                "<td>{{$container['subproduct']}}</td>"+
                                '<td>'+
                                   ' <div class="dropdown">'+
                                       ' <a href="#" class="text-reset" data-bs-toggle="dropdown"'+
                                            'aria-expanded="false">'+
                                            '<i class="feather-icon icon-more-vertical fs-5"></i>'+
                                        '</a>'+
                                        '<ul class="dropdown-menu">'+
                                            '<li><a class="dropdown-item" href="#"><i'+
                                                       ' class="bi bi-trash me-3"></i>Delete</a></li>'+
                                                       '<li><a class="dropdown-item" href="{{ route("edit-product", ["id" => $container["container"], "i" => "0"]) }}">'+
                                                        '<i class="bi bi-pencil-square me-3 "></i>Edit</a>'+
                                           ' </li>'+
                                       ' </ul>'+
                                   ' </div>'+
                                '</td>'+
                           ' </tr>'+
                        '@endforeach'+
                   ' @endif'
                ); 
            }
                
    //             Object.keys(res).forEach(function(key) {
    //   var item = res[key];
    //   console.log(item);
    //   var trElement = $('<tr></tr>'); // Membuat elemen <tr> baru
      
    //   // Membuat elemen-elemen <td> dengan konten sesuai data
    //   var containerTd = $('<td></td>').text(item.container);
    //   var catTd = $('<td></td>').text(item.cat);
    //   var productTd = $('<td></td>').text(item.product);
    //   var namaTd = $('<td></td>').text(item.nama);
    //   var gambarTd = $('<td></td>').text(item.gambar);
      
    //   // Menambahkan elemen-elemen <td> ke dalam elemen <tr>
    //   trElement.append(containerTd, catTd, productTd, namaTd, gambarTd);
      
    //   // Menambahkan elemen <tr> ke dalam elemen <tbody>
    //   $('#ubahpage2').append(trElement);
    // });
                var counter = 0;
                $('#ubahpage2').innerHTML='';
                for (var key in res) {
                
                var item = res[key];
                console.log(item);
                var trElement = $('<tr></tr>'); // Membuat elemen <tr> baru
                
                // Membuat elemen-elemen <td> dengan konten sesuai data
                    var checkbox=$('<td></td>').append(
                $('<div></div>').addClass('form-check').append(
                    $('<input></input>').addClass('form-check-input').attr('type', 'checkbox').attr('value', '').attr('id', 'productOne'),
                    $('<label></label>').addClass('form-check-label').attr('for', 'productOne')
                )
                );
                // if(item.gambar.length > 0){
                //                     var domain = window.location.origin;
                // var href = `${domain}/edit-product/${item.container}/0`;

                var imageData = JSON.parse(item.gambar);
if (imageData && imageData.length > 0) {
    var imageUrl = "{{ asset('shop_images') }}/" + item.container + "/" + imageData[0];
    var image = $('<td></td>').append(
        $('<a></a>').attr('href', href).append(
            $('<img></img>').attr('src', imageUrl).addClass('icon-shape icon-md').attr('alt', '')
        )
    );
}

                // var image = $('<td></td>').append(
                //     $('<a></a>').attr('href', href).append(
                //         $('<img></img>').attr('src', "asset('shop_images/' + item.container + '/' + json_decode(item.gambar)[0])").addClass('icon-shape icon-md').attr('alt', '')
                //         )
                // );
                //     var image=$('<td></td>').append(
                // $('<a></a>').attr('href', "'".route('edit-product', ['id' => item.container, 'i' => 0])."'" ).append(
                //     $('<img></img>').attr('src', asset('shop_images/'.item.container.'/'.json_decode(item.gambar)[0])).addClass('icon-shape icon-md').attr('alt', '')
                // )
                // );
                
                
                else {
                    var image=$('<td></td>').append(
                $('<a></a>').attr('href', '#').append(
                    $('<img></img>').attr('src', "asset('shop_images/no image.jpg')" ).addClass('icon-shape icon-md').attr('alt', '')
                )
                );
                }
                // var image=$('<td></td>').append(
                // $('<a></a>').attr('href', '#').append(
                //     $('<img></img>').attr('src', 'images/product cetak/1.jpg').addClass('icon-shape icon-md').attr('alt', '')
                // )
                // );
                // <td>
                //                                             @if (!empty(json_decode($container['gambar'])))
                //                                                 <a href="{{ route('edit-product', ['id' => $container['container'], 'i' => 0]) }}">
                //                                                     <img src="{{ asset('shop_images/'.$container['container'].'/'.json_decode($container['gambar'])[0]) }}"
                //                                                         alt="" class="icon-shape icon-md">
                //                                                 </a>
                //                                         @endif
                //                                         @if (empty(json_decode($container['gambar'])))
                //                                         <a href="{{ route('edit-product', ['id' => $container['container'], 'i' => 0]) }}">
                //                                             <img src="{{ asset('shop_images/no image.jpg') }}"
                //                                                 alt="" class="icon-shape icon-md">
                //                                         </a>
                //                                         @endif
                //                                         </td>
    
                var name = $('<td></td>').append(
                $('<a></a>').attr('href', '#').addClass('text-reset').text(item.nama)
                );
                var cat = $('<td></td>').text(item.cat);
                var status = $('<td></td>').append(
                $('<span></span>').addClass('badge')
                    .addClass(item.status == 1 ? 'bg-light-primary text-dark-primary' : (item.status == 2 ? 'bg-light-danger text-dark-danger' : 'bg-light-warning text-dark-warning'))
                    .text(item.status == 1 ? 'Active' : (item.status == 2 ? 'Deactive' : 'Draft'))
                );
                // var options = { style: 'currency', currency: 'IDR' };
    
                // Menentukan pengaturan regional secara eksplisit
                // options.minimumFractionDigits = 0;
                // options.maximumFractionDigits = 0;
                // options.useGrouping = true;
                // options.localeMatcher = 'best fit';
                // var $itemharga = item.harga;
                // <?php
                //   $formattedHarga = number_format($itemharga, 0, ',', '.');
                // ?>
                // var harga = $('<td></td>').text('Rp ' + "");
                var harga = $('<td></td>').text('Rp ' + item.harga);
                var subproduct = $('<td></td>').text(item.subproduct);
                var dropdownTd = $('<td></td>');
                var dropdownDiv = $('<div class="dropdown"></div>');
                var dropdownToggle = $('<a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false"><i class="feather-icon icon-more-vertical fs-5"></i></a>');
                var dropdownMenu = $('<ul class="dropdown-menu"></ul>');
                var deleteItem = $('<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>');
                var domain = window.location.origin;
                var href = `${domain}/edit-product/${item.container}/0`;
                var editItem = $('<li></li>').append(
    // $('<a></a>').addClass('dropdown-item').attr('href', `http://127.0.0.1:8000/edit-product/${item.container}/0`).append(
    //     $('<i></i>').addClass('bi bi-pencil-square me-3')
    // ).text('Edit')
   $('<a></a>').addClass('dropdown-item').attr('href', href).append(
    $('<i></i>').addClass(' bi bi-pencil-square me-3')
).text('Edit')
);


    
                dropdownMenu.append(deleteItem, editItem);
                dropdownDiv.append(dropdownToggle, dropdownMenu);
                dropdownTd.append(dropdownDiv);
    
                //   var productTd = $('<td></td>').text(item.product);
                //   var namaTd = $('<td></td>').text(item.nama);
                //   var gambarTd = $('<td></td>').text(item.gambar);
                
                // Menambahkan elemen-elemen <td> ke dalam elemen <tr>
                trElement.append(checkbox,image, name, cat, status, harga,subproduct,dropdownTd);
                
                // Menambahkan elemen <tr> ke dalam elemen <tbody>
                $('#ubahpage2').append(trElement);
                console.log(counter);
                counter++;
    
    
                }
    
    
                //   $('#paginationUbah2').innerHTML='';
                //   console.log($('#paginationUbah2'));
                console.log($total);
                  $('#paginationUbah').empty();
                var bikinpagination=(
               ' <nav aria-label="Page navigation example" id="paginationUbah2">'+
                '<ul class="pagination justify-content-end" id="paginationUbah">'+
                 ' <li class="page-item' +($current_page == 1? " disabled" : '') +'">'+
                   ' <a class="page-link paging "  tabindex="-1" aria-disabled ="true" id="prevButton" value="-1">Previous</a>'+
                  '</li>');
    
                  for (var pageng = 1; pageng <= Math.ceil($total / $per_page); pageng++){
                    bikinpagination += '<li class="page-item' + ($current_page == pageng ? " active" : '') + '"><a class="page-link paging" name="page" value="' + pageng + '">' + pageng + '</a></li>';
                  }
                  bikinpagination+=(' <li class="page-item ' +($current_page == Math.ceil($total / $per_page)? " disabled" : '') + '">'+
                    '<a class="page-link paging" value="+1" >Next</a>'+
                  '</li>'+
                '</ul>'+
              '</nav>');
              $('#paginationUbah').append(bikinpagination);
                console.log($current_page);
                // container.append(inputGroupContainer);
           
            divElement.innerHTML=loadbaru;
            console.log(loadbaru);
            // console.log(res);
    
            // if (res) {
            //     
            //     });
            //     var trElement = document.createElement('tr');
            //     dataArray.forEach(function(data) {
            //         // Buat elemen <tr> baru
            //         var trElement = document.createElement('tr');
    
            //         // Buat elemen <td> untuk setiap data dan tambahkan ke elemen <tr>
            //         // Misalnya:
            //         var tdElement1 = document.createElement('td');
            //         tdElement1.textContent = 'aaa'; // Ganti dengan nama field yang sesuai
            //         trElement.appendChild(tdElement1);
    
            //         var tdElement2 = document.createElement('td');
            //         tdElement2.textContent = data.field2; // Ganti dengan nama field yang sesuai
            //         trElement.appendChild(tdElement2);
    
            //         // Lanjutkan untuk setiap field data
    
            //         // Tambahkan elemen <tr> ke elemen <tbody>
            //         tbodyElement.appendChild(trElement);
            //     });
            // }
            // console.log(tbodyElement);
            // Ganti isi div dengan elemen <tbody> yang baru dibuat
            divElement.innerHTML = tbodyElement.innerHTML;
            $('#ubahpage').html(tbodyElement);
        }
        // loadproductpagination(response);
    
    
   
    </script>

    <!-- Search -->
    <script>
       

    </script>

    <!-- Libs JS -->
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="js/theme.min.js"></script>


@endsection
