@php
    $activePage = 'products'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')

@section('main-content')
    <div class="d-none">
        <div class="inputGroupsContainerClone">
            {{ csrf_field() }}
            <br>
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col">
                    <div class="input-group">
                        <button aria-required="true" name="jenis[]"
                            class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Jenis</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" value="Checkbox">Checkbox</a></li>
                            <li><a class="dropdown-item" value="Radio-Button">Radio-Button</a></li>
                        </ul>
                        <input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan"
                            aria-label="Judul Tambahan Add-ons">
                        <button class="btn btn-outline-secondary addButton" type="button">Add</button>
                        <button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mb-3">
                <div class="col-3"></div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Text</span>
                        <input type="text" aria-label="First name" name="keterangan[]" class="form-control"
                            placeholder="Keterangan">
                        <span class="input-group-text">Rp </span>
                        <input type="text" aria-label="Last name" name="harga[]" class="form-control"
                            placeholder="Harga">
                        <button class="btn btn-outline-secondary removeButton" type="button">Remove</button>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    </div>
    <div id="inputGroupsWrapper">
        <div class="inputGroupsContainer">
            {{ csrf_field() }}
            <br>
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col">
                    <div class="input-group">
                        <button aria-required="true" name="jenis[]"
                            class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Jenis</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" value="Checkbox">Checkbox</a></li>
                            <li><a class="dropdown-item" value="Radio-Button">Radio-Button</a></li>
                        </ul>
                        <input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan"
                            aria-label="Judul Tambahan Add-ons">
                        <button class="btn btn-outline-secondary addButton" type="button">Add</button>
                        <button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mb-3">
                <div class="col-3"></div>
                <div class="col">
                    <div class="input-group" id='a'>
                        <span class="input-group-text">Text</span>
                        <input type="text" aria-label="First name" name="keterangan[]" class="form-control"
                            placeholder="Keterangan">
                        <span class="input-group-text">Rp </span>
                        <input type="text" aria-label="Last name" name="harga[]" class="form-control"
                            placeholder="Harga">
                        <button class="btn btn-outline-secondary removeButton" type="button">Remove</button>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    <br>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        
        <button type="button" id="addContainerButton" class="btn btn-outline-primary">Add New Group</button>
        <div class="hstack d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" id="cancelButton" class="btn btn-outline-warning">Cancel</button>
            <div class="vr"></div>
            <button type="button" id="resetButton" class="btn btn-outline-danger">Reset</button>
            <div class="vr"></div>
            <button type="button" id="saveButton" class="btn btn-outline-success">Submit</button>
          </div>
        </div>
</div>
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
    Launch demo modal
  </button>
  <!-- Modal -->
  <div class="modal fade gd-example-modal-xl" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalScrollableTitle">Addon Product</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="addonForm">
                <div id="addonContainer">
                    Test 1
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="exampleModalScrollable2">Gaslah</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade gd-example-modal-xl" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalScrollableTitle">Addon Product</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="addonForm">
                <div id="addonContainer">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Next</button>
        </div>
      </div>
    </div>
  </div>
    

    <script>
         var userDataFromDatabase = JSON.parse('[{"jenis":"Checkbox","judul":"HAHAHAHH","keterangan":["a1"],"harga":["100"]},{"jenis":"Radio-Button","judul":"HIHHIHI","keterangan":["b1","b2"],"harga":["222","222"]}]');
var addonContainer = document.getElementById('addonContainer');

// Loop melalui data addon
for (var i = 0; i < userDataFromDatabase.length; i++) {
  var addon = userDataFromDatabase[i];
  var addonHtml = '';

  // Jika jenis addon adalah "Checkbox"
  if (addon.jenis === 'Checkbox') {
  addonHtml += '<h5>' + addon.judul + '</h5>';

  // Loop melalui keterangan addon
  for (var j = 0; j < addon.keterangan.length; j++) {
    var keterangan = addon.keterangan[j];
    var harga = addon.harga[j];
    var inputId = 'addon_' + i + '_' + j;

    addonHtml += '<div class="d-flex justify-content-between">';
        addonHtml+='<div>';
    addonHtml += '<input type="checkbox" id="' + inputId + '" name="addon_' + i + '[]" value="' + keterangan + ':' + harga + '" class='px-2'>';
    addonHtml += '<label class="px-2" for="' + inputId + '">' + keterangan + '</label>';
        addonHtml+='</div>';
    addonHtml += '<span>Rp ' + harga + '</span>';
    addonHtml += '</div>';
  }
}

// Jika jenis addon adalah "Radio-Button"
else if (addon.jenis === 'Radio-Button') {
  addonHtml += '<h5>' + addon.judul + '</h5>';

  // Loop melalui keterangan addon
  for (var j = 0; j < addon.keterangan.length; j++) {
    var keterangan = addon.keterangan[j];
    var harga = addon.harga[j];
    var inputId = 'addon_' + i + '_' + j;

    addonHtml += '<div class="d-flex justify-content-between">';
        addonHtml+='<div>';
    addonHtml += '<input type="radio" id="' + inputId + '" name="addon_' + i + '" value="' + keterangan + ':' + harga + '">';
    addonHtml += '<label class="px-2" for="' + inputId + '">' + keterangan + '</label>';
        addonHtml+='</div>';
    addonHtml += '<span>Rp ' + harga + '</span>';
    addonHtml += '</div>';
  }
}


  // Tambahkan addon ke dalam container
  addonContainer.innerHTML += addonHtml;
}

        
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

$(document).ready(function() {

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
    $('#saveButton').click(function() {
        saveData();
    });

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

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Mengatur header CSRF token
            },
            success: function(response) {
                alert(response.message);
                console.log(data);
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan saat menyimpan data');
                // Tangani error jika diperlukan
            }
        });
    }
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




       // Menampilkan kembali data userData dalam bentuk HTML
        displayData(userDataFromDatabase);
    </script>

    <!-- Libs JS -->
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="libs/simplebar/dist/simplebar.min.js"></script>
    {{-- <script src="libs/custom-jeffri/add-tambahan.js"></script> --}}

    <!-- Theme JS -->
    <script src="js/theme.min.js"></script>
    <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="js/vendors/chart.js"></script>


@endsection

