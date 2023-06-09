@php
    $activePage = 'products'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')

@section('main-content')
    <!-- main -->
    <main class="main-content-wrapper">
      {{ csrf_field() }}
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row mb-8">
          <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
              <!-- page header -->
              <div>
                <h2>Add New Product</h2>
                  <!-- breacrumb -->
                  <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{route('loadproduct')}}" class="btn btn-light">Back to Product</a>
              </div>
            </div>

          </div>
        </div>
        <!-- row -->
        <div class="row">

          <div class="col-lg-8 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6 ">
                <h4 class="mb-4 h5">Product Information</h4>
                <div class="row">
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Title</label>
                    <input type="text" id='judul' class="form-control" placeholder="Product Name" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Product Category</label>
                    <select class="form-select" id="category">
                      <option selected>Product Category</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->ID_CATEGORY }}">{{ $category->NAME_CATEGORY }}</option>
                      @endforeach
                      @foreach ($categorieslain as $categorylain)
                          <option value="{{ $categorylain->ID_CATEGORY }}">{{ $categorylain->NAME_CATEGORY }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Weight</label>
                    <input type="text" id="berat" class="form-control" placeholder="Weight (gram)" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <div >
                      <label class="form-label position-relative">Units</label>
                      {{-- <button type="button" class="btn position-relative">
                        Profile --}}
                          <label id="popover-trigger" class="position-absolute translate-middle-end  rounded-pill d-inline-block px-2 py-1 bg-light" aria-disabled="true" style="font-size: 8px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="Keterangan Unit :" data-bs-content="
                          1) Luas: harga dihitung dari : panjang x lebar x qty ---------------                                  
                          2) Lembar: harga dihitung dari : jumlah lembar x qty  ----------------                             
                          3) Panjang: harga dihitung dari : panjang x qty -----------------------                             
                          4) Satuan: harga dihitung dari : qty                 " >
                            ?
                            <span class="visually-hidden">unread messages</span>
                          </label>
                       {{-- </button> --}}
                       
                    </div>
                    
                    <select id="unit" class="form-select">
                      <option selected>Select Units</option>
                      <option value="1">Luas</option>
                      <option value="2">Lembar</option>
                      <option value="3">Panjang</option>
                      <option value="4">Satuan</option>
                    </select>
                  </div>
                  <div>
                    <div class="mb-3 col-lg-12 mt-5">
                      <!-- heading -->
                      <h4 class="mb-3 h5">Product Images</h4>

                      <!-- input -->
                      {{-- <form action="#" class="d-block dropzone border-dashed rounded-2 ">
                        <div class="fallback">
                          <input name="file" type="file" multiple>
                        </div>
                      </form> --}}
                      
                      <form action='#' id='uploadForm' method="POST" class="d-block dropzone border-dashed rounded-2">
                        {{ csrf_field() }}
                        <div class="fallback">
                          <input name="file" type="file" multiple>
                          
                        </div>
                        {{-- <button id="submituploadForm" type="submit">Upload</button> --}}
                      </form>
                    </div>
                  </div>
                  <!-- Add Ons-->
                        <div class="mb-3 col-lg-12 mt-5">
                          <h4 class="mb-3 h5">Product Add-ons</h4>
                          <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchAddons" unchecked>
                            <label class="form-check-label" for="flexSwitchAddons">Add-ons</label>
                          </div>
                          <div class="pb-6" id="addons" style="display: none;">
                            <div id="inputGroupsWrapper">
                              <div class="inputGroupsContainer">
                                  {{ csrf_field() }}
                                  <br>
                                  <div class="row mb-3">
                                      <div class="col">
                                          <div class="input-group">
                                              <button aria-required="true" name="jenis[]"
                                                  class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button"
                                                  data-bs-toggle="dropdown" aria-expanded="false">Jenis</button>
                                              <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" >Checkbox</a></li>
                                                  <li><a class="dropdown-item" >Radio-Button</a></li>
                                              </ul>
                                              <input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan"
                                                  aria-label="Judul Tambahan Add-ons">
                                              <button class="btn btn-outline-secondary addButton" type="button">Add</button>
                                              <button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="col-1"></div>
                                      <div class="col">
                                          <div class="input-group" id='a'>
                                              <span class="input-group-text">Text</span>
                                              <input type="text" aria-label="keterangan" name="keterangan[]" class="form-control"
                                                  placeholder="Keterangan">
                                              <span class="input-group-text">Rp </span>
                                              <input type="text" aria-label="harga" name="harga[]" class="form-control col-6"
                                                  placeholder="Harga">
                                              {{-- <button class="btn btn-outline-secondary removeButton" type="button">Remove</button> --}}
                                              <button  class="btn btn-outline-secondary removeButton" type="button">X</button >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <br>
                      <div class="row">
                          <div class="col">
                            <div class="hstack d-grid gap-2 d-sm-flex  mb-5 mb-sm-2">
                              <button type="button" id="addContainerButton" class="btn btn-outline-primary ">Add New Group</button>
                            </div>
                              <div class="hstack d-grid gap-2 d-sm-flex justify-content-sm-end">
                                  {{-- <button type="button" id="cancelButton" class="btn btn-outline-warning">Cancel</button>
                                  <div class="vr d-none d-sm-block"></div> --}}
                                  <button type="button" id="deleteButton2" class="btn btn-outline-danger">Delete All</button>
                                  {{-- <div class="vr d-none d-sm-block"></div> --}}
                                  {{-- <button type="button" id="saveButton" class="btn btn-outline-success">Submit</button> --}}
                                </div>
                              </div>
                      </div>

                          </div>
                        </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-12 mt-5">
                    <h4 class="mb-3 h5">Product Descriptions</h4>
                    <div class="py-8" id="editor"></div>
                  </div>
                  {{-- <div class="mb-3 col-lg-12 mt-5">
                    <h4 class="mb-3 h5">Product Descriptions 2</h4>
                    <div class="py-8" id="editor2"></div>
                  </div> --}}
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-4 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6">
                <!-- input -->
                {{-- <div class="form-check form-switch mb-4">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchStock" checked>
                  <label class="form-check-label" for="flexSwitchStock">In Stock</label>
                </div> --}}
                <h4 class="mb-4 h5">Subproduct Information</h4>
                <!-- input -->
                <div>
                  <div class="mb-3">
                    <label class="form-label">Subproduct Code</label>
                    <input type="text" id="jenis" class="form-control" placeholder="Enter Subproduct Code">
                  </div>
                  <!-- input -->
                  <div class="mb-3">
                    <label class="form-label">Subproduct Title</label>
                    <input type="text" class="form-control" placeholder="Enter Subproduct Title">
                  </div>
                  
                  <!-- input -->
                  <div class="mb-3">
                    <label class="form-label" id="productSKU">Status</label><br>
                    <div  class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="1" checked>
                      <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <!-- input -->
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="2">
                      <label class="form-check-label" for="inlineRadio2">Deactive</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="3">
                      <label class="form-check-label" for="inlineRadio3">Draft</label>
                    </div>
                    <!-- input -->

                  </div>

                </div>
              </div>
            </div>
            <!-- card -->
            <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6">
                <h4 class="mb-4 h5">Product Price</h4>
                <!-- input -->
                <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input type="text" id='harga' class="form-control" placeholder="Rp0.00">
                </div>
                <!-- input -->
                <div class="mb-3">
                  <label class="form-label">Per</label>
                  <input type="text" id='satuan' class="form-control" placeholder="Satuan: m2/lembar/halaman">
                </div>

              </div>
            </div>
            <!-- card -->
            {{-- <div class="card mb-6 card-lg">
              <!-- card body -->
              <div class="card-body p-6">
                <h4 class="mb-4 h5">Meta Data</h4>
                <!-- input -->
                <div class="mb-3">
                  <label class="form-label">Meta Title</label>
                  <input type="text" class="form-control" placeholder="Title">
                </div>

                <!-- input -->
                <div class="mb-3">
                  <label class="form-label">Meta Description</label>
                  <textarea class="form-control" rows="3" placeholder="Meta Description"></textarea>
                </div>
              </div>
            </div> --}}
            <!-- button -->
            <div class="d-grid">
              <a  class="btn btn-primary" id="createButton">
                Create Product
              </a>
            </div>
          </div>

        </div>
      </div>

      <div class="d-none">
        <div class="inputGroupsContainerClone">
            {{ csrf_field() }}
            <br>
            <div class="row mb-3">
                <div class="col">
                    <div class="input-group">
                        <button aria-required="true" name="jenis[]"
                            class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Jenis</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" >Checkbox</a></li>
                            <li><a class="dropdown-item" >Radio-Button</a></li>
                        </ul>
                        <input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan"
                            aria-label="Judul Tambahan Add-ons">
                        <button class="btn btn-outline-secondary addButton" type="button">Add</button>
                        <button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-1"></div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Text</span>
                        <input type="text" aria-label="keterangan" name="keterangan[]" class="form-control"
                            placeholder="Keterangan">
                        <span class="input-group-text">Rp </span>
                        <input type="text" aria-label="harga" name="harga[]" class="form-control"
                            placeholder="Harga">
                        <button class="btn btn-outline-secondary removeButton" type="button">X</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    </main>

  </div>
