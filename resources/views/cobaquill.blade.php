<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta content="Codescandy" name="author">

<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
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



<!-- Create the editor container -->
<div id="editor">
    <p>asdadia</p><h2><span class="ql-font-serif">HAids</span></h2><p><strong class="ql-size-huge">koa<em>da<u>sds</u></em></strong></p>
    <p>Hello World!</p>
    <p>Some initial <strong>bold</strong> text</p>
    <p><br></p>
  </div>
  <div class="d-grid">
      <a  class="btn btn-primary" id="createButton">
        Create Product
      </a>
    </div>
  
  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  
  <!-- Initialize Quill editor -->
  <script>
    var quill = $('#editor');
    // var delta = quill.getContents();
  
    $(document).ready(function() {
          // Tangkap tombol dengan id "createButton"
          $('#createButton').click(function() {
            // Akses isi Quill editor
            // var quillText = $('#editor').root.innerHTML;
            var quillContent = quill.root.innerHTML;
            // Tampilkan console log isi Quill
            console.log(quillContent);
          });
      });
  
  </script>
  
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

   


 