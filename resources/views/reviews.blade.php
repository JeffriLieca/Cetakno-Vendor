@php
    $activePage = 'reviews'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')    

@section('main-content')
    <!-- main -->
    <main class="main-content-wrapper">
      <div class="container">
        <div class="row mb-8">
          <div class="col-md-12">
            <div>
              <!-- page header -->
              <h2>Reviews</h2>
              <!-- breacrumb -->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                </ol>
              </nav>

            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
              <div class="p-6 ">
                <div class="row justify-content-between">
                  <div class="col-md-4 col-12 mb-2 mb-md-0">
                    <!-- form -->
                    <form class="d-flex" role="search">
                      <input class="form-control" type="search" placeholder="Search Reviews" aria-label="Search">
                    </form>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12">
                    <!-- main -->
                    <select class="form-select">
                      <option selected>Select Rating</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- card body -->
              <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                  <table class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                    <thead class="bg-light">
                      <tr>
                        <th>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                            <label class="form-check-label" for="checkAll">
                            </label>
                          </div>
                        </th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Reviews</th>
                        <th>Rating</th>
                        <th>Date</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="reviewOne">
                            <label class="form-check-label" for="reviewOne">

                            </label>
                          </div>
                        </td>

                        <td><a href="#" class="text-reset">Spanduk</a></td>
                        <td>Barry McKenzie</td>

                        <td>
                          <span class="text-truncate">Murah berkualitas</span>
                        </td>
                        <td>
                          <div>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-light"></i></span>
                          </div>
                        </td>
                        <td>
                          23 Nov,2022
                        </td>
                        
                      </tr>
                      <tr>

                        <td class="pe-0">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="reviewTwo">
                            <label class="form-check-label" for="reviewTwo">

                            </label>
                          </div>
                        </td>

                        <td><a href="#" class="text-reset">X-Banner</a></td>
                        <td>Dale Jenkins</td>

                        <td>
                          <span class="text-truncate">Nice product 👌 quality 👌...</span>
                        </td>
                        <td>
                          <div>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-light"></i></span>
                          </div>
                        </td>
                        <td>
                          23 Nov,2022
                        </td>
                        
                      </tr>
                      <tr>

                        <td class="pe-0">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAllThree">
                            <label class="form-check-label" for="checkAllThree">

                            </label>
                          </div>
                        </td>

                        <td><a href="#" class="text-reset">Buku A4</a></td>
                        <td>Michael Phillips</td>

                        <td>
                          <span class="text-truncate">Good quality product delivered...</span>
                        </td>
                        <td>
                          <div>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                          </div>
                        </td>
                        <td>
                          23 Nov,2022
                        </td>
                       
                      </tr>
                      <tr>

                        <td class="pe-0">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="reviewFour">
                            <label class="form-check-label" for="reviewFour">

                            </label>
                          </div>
                        </td>

                        <td><a href="#" class="text-reset">Sticker A3</a></td>
                        <td>James Parker</td>

                        <td>
                          <span class="text-truncate">Excellent Quality</span>
                        </td>
                        <td>
                          <div>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                          </div>
                        </td>
                        <td>
                          23 Nov,2022
                        </td>
                        
                      </tr>
                      <tr>

                        <td class="pe-0">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="reviewFive">
                            <label class="form-check-label" for="reviewFive">

                            </label>
                          </div>
                        </td>

                        <td><a href="#" class="text-reset">Print A4</a></td>
                        <td>William Hansen</td>

                        <td>
                          <span class="text-truncate">Mahal</span>
                        </td>
                        <td>
                          <div>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-warning"></i></span>
                            <span><i class="bi bi-star-fill text-light"></i></span>
                            <span><i class="bi bi-star-fill text-light"></i></span>
                          </div>
                        </td>
                        <td>
                          23 Nov,2022
                        </td>
                        
                      </tr>
                      
                    </tbody>
                  </table>

                </div>

                <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                  <span>Showing 1 to 5 of 12 entries</span>
                  <nav class="mt-2 mt-md-0">
                    <ul class="pagination mb-0 ">
                      <li class="page-item disabled"><a class="page-link " href="#!">Previous</a></li>
                      <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                      <li class="page-item"><a class="page-link" href="#!">2</a></li>
                      <li class="page-item"><a class="page-link" href="#!">3</a></li>
                      <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                    </ul>
                  </nav>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </main>

  </div>


  <!-- Libs JS -->
<script src="libs/jquery/dist/jquery.min.js"></script>
<script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="js/theme.min.js"></script>


@endsection
