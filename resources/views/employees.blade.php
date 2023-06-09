@php
    $activePage = 'employees'; // nilai sesuaikan dengan halaman yang sedang aktif
@endphp
@extends('layouts.main')

@section('main-content')
      <main class="main-content-wrapper">
        <div class="container">
          <div class="row mb-8">
            <div class="col-md-12">
              <div class="d-md-flex justify-content-between align-items-center">
                <div>
                  <h2>Employees</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Employees</li>
                    </ol>
                  </nav>
                </div>
                <div>
                  <a href="#!" class="btn btn-primary">Add New Employee</a>
                </div>
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
                        <input class="form-control" type="search" placeholder="Search Employees" aria-label="Search">

                      </form>
                    </div>

                  </div>
                </div>
                <div class="card-body p-0 ">

                  <div class="table-responsive">
                    <table
                      class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap" >
                      <thead class="bg-light">
                        <tr>
                          <th>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="checkAll">
                              <label class="form-check-label" for="checkAll">

                              </label>
                            </div>
                          </th>
                          <th>Name</th>
                          <th class="text-nowrap" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;">Email</th>
                          <th>Position</th>
                          <th>Phone</th>
                       

                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="employeeOne">
                              <label class="form-check-label" for="employeeOne">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-1.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Bonnie Howe</a>
                              </div>
                            </div>
                          </td>
                          <td class="text-nowrap" style="max-width: 90px; overflow: hidden; text-overflow: ellipsis;">bonniehowe@gmail.comddddddddddddddddddddddddddddd</td>

                          <td>
                            <span class="badge bg-light-primary text-dark-primary">SuperVisor</span>
                          </td>
                          <td>-</td>
                       

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeTwo">
                              <label class="form-check-label" for="employeeTwo">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-2.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Judy Nelson</a>
                              </div>
                            </div>
                          </td>
                          <td>judynelson@gmail.com</td>

                          <td>
                            <span class="badge bg-light-danger text-dark-primary">Worker</span>
                          </td>
                          <td>435-239-6436</td>
                        

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeThree">
                              <label class="form-check-label" for="employeeThree">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-3.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">John Mattox</a>
                              </div>
                            </div>
                          </td>
                          <td>johnmattox@gmail.com</td>

                          <td>
                            <span class="badge bg-light-success text-dark-primary">Manager</span>
                          </td>
                          <td>347-424-9526</td>
                         

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeFour">
                              <label class="form-check-label" for="employeeFour">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-4.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Wayne Rossman</a>
                              </div>
                            </div>
                          </td>
                          <td>waynerossman@gmail.com</td>

                          <td>
                            <span class="badge bg-light-danger text-dark-primary">Worker</span>
                          </td>
                          <td>-</td>
                       

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeFive">
                              <label class="form-check-label" for="employeeFive">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-5.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Rhonda Pinson</a>
                              </div>
                            </div>
                          </td>
                          <td>rhondapinson@gmail.com</td>

                          <td>
                            <span class="badge bg-light-warning text-dark-primary">Cashier</span>
                          </td>
                          <td>304-471-8451</td>
                  

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeSix">
                              <label class="form-check-label" for="employeeSix">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-6.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">John Mattox</a>
                              </div>
                            </div>
                          </td>
                          <td>johnmattox@gmail.com</td>

                          <td>
                            <span class="badge bg-light-danger text-dark-primary">Worker</span>
                          </td>
                          <td>410-636-2682</td>
                    

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeSeven">
                              <label class="form-check-label" for="employeeSeven">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-7.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Wayne Rossman</a>
                              </div>
                            </div>
                          </td>
                          <td>waynerossman@gmail.com</td>

                          <td>
                            <span class="badge bg-light-success text-dark-primary">Manager</span>
                          </td>
                          <td>845-294-6681</td>
                       

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
                              <input class="form-check-input" type="checkbox" value="" id="employeeEight">
                              <label class="form-check-label" for="employeeEight">

                              </label>
                            </div>
                          </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <img src="images/avatar/avatar-8.jpg" alt=""
                                class="avatar avatar-xs rounded-circle">
                              <div class="ms-2">
                                <a href="#" class="text-inherit">Richard Shelton</a>
                              </div>
                            </div>
                          </td>
                          <td>richarddhelton@jourrapide.com</td>

                          <td>
                            <span class="badge bg-light-danger text-dark-primary">Worker</span>
                          </td>
                          <td>313-887-8495</td>
                    
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
                      
                      </tbody>
                    </table>

                  </div>

                  <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                    <span>Showing 1 to 8 of 12 entries</span>
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