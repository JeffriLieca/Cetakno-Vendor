@php
    $activePage = 'customers'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')

@section('main-content')
      <main class="main-content-wrapper">
        <div class="container">
          <div class="row mb-8">
            <div class="col-md-12">
              <div class="d-md-flex justify-content-between align-items-center">
                <div>
                  <h2>Customers</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{url('/')}}" >Dashboard</a></li> 
                      {{-- class="text-inherit" --}}
                      <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                  </nav>
                </div>
                {{-- <div>
                  <a href="#!" class="btn btn-primary">Add New Customer</a>
                </div> --}}
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-xl-12 col-12 mb-5">
              <div class="card h-100 card-lg">

                <div class="p-6">
                  <div class="row justify-content-between">
                    <div class="col-md-4 col-12">
                      <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search Customers" aria-label="Search">

                      </form>
                    </div>

                  </div>
                </div>
                <div class="card-body p-0 ">

                  <div class="table-responsive">
                    <table
                      class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                      <thead class="bg-light">
                        <tr>
                          <th class="reduce-padding-left">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="checkAll">
                              <label class="form-check-label" for="checkAll">

                              </label>
                            </div>
                          </th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Purchase Date</th>
                          <th>Phone</th>
                          <th>Chat</th>

                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>

                          <td class="pe-0">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="customerNine">
                              <label class="form-check-label" for="customerNine">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-9.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Stephanie Morales</a>
                              </div>
                            </div>
                          </td>
                          <td>stephaniemorales@gmail.com</td>

                          <td>
                            22 Feb, 2023 at 9:47pm
                          </td>
                          <td>812-682-1588</td>
                          <td>
                            <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-chat fs-5"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                    2
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                          </td>

                          <td>
                            <div class="dropdown">
                              <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="feather-icon icon-more-vertical fs-5"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td class="pe-0">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="customerTen">
                              <label class="form-check-label" for="customerTen">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-10.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Stephanie Morales</a>
                              </div>
                            </div>
                          </td>
                          <td>stephaniemorales@gmail.com</td>

                          <td>
                            22 Feb, 2023 at 9:47pm
                          </td>
                          <td>812-682-1588</td>
                          <td>
                            <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-chat fs-5"></i>
                                {{-- <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                    
                                    <span class="visually-hidden">unread messages</span>
                                </span> --}}
                            </a>
                          </td>

                          <td>
                            <div class="dropdown">
                              <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="feather-icon icon-more-vertical fs-5"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>

                          <td class="pe-0">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="customerEleven">
                              <label class="form-check-label" for="customerEleven">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-11.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Pasquale Kidd</a>
                              </div>
                            </div>
                          </td>
                          <td>pasqualekidd@rhyta.com</td>

                          <td>
                            22 Feb, 2023 at 9:47pm
                          </td>
                          <td>336-396-0658</td>
                          <td>
                              <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle"
                                  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bi bi-chat fs-5"></i>
                                  <span
                                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                      3
                                      <span class="visually-hidden">unread messages</span>
                                  </span>
                              </a>
                          </td>

                          <td>
                            <div class="dropdown ">
                              <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="feather-icon icon-more-vertical fs-5"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                  <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                    <span>Showing 1 to 3 of 3 entries</span>
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