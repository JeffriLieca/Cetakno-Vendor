<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta content="Codescandy" name="author">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon/Cetakno-logo.ico">


    <!-- Libs CSS -->
    <link href="libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.min.css">
    <link href="libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Cetakno</title>
</head>
<body>
{{-- 
<form action='#' id='uploadForm' method="get" class="d-block dropzone border-dashed rounded-2">
                        {{ csrf_field() }}
                        <div class="fallback">
                          <input name="file" type="file" multiple>
                          
                        </div>
</form>
<button id="submituploadForm" type="submit">Upload</button> --}}
<form action="#" id="uploadForm"  class="d-block dropzone border-dashed rounded-2">
    {{ csrf_field() }}
    <div class="fallback">
      <input id='imager' name="file" type="file" multiple>
    </div>
  </form>
  <button id="submituploadForm" type="submit">Upload</button>


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
                            <td>
                                <a href="#!"> <img src="images/product cetak/1.jpg"
                                        alt="" class="icon-shape icon-md"></a>
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
                            <td><a href="#" class="text-reset">{{ $productName }}</a></td>
                            <td>{{ $categoryName }}</td>

                            <td>
                                <span class="badge  {{$container['status']== 1 ? 'bg-light-primary text-dark-primary': ($container['status']== 2 ? 'bg-light-danger text-dark-danger' :'bg-light-warning text-dark-warning')}} ">{{$container['status']== 1 ? 'Active': ($container['status']== 2 ? 'Deactive' : 'Draft')}}</span>
                            </td>
                            <td>{{ 'Rp ' . number_format($container['harga'], 0, ',', '.')}}</td>
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
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-pencil-square me-3 "></i>Edit</a>
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
        @php
            $current_page=1;
        @endphp
        <nav aria-label="Page navigation example" id="paginationUbah2">
            <ul class="pagination justify-content-end" id="paginationUbah">
              <li class="page-item disabled">
                <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item {{$current_page == 1? ' active':''}}"><a class="page-link paging" name ='page' value='1' >1</a></li>
              <li class="page-item {{$current_page == 2? ' active':''}}"><a class="page-link paging" name ='page' value='2'>2</a></li>
              <li class="page-item {{$current_page == 3? ' active':''}}"><a class="page-link paging" name ='page' value='3' >3</a></li>
              <li class="page-item">
                <a class="page-link" href="">Next</a>
              </li>
            </ul>
          </nav>
          <button class="page-link" id='buttonubahpage2' value="2" type="submit">2</button>

    </div>
</div>
<div class="mb-3 col-lg-6">
  <label class="form-label">Title</label>
  <input type="text" id='judul' class="form-control" placeholder="Product Name" required>
</div>
<div class="d-grid">
  <a  class="btn btn-primary" id="createButton">
    Create Product
  </a>
</div>