<!-- Add ons-->
      <script>
      $(document).ready(function() {
      // Sembunyikan inputGroupsWrapper saat halaman dimuat
      $('#addons').hide();

      // Tangkap perubahan status pada flexSwitchAddons
      $('#flexSwitchAddons').change(function() {
        if ($(this).is(':checked')) {
          $('#addons').show(); // Tampilkan inputGroupsWrapper jika flexSwitchAddons dicek
        } else {
          $('#addons').hide(); // Sembunyikan inputGroupsWrapper jika flexSwitchAddons tidak dicek
        }
      });function displayData(userData) {
        var container = $('#inputGroupsWrapper'); // Container untuk menampilkan data

        // Bersihkan kontainer sebelum menambahkan data baru
        container.empty();

        // Iterasi melalui userData
        for (var i = 0; i < userData.length; i++) {
            var inputGroupContainer = $('<div class="inputGroupsContainer mb-3"></div>');
            inputGroupContainer.append('<br>');
            var inputGroup = $('<div class="row mb-3"></div>');
            inputGroup.append('<div class="col-2"></div>');

            var inputGroupnya = $('<div class="col input-group"></div>');
            // Menambahkan elemen dropdown jenis[]
            var dropdownButton = $('<button aria-required="true" name="jenis[]" class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                userData[i].jenis + '</button>');
                dropdownButton.text(userData[i].jenis);
            var dropdownMenu = $('<ul class="dropdown-menu"></ul>');
            dropdownMenu.append('<li><a class="dropdown-item" value="Checkbox">Checkbox</a></li>');
            dropdownMenu.append('<li><a class="dropdown-item" value="Radio-Button" >Radio-Button</a></li>');
            inputGroupnya.append(dropdownButton);
            inputGroupnya.append(dropdownMenu);

            // Menambahkan elemen judul[]
            var judulInput = $(
                '<input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan" value="' +
                userData[i].judul + '">');
            inputGroupnya.append(judulInput);

            // Menambahkan tombol Add dan Delete
            inputGroupnya.append('<button class="btn btn-outline-secondary addButton" type="button">Add</button>');
            inputGroupnya.append(
            '<button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>');
            inputGroup.append(inputGroupnya);
            inputGroup.append('<div class="col-2"></div>');
            inputGroupContainer.append(inputGroup);

            // Menambahkan elemen keterangan[] dan harga[]
            for (var j = 0; j < userData[i].keterangan.length; j++) {
                var inputRow = $('<div class="row mb-3"></div>');
                inputRow.append('<div class="col-3"></div>');

                var inputGroup = $('<div class="col input-group"></div>');
                inputGroup.append('<span class="input-group-text">Text</span>');
                inputGroup.append('<input type="text" name="keterangan[]" class="form-control" value="' + userData[i]
                    .keterangan[j] + '">');
                inputGroup.append('<span class="input-group-text">Rp</span>');
                inputGroup.append('<input type="text" name="harga[]" class="form-control" value="' + userData[i].harga[
                    j] + '">');
                inputGroup.append(
                    '<button class="btn btn-outline-secondary removeButton" type="button">X</button>');

                inputRow.append(inputGroup);
                inputRow.append('<div class="col-3"></div>');

                inputGroupContainer.append(inputRow);
            }

            container.append(inputGroupContainer);
        }
    }


    var userDataFromDatabase = [{
            jenis: "Checkbox",
            judul: "Judul 1",
            keterangan: ["Keterangan 1", "Keterangan 2"],
            harga: ["100000", "200000"]
        },
        {
            jenis: "Radio-Button",
            judul: "Judul 2",
            keterangan: ["Keterangan 3", "Keterangan 4"],
            harga: ["300000", "400000"]
        }
    ];



        // Event listener untuk tombol "Add Input Group Container"
        $('#addContainerButton').click(function() {
            var inputGroupsContainer = $('.inputGroupsContainerClone').clone();
            inputGroupsContainer.attr('class', 'inputGroupsContainer');
            $('#inputGroupsWrapper').append(inputGroupsContainer);
        });
        $(document).on('click', '.dropdown-menu a.dropdown-item', function() {
            var selectedText = $(this).text();
            $(this).closest('.input-group').find('.dropdownButton').text(selectedText);
            console.log($(this).closest('.input-group').find('.dropdownButton').text())
        });


        // Event listener untuk tombol "Add"
        $(document).on('click', '.addButton', function() {
            var inputGroup = $('<div class="row mb-3">' +
                '<div class="col-1"></div>' +
                '<div class="col">' +
                '<div class="input-group">' +
                '<span class="input-group-text">Text</span>' +
                '<input type="text" name="keterangan[]" aria-label="keterangan" class="form-control" placeholder="Keterangan">' +
                '<span class="input-group-text">Rp </span>' +
                '<input type="text" name="harga[]" aria-label="harga" class="form-control" placeholder="Harga">' +
                '<button class="btn btn-outline-secondary removeButton"  type="button">X</button>' +
                '</div>' +
                '</div>' +
                '</div>');
            $(this).closest('.row').parent().append(inputGroup);
        });

        $('#resetButton').click(function() {
            displayData(userDataFromDatabase);
        });
        $('#cancelButton').click(function() {
            window.history.back();
        });
        // $(document).on('click', '#resetButton', displayData(userDataFromDatabase));

        $(document).on('click', '.deleteButton', function() {
            $(this).closest('.inputGroupsContainer').remove();
        });
        // Event listener untuk tombol "Remove"
        $(document).on('click', '.removeButton', function() {
            $(this).closest('.row').remove();
        });

        // Event listener untuk tombol "Save"
        // $('#saveButton').click(function() {
        //     saveData();
        // });

        
    });

    function displayData(userData) {
        var container = $('#inputGroupsWrapper'); // Container untuk menampilkan data

        // Bersihkan kontainer sebelum menambahkan data baru
        container.empty();

        // Iterasi melalui userData
        for (var i = 0; i < userData.length; i++) {
            var inputGroupContainer = $('<div class="inputGroupsContainer mb-3"></div>');
            inputGroupContainer.append('<br>');
            var inputGroup = $('<div class="row mb-3"></div>');
            inputGroup.append('<div class="col-2"></div>');

            var inputGroupnya = $('<div class="col input-group"></div>');
            // Menambahkan elemen dropdown jenis[]
            var dropdownButton = $(
                '<button class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                userData[i].jenis + '</button>');
            var dropdownMenu = $('<ul class="dropdown-menu"></ul>');
            dropdownMenu.append('<li><a class="dropdown-item" href="#">Checkbox</a></li>');
            dropdownMenu.append('<li><a class="dropdown-item" href="#">Radio-Button</a></li>');
            inputGroupnya.append(dropdownButton);
            inputGroupnya.append(dropdownMenu);

            // Menambahkan elemen judul[]
            var judulInput = $(
                '<input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan" value="' +
                userData[i].judul + '">');
            inputGroupnya.append(judulInput);

            // Menambahkan tombol Add dan Delete
            inputGroupnya.append('<button class="btn btn-outline-secondary addButton" type="button">Add</button>');
            inputGroupnya.append(
            '<button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>');
            inputGroup.append(inputGroupnya);
            inputGroup.append('<div class="col-2"></div>');
            inputGroupContainer.append(inputGroup);

            // Menambahkan elemen keterangan[] dan harga[]
            for (var j = 0; j < userData[i].keterangan.length; j++) {
                var inputRow = $('<div class="row mb-3"></div>');
                inputRow.append('<div class="col-3"></div>');

                var inputGroup = $('<div class="col input-group"></div>');
                inputGroup.append('<span class="input-group-text">Text</span>');
                inputGroup.append('<input type="text" name="keterangan[]" class="form-control" value="' + userData[i]
                    .keterangan[j] + '">');
                inputGroup.append('<span class="input-group-text">Rp</span>');
                inputGroup.append('<input type="text" name="harga[]" class="form-control" value="' + userData[i].harga[
                    j] + '">');
                inputGroup.append(
                    '<button class="btn btn-outline-secondary removeButton" type="button">Remove</button>');

                inputRow.append(inputGroup);
                inputRow.append('<div class="col-3"></div>');

                inputGroupContainer.append(inputRow);
            }

            container.append(inputGroupContainer);
        }
    }


    // var userDataFromDatabase = [{
    //         jenis: "Checkbox",
    //         judul: "Judul 1",
    //         keterangan: ["Keterangan 1", "Keterangan 2"],
    //         harga: ["100000", "200000"]
    //     },
    //     {
    //         jenis: "Radio-Button",
    //         judul: "Judul 2",
    //         keterangan: ["Keterangan 3", "Keterangan 4"],
    //         harga: ["300000", "400000"]
    //     }
    // ];
    var userDataFromDatabase = JSON.parse('[{"jenis":"Checkbox","judul":"HAHAHAHH","keterangan":["a1"],"harga":["100"]},{"jenis":"Radio-Button","judul":"HIHHIHI","keterangan":["b1","b2"],"harga":["222","222"]}]');



    $('#deleteButton2').click(function() {
      var container = $('#inputGroupsWrapper'); // Container untuk menampilkan data

        // Bersihkan kontainer sebelum menambahkan data baru
        container.empty();

            var inputGroupsContainer = $('.inputGroupsContainerClone').clone();
            inputGroupsContainer.attr('class', 'inputGroupsContainer');
            container.append(inputGroupsContainer);
            $('#flexSwitchAddons').prop('checked', false);
            $('#addons').hide(); 
        });



      </script>


<!-- Quill -->

    <script>
    // var quill = new Quill('#editor', {
    //   // Konfigurasi Quill
    // });

    // Mendapatkan konten dari Quill
    // var delta = quill.getContents();

    // // Mengubah konten menjadi format JSON
    // var content = JSON.stringify(delta);

    var quill = $('#editor');
    // var delta = quill.getContents();
  
    $(document).ready(function() {


      function saveData() {
            var jenis = "duhh";
        //     var jenisDropdown = $('[name="jenis[]"]').siblings('.dropdown-menu').find('.dropdown-item.active');
        // var jenis = jenisDropdown.attr('value'); // Mengambil nilai dari dropdown yang dipilih

        console.log(jenis);
            var inputContainers = $(
            '.inputGroupsContainer'); // Mengambil semua elemen dengan kelas .inputGroupsContainer
            var userData = [];

            inputContainers.each(function() {
                var inputGroup = $(this).find(
                '.input-group'); // Mengambil elemen .input-group di dalam input container tertentu

                var jenis = inputGroup.find('[name="jenis[]"]')
            .text(); // Mengambil teks dari elemen dropdown jenis[]
                var judul = inputGroup.find('[name="judul[]"]').val();
                var keterangan = inputGroup.find('[name="keterangan[]"]').map(function() {
                    return $(this).val();
                }).get(); // Mengambil semua nilai dari elemen keterangan[] sebagai array
                var harga = inputGroup.find('[name="harga[]"]').map(function() {
                    return $(this).val();
                }).get(); // Mengambil semua nilai dari elemen harga[] sebagai array

                var inputGroupData = {
                    jenis: jenis,
                    judul: judul,
                    keterangan: keterangan,
                    harga: harga
                };
                userData.push(inputGroupData);
            });

            // console.log(userData);
              var url = "{{ route('simpan_data') }}"; // Ganti dengan URL yang sesuai dengan rute Anda
              var jsonData = JSON.stringify(userData);
              
            var data = {
                users: jsonData
            };
            _token: '{{ csrf_token() }}' // Menambahkan token CSRF
            
            console.log(data);

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     data: data,
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
            //             'content') // Mengatur header CSRF token
            //     },
            //     success: function(response) {
            //         alert(response.message);
            //         console.log(data);
            //     },
            //     error: function(xhr, status, error) {
            //         alert('Terjadi kesalahan saat menyimpan data');
            //         // Tangani error jika diperlukan
            //     }
            // });
        }
          // Tangkap tombol dengan id "createButton"
          $('#createButton').click(function() {
            // Akses isi Quill editor
            // var quillText = $('#editor').root.innerHTML;
            var quillContent = quill.root.innerHTML;
            // Tampilkan console log isi Quill
            console.log(quillContent);
          
            var inputContainers = $(
            '.inputGroupsContainer'); // Mengambil semua elemen dengan kelas .inputGroupsContainer
            var userData = [];

            inputContainers.each(function() {
                var inputGroup = $(this).find(
                '.input-group'); // Mengambil elemen .input-group di dalam input container tertentu

                var jenis = inputGroup.find('[name="jenis[]"]')
            .text(); // Mengambil teks dari elemen dropdown jenis[]
                var judul = inputGroup.find('[name="judul[]"]').val();
                var keterangan = inputGroup.find('[name="keterangan[]"]').map(function() {
                    return $(this).val();
                }).get(); // Mengambil semua nilai dari elemen keterangan[] sebagai array
                var harga = inputGroup.find('[name="harga[]"]').map(function() {
                    return $(this).val();
                }).get(); // Mengambil semua nilai dari elemen harga[] sebagai array

                var inputGroupData = {
                    jenis: jenis,
                    judul: judul,
                    keterangan: keterangan,
                    harga: harga
                };
                userData.push(inputGroupData);
            });

            // console.log(userData);
              var jsonData = JSON.stringify(userData);

            // Gambar
            // var submitButton = document.getElementById('submituploadForm');



  upImages=[];
  var dzImages = document.querySelectorAll(".dz-image");


// Loop melalui setiap elemen .dz-image
dzImages.forEach(function(dzImage) {
  // Dapatkan elemen <img> di dalam .dz-image
  var imgElement = dzImage.querySelector("img");

  // Buat elemen <canvas>
  var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");

  // Atur ukuran canvas sesuai dengan ukuran gambar
  canvas.width = imgElement.width;
  canvas.height = imgElement.height;

  // Gambar gambar ke dalam canvas
  ctx.drawImage(imgElement, 0, 0);

  // Simpan gambar ke dalam file blob
  canvas.toBlob(function(blob) {
    // Lakukan operasi selanjutnya dengan file blob, misalnya mengunggah ke server
    // Di sini Anda dapat menggunakan metode seperti FormData atau XMLHttpRequest untuk mengunggah file blob ke server

    // Contoh: Mengunggah file blob ke server menggunakan metode FormData dan AJAX
    var formData = new FormData();
    formData.append("image", blob, "pas foto.jpg");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/uploadgambar", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); // Gantikan "{{ csrf_token() }}" dengan token CSRF aktual
    xhr.onload = function() {
      if (xhr.status === 200) {
        // File berhasil diunggah
        console.log("File uploaded successfully");
      } else {
        // Terjadi kesalahan saat mengunggah file
        console.error("Error uploading file");
      }
    };
    xhr.send(formData);
  }, "image/jpeg"); // Atur tipe file yang diinginkan, misalnya "image/jpeg" untuk format JPEG
});


  if(dzImages !=null){
  
dzImages.forEach(function(dzImage) {

//   Cek apakah elemen dengan kelas 'nama-div' ada
  var divElements = dzImage;


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

// // Mengambil bagian data base64 dari URL gambar
// _token: '{{ csrf_token() }}' // Menambahkan token CSRF
//   $.ajax({
//     url: "{{route('uploadgambarprod')}}",
//     type: 'POST',
//     data: { upImages :upImages },
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
});

  }
  else{
    console.log('upload gambar');
  }


        // DATA
        var judul = document.getElementById("judul").value;
        var category = document.getElementById("category").value;
        var berat = document.getElementById("berat").value;
        var unit = document.getElementById("unit").value;
        var jenis = document.getElementById("jenis").value;
        var radios = document.getElementsByName('inlineRadioOptions');

        var stat = null;
        for (var i = 0; i < radios.length; i++) {
          if (radios[i].checked) {
            stat = radios[i].value;
            break;
          }
        }
        var harga = document.getElementById("harga").value;

        console.log(
  'addon:', jsonData,
  '\ndesk:', JSON.stringify(quillContent),
  '\nupImages:', upImages,
  '\njudul:', judul,
  '\ncategory:', category,
  '\nberat:', berat,
  '\nunit:', unit,
  '\njenis:', jenis,
  '\nstat:', stat,
  '\nharga',harga
);

          var url = "{{ route('simpan_data') }}"; // Ganti dengan URL yang sesuai dengan rute Anda
          _token: '{{ csrf_token() }}' // Menambahkan token CSRF
          $.ajax({
                url: url,
                type: 'POST',
                data: { addon: jsonData,desk: JSON.stringify(quillContent), upImages :upImages,judul:judul,category:category,berat:berat,unit:unit,jenis:jenis,stat:stat,harga:harga }, // Mengirim data konten HTML ke server
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Mengatur header CSRF token
                },
                success: function(response) {
                    alert('Berhasil Menambahkan Produk');
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menyimpan data');
                    // Tangani error jika diperlukan
                }
            });


            
          });

      });

      

      

//     var container = document.querySelector('.ql-container');
// var innerHTML = container.innerHTML;
// console.log(innerHTML);

// var quill = new Quill('#editor', {
//   modules: {
//     toolbar: [
//       [{ header: [1, 2, false] }],
//       [{ font: [] }],
//       ['bold', 'italic', 'underline', 'strike'],
//       [{ size: ['small', false, 'large', 'huge'] }],
//       [{ list: 'ordered' }, { list: 'bullet' }],
//       [{ color: [] }, { background: [] }, { align: [] }],
//       ['link', 'image', 'code-block', 'video']
//     ]
//   },
//   theme: 'snow'
// });

// var quill;$("#editor").length&&(quill=new Quill("#editor",{modules:{toolbar:[[{header:[1,2,!1]}],[{font:[]}],["bold","italic","underline","strike"],[{size:["small",!1,"large","huge"]}],[{list:"ordered"},{list:"bullet"}],[{color:[]},{background:[]},{align:[]}],["link","image","code-block","video"]]},theme:"snow"}));

// function getQuillHtml() {
//   var delta = quill.getContents();
//   var converter = new QuillDeltaToHtmlConverter(delta.ops, {});
//   var html = converter.convert();
//   return html;
// }

// // Contoh penggunaan
// var quillHtml = getQuillHtml();
// console.log(quillHtml);

</script>

<!-- popover -->
  {{-- <script>
        $(document).ready(function() {
      $('#myPopover').popover({
        trigger: 'focus',
        placement: 'bottom',
        html: true
      });
    });

        var popoverTrigger = document.getElementById('popover-trigger');
    popoverTrigger.addEventListener('shown.bs.popover', function () {
        var popoverContent = this.getAttribute('data-bs-content');
        popoverContent = popoverContent.replace(/\n/g, '<br>');
        this.setAttribute('data-bs-content', popoverContent);
    });
  </script> --}}



  <!-- Image -->


  <script>



$(document).ready(function() {

//   $('.dz-preview .dz-image').each(function() {
//   var imageUrl = $(this).find('img').attr('src');
//   console.log('URL gambar:', imageUrl);
// });
//   var myDropzone = $('#uploadForm');
//   console.log(myDropzone);
//   myDropzone.on("success", function (file, response) {
//   // File berhasil diunggah, response berisi data dari server
  
//   console.log("File berhasil diunggah:", file);
//   console.log("Response dari server:", response);
// });



//   <?php
// // Mendapatkan data base64 dari POST request atau variabel lainnya

// $base64Data = "image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAYAAAA5ZDbSAAAAAXNSR0IArs4c6QAAIABJREFUeF7tvQe4XWWZNnyvvvvpJye9JwQChBqKCihipYgKKCpjAYf5LNjFcSyA3+gooqOj43yKzoijju1TFBzEgjCgAgFCQks9SU7J6Wf3vVf7r/t513uyRUDyieGEn5XrXCdn77XXXut93qfdTzPughHj2eMZuQI/LRRgPEvgZyRt5aGeJfAzl7bPEvgZTttnCfwsgf//sALP8Gd8Vgc/S+Bn+Ao8zuMZALTvGBs4aB3JZzn4cQjcSlTDMBDHBydU8MwnsGEAJI6wpAETQDTDm5DXjdhIXonVafJyjAED6IlNOK3nH2QC7ZlP4EcTxDAQxYqQ/PENwDYMGBHJyh8LgRHCgoEAMezYkPMO1uMZSWATMUJShISLY0SGgZHYQJ8R48E4RgEGuhBj0DDgIkYOBh6EiXVxjLphIB+H2GKYWIoY6ZgcTyI/K6JnxSaPSVzThBlHqMcGduSy+JUfIsykMG4Z2D05iZ4ImDSAV8NEOY4wDgPDcYR2GHgeYozDxBFC+BgpIe7Bexz0HExjSJhVjCADgwZQiYHlRow32zbcw1Yj9ANU6hVYtouJ0RGg6WPugnmoNhqwbBupUgVZWCjvHUNbHMMGcIVh4H0APh1HSKlvQGQA5kHGyActgfe5MTFo5VbiGD8xDPzP8kWwcu1wMmlUqhUM7h2CbZNkESqVqpwbxxEQxejq6oZl2WjUqzAsG1EcwYpjdBVrGJycxlmGiZchQldswkSEKNHbBxM/H2QENhAnkc06gLti4B4beHjxUhQWzcHQ4Ahs10Lgx6jWawjiELZpY2J8HKYRw3VSqNfrYl2lUi6iKILnuLAsE56XQhAE8FIuQj+CZVuw6k3M2T2Mf6QWTqzwGTM7MdMMI0IsYmR2svZBRmB6OgZ2xDGucWxMzOuEl8vD90NYBlCtNhBbJprNprwWhiHqlSpM00QY+vA8T17zPBI3RhTRDovgmSYs20TayyIIfdgpJZR5Hc+ykTFj5P" ;

// // Memisahkan header dan data base64
// list(, $base64Data) = explode(',', $base64Data);

// // Menentukan path dan nama file yang akan disimpan
// $path = './public/shop_images/';
// $fileName = 'gambar.png';

// // Mengubah data base64 menjadi binary
// $data = base64_decode($base64Data);

// // Menyimpan data binary menjadi file gambar
// // if (file_put_contents($path . $fileName, $data)) {
// //     echo "Gambar berhasil disimpan.";
// // } else {
// //     echo "Terjadi kesalahan saat menyimpan gambar.";
// // }
// ?>

// });
//     e.preventDefault();

//     var formData = new FormData(this);
//     console.log(formData);
    // var url = "{{ route('simpan_data') }}"; // Ganti dengan URL yang sesuai dengan rute Anda
    //       _token: '{{ csrf_token() }}' // Menambahkan token CSRF
    // $.ajax({
    //   url: url, // Ganti dengan URL endpoint untuk mengunggah file
    //   type: 'POST',
    //   data: formData,
    //   headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
    //                     'content') // Mengatur header CSRF token
    //             },
    //   processData: false,
    //   contentType: false,
    //   success: function(response) {
    //     // Tanggapan sukses dari server
    //     console.log('File berhasil diunggah');
    //   },
    //   error: function(xhr, status, error) {
    //     // Tanggapan error dari server
    //     console.log('Terjadi kesalahan saat mengunggah file');
    //   }
    // });
  });

  </script>

 <!-- Libs JS -->
 <script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
 <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{ asset('libs/simplebar/dist/simplebar.min.js')}}"></script>
 <script src="{{ asset('libs/custom-jeffri/category.dropdown.js')}}"></script>
 {{-- <script src="{{ asset('libs/custom-jeffri/add-tambahan.js')}}"></script> --}}
 
 <!-- Theme JS -->
 <script src="{{ asset('js/theme.min.js')}}"></script>
   <script src="{{ asset('libs/quill/dist/quill.min.js')}}"></script>
   <script src="{{ asset('js/vendors/editor.js')}}"></script>
   <script src="{{ asset('libs/dropzone/dist/min/dropzone.min.js')}}"></script>
   


@endsection
