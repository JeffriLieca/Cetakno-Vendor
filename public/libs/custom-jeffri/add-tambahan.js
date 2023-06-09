// $(document).ready(function() {
//     // Event listener untuk tombol "Add Input Group Container"
//     $('#addContainerButton').click(function() {
//         var inputGroupsContainer = $('.inputGroupsContainerClone').clone();
//         inputGroupsContainer.attr('class', 'inputGroupsContainer');
//         $('#inputGroupsWrapper').append(inputGroupsContainer);
//     });
//     $(document).on('click', '.dropdown-menu a.dropdown-item', function() {
//         var selectedText = $(this).text();
//         $(this).closest('.input-group').find('.dropdownButton').text(selectedText);
//     });


//     // Event listener untuk tombol "Add"
//     $(document).on('click', '.addButton', function() {
//         var inputGroup = $('<div class="row mb-3">' +
//             '<div class="col-1"></div>' +
//             '<div class="col">' +
//             '<div class="input-group">' +
//             '<span class="input-group-text">Text</span>' +
//             '<input type="text" name="keterangan[]" aria-label="keterangan" class="form-control" placeholder="Keterangan">' +
//             '<span class="input-group-text">Rp </span>' +
//             '<input type="text" name="harga[]" aria-label="harga" class="form-control" placeholder="Harga">' +
//             '<button class="btn btn-outline-secondary removeButton"  type="button">X</button>' +
//             '</div>' +
//             '</div>' +
//             '</div>');
//         $(this).closest('.row').parent().append(inputGroup);
//     });

//     $('#resetButton').click(function() {
//         displayData(userDataFromDatabase);
//     });
//     $('#cancelButton').click(function() {
//         window.history.back();
//     });
//     // $(document).on('click', '#resetButton', displayData(userDataFromDatabase));

//     $(document).on('click', '.deleteButton', function() {
//         $(this).closest('.inputGroupsContainer').remove();
//     });
//     // Event listener untuk tombol "Remove"
//     $(document).on('click', '.removeButton', function() {
//         $(this).closest('.row').remove();
//     });

//     // Event listener untuk tombol "Save"
//     $('#saveButton').click(function() {
//         saveData();
//     });

//     function saveData() {
//         var inputContainers = $(
//         '.inputGroupsContainer'); // Mengambil semua elemen dengan kelas .inputGroupsContainer
//         var userData = [];

//         inputContainers.each(function() {
//             var inputGroup = $(this).find(
//             '.input-group'); // Mengambil elemen .input-group di dalam input container tertentu

//             var jenis = inputGroup.find('[name="jenis[]"]')
//         .text(); // Mengambil teks dari elemen dropdown jenis[]
//             var judul = inputGroup.find('[name="judul[]"]').val();
//             var keterangan = inputGroup.find('[name="keterangan[]"]').map(function() {
//                 return $(this).val();
//             }).get(); // Mengambil semua nilai dari elemen keterangan[] sebagai array
//             var harga = inputGroup.find('[name="harga[]"]').map(function() {
//                 return $(this).val();
//             }).get(); // Mengambil semua nilai dari elemen harga[] sebagai array

//             var inputGroupData = {
//                 jenis: jenis,
//                 judul: judul,
//                 keterangan: keterangan,
//                 harga: harga
//             };
//             userData.push(inputGroupData);
//         });

//         console.log(userData);
//           var url = "{{ route('simpan_data') }}"; // Ganti dengan URL yang sesuai dengan rute Anda
          
//         var data = {
//             users: userData
//         };
//         _token: '{{ csrf_token() }}' // Menambahkan token CSRF
//         console.log(data);

//         $.ajax({
//             url: url,
//             type: 'POST',
//             data: data,
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
//                     'content') // Mengatur header CSRF token
//             },
//             success: function(response) {
//                 alert(response.message);
//                 console.log(data);
//             },
//             error: function(xhr, status, error) {
//                 alert('Terjadi kesalahan saat menyimpan data');
//                 // Tangani error jika diperlukan
//             }
//         });
//     }
// });

// function displayData(userData) {
//     var container = $('#inputGroupsWrapper'); // Container untuk menampilkan data

//     // Bersihkan kontainer sebelum menambahkan data baru
//     container.empty();

//     // Iterasi melalui userData
//     for (var i = 0; i < userData.length; i++) {
//         var inputGroupContainer = $('<div class="inputGroupsContainer mb-3"></div>');
//         inputGroupContainer.append('<br>');
//         var inputGroup = $('<div class="row mb-3"></div>');
//         inputGroup.append('<div class="col-2"></div>');

//         var inputGroupnya = $('<div class="col input-group"></div>');
//         // Menambahkan elemen dropdown jenis[]
//         var dropdownButton = $(
//             '<button class="btn btn-outline-secondary dropdown-toggle dropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
//             userData[i].jenis + '</button>');
//         var dropdownMenu = $('<ul class="dropdown-menu"></ul>');
//         dropdownMenu.append('<li><a class="dropdown-item" href="#">Checkbox</a></li>');
//         dropdownMenu.append('<li><a class="dropdown-item" href="#">Radio-Button</a></li>');
//         inputGroupnya.append(dropdownButton);
//         inputGroupnya.append(dropdownMenu);

//         // Menambahkan elemen judul[]
//         var judulInput = $(
//             '<input type="text" class="form-control" name="judul[]" placeholder="Judul Tambahan" value="' +
//             userData[i].judul + '">');
//         inputGroupnya.append(judulInput);

//         // Menambahkan tombol Add dan Delete
//         inputGroupnya.append('<button class="btn btn-outline-secondary addButton" type="button">Add</button>');
//         inputGroupnya.append(
//         '<button class="btn btn-outline-secondary deleteButton" type="button">Delete</button>');
//         inputGroup.append(inputGroupnya);
//         inputGroup.append('<div class="col-2"></div>');
//         inputGroupContainer.append(inputGroup);

//         // Menambahkan elemen keterangan[] dan harga[]
//         for (var j = 0; j < userData[i].keterangan.length; j++) {
//             var inputRow = $('<div class="row mb-3"></div>');
//             inputRow.append('<div class="col-3"></div>');

//             var inputGroup = $('<div class="col input-group"></div>');
//             inputGroup.append('<span class="input-group-text">Text</span>');
//             inputGroup.append('<input type="text" name="keterangan[]" class="form-control" value="' + userData[i]
//                 .keterangan[j] + '">');
//             inputGroup.append('<span class="input-group-text">Rp</span>');
//             inputGroup.append('<input type="text" name="harga[]" class="form-control" value="' + userData[i].harga[
//                 j] + '">');
//             inputGroup.append(
//                 '<button class="btn btn-outline-secondary removeButton" type="button">Remove</button>');

//             inputRow.append(inputGroup);
//             inputRow.append('<div class="col-3"></div>');

//             inputGroupContainer.append(inputRow);
//         }

//         container.append(inputGroupContainer);
//     }
// }


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


