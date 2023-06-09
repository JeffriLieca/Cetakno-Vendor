<!DOCTYPE html>
<html lang="en">

<head>

  <title>Cetakno - Printing Provider</title>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta content="Codescandy" name="author">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M8S4MT3EYG');
</script>

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon/favicon.ico')}}">


<!-- Libs CSS -->
<link href="{{ asset('libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet')}}">
<link href="{{ asset('libs/feather-webfont/dist/feather-icons.css" rel="stylesheet')}}">
<link href="{{ asset('libs/simplebar/dist/simplebar.min.css" rel="stylesheet')}}">


<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('css/theme.min.css')}}">


</head>

<body>
  <main>
<!-- section -->
  <section>
    <div class="container d-flex flex-column">
      <!-- row -->
      <div class="row min-vh-100 justify-content-center align-items-center">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10  py-8 py-xl-0">
          <div class="px-4 py-5 col-md-6">
            <a href="{{ url('/products') }}" class="navbar-brand">
                <img src="{{ asset('images/logo/Cetakno-crop.png')}}" alt="Cetakno" width="auto" height="100">
            </a>
        </div>
          <div class="row justify-content-center align-items-center">
            <!-- content -->
            <div class="col-md-6">
              <div class=" mb-6 mb-lg-0">
                <h1>Something’s wrong here...</h1>
                <p class="mb-8">We can’t find the page you’re looking for.<br>
                  Check out our help center or head back to home.</p>
   <!-- btn -->
                <a href="#" class="btn btn-dark">Help Center <i class="feather-icon icon-arrow-right"></i></a>
                 <!-- btn -->
                <a href="{{url('/products')}}" class="btn btn-primary ms-2">Back to home</a>
              </div>

            </div>
            <div class="col-md-6">
              <div>
                 <!-- img -->
                <img src="{{ asset('images/svg-graphics/error.svg')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- section -->






  <!-- Javascript-->
  <!-- Libs JS -->
<script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Theme JS -->
<script src="{{ asset('js/theme.min.js')}}"></script>




</body>

</html>