<script>
$(document).ready(function() {


  $('#createButton').click(function() {
            
        // DATA
        var judul = document.getElementById("judul").value;
       
    console.log(judul);
//         console.log(
//   'addon:', jsonData,
//   '\ndesk:', JSON.stringify(quillContent),
//   '\nupImages:', upImages,
//   '\njudul:', judul,
//   '\ncategory:', category,
//   '\nberat:', berat,
//   '\nunit:', unit,
//   '\njenis:', jenis,
//   '\nstat:', stat,
//   '\nharga',harga
// );

          var url = "{{ route('simpan_data2') }}"; // Ganti dengan URL yang sesuai dengan rute Anda
          _token: '{{ csrf_token() }}' // Menambahkan token CSRF
          $.ajax({
                url: url,
                type: 'POST',
                data: {judul:judul }, // Mengirim data konten HTML ke server
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Mengatur header CSRF token
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menyimpan data');
                    // Tangani error jika diperlukan
                }
            });


            
          });

//     $('.page-item').click(function() {
//     var value = $(this).find('.paging').attr('value');
//     console.log(value); // Menampilkan nilai value ke konsol
//   });

// var pagination=$('.page-link');
// $(document).on('click', '.page-item', function()

// $('.page-item').on('click', function() 
$(document).on('click', '.page-item', function(){

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
    data: { page: value },
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
      loadproductpagination(response['items']);
    
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
                                        '<li><a class="dropdown-item" href="#"><i'+
                                                    'class="bi bi-pencil-square me-3 "></i>Edit</a>'+
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
            
            var trElement = $('<tr></tr>'); // Membuat elemen <tr> baru
            
            // Membuat elemen-elemen <td> dengan konten sesuai data
                var checkbox=$('<td></td>').append(
            $('<div></div>').addClass('form-check').append(
                $('<input></input>').addClass('form-check-input').attr('type', 'checkbox').attr('value', '').attr('id', 'productOne'),
                $('<label></label>').addClass('form-check-label').attr('for', 'productOne')
            )
            );
            var image=$('<td></td>').append(
            $('<a></a>').attr('href', '#').append(
                $('<img></img>').attr('src', 'images/product cetak/1.jpg').addClass('icon-shape icon-md').attr('alt', '')
            )
            );

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
            var editItem = $('<li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3"></i>Edit</a></li>');

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


});
// var submitButton = document.getElementById('submituploadForm');

// submitButton.addEventListener('click', function(event) {
//   console.log('Tombol Upload diklik');

//   // Cek apakah elemen dengan kelas 'nama-div' ada
//   var divElements = document.getElementsByClassName('dz-image');
//   if (divElements.length > 0) {
//     // Elemen ditemukan, lanjutkan dengan tindakan
//     var imgElement = divElements[0].querySelector('img');
//     if (imgElement) {
//       var src = imgElement.src;
//       console.log('Src gambar:', src);
//       // Lakukan tindakan lain sesuai kebutuhan
//     } else {
//       console.log('Elemen img tidak ditemukan di dalam div');
//     }
//   } else {
//     console.log('Elemen dengan kelas nama-div tidak ditemukan');
//   }

//   event.preventDefault();
// });

var submitButton = document.getElementById('submituploadForm');

submitButton.addEventListener('click', function(event) {
  console.log('Tombol Upload diklik');

  upImages=[];
  var dzImages = document.querySelectorAll(".dz-image");
  if(dzImages !=null){

  
dzImages.forEach(function(dzImage) {
//   var imageSrc = dzImage.getAttribute("src");
  // Lakukan tindakan dengan setiap data gambar yang diambil

//   Cek apakah elemen dengan kelas 'nama-div' ada
  var divElements = dzImage;
//   if (divElements.length > 0) {
//     // Elemen ditemukan, lanjutkan dengan tindakan
    
//     var imgElement = divElements[0].querySelector('img');
//     if (imgElement) {
//       var src = imgElement.src;
//       console.log('Src gambar:', src);
//       console.log('Src gambar:', imgElement.alt);
//       // Lakukan tindakan lain sesuai kebutuhan
//     } else {
//       console.log('Elemen img tidak ditemukan di dalam div');
//     }
//   } else {
//     console.log('Elemen dengan kelas nama-div tidak ditemukan');
//   }

  // event.preventDefault();

var imgElement = divElements.querySelector('img');

if (imgElement) {
    // var src = imgElement.src;
    //   console.log('Src gambar:', src);
    //   console.log('Src gambar:', imgElement.alt);
  var base64Data = imgElement.src.split(',')[1]; 
  // upImages.push(base64Data,imgElement.alt);
  upImages.push({ src: base64Data, nama: imgElement.alt });


} 

else {
  console.log('Tambahkan Gambar Produk');
}

// Mengambil bagian data base64 dari URL gambar
_token: '{{ csrf_token() }}' // Menambahkan token CSRF
  $.ajax({
    url: "{{route('uploadgambar')}}",
    type: 'POST',
    data: { upImages :upImages },
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengatur header CSRF token
            },
    success: function(response) {
      console.log('Gambar berhasil disimpan');
      console.log(response.$filename);
    },
    error: function(xhr, status, error) {
      console.error('Terjadi kesalahan saat menyimpan gambar:', error);
    }
  });
});

  }
  else{
    console.log('upload gambar');
  }

// _token: '{{ csrf_token() }}' // Menambahkan token CSRF
//   $.ajax({
//     url: "{{route('uploadgambar')}}",
//     type: 'POST',
//     data: { gambar: upImages,nama:imgElement.alt },
//     headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
//                     'content') // Mengatur header CSRF token
//             },
//     success: function(response) {
//       console.log('Gambar berhasil disimpan');
//       console.log(response.$filename);
//     },
//     error: function(xhr, status, error) {
//       console.error('Terjadi kesalahan saat menyimpan gambar:', error);
//     }
//   });
// } else {
//   console.log('Tambahkan Gambar Produk');
// }
});
</script>

<script>function numberFormat(number) {
    return number.toLocaleString('id-ID');
  }</script>
  <!-- Libs JS -->
  <script src="libs/jquery/dist/jquery.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="libs/simplebar/dist/simplebar.min.js"></script>
  <script src="libs/custom-jeffri/category.dropdown.js"></script>
  {{-- <script src="libs/custom-jeffri/add-tambahan.js"></script> --}}
  
  <!-- Theme JS -->
  <script src="js/theme.min.js"></script>
    <script src="libs/quill/dist/quill.min.js"></script>
    <script src="js/vendors/editor.js"></script>
    <script src="libs/dropzone/dist/min/dropzone.min.js"></script>
    
  
</body>
</html>

   