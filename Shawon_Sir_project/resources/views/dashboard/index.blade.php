@extends('layouts.main')

@section('content')


    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>TMS</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
              
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                    <a href="{{route('count.filter')}}" class="btn btn-primary">Count & view</a>
            </div>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#06b6d4;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$rangpur_count}}</h3></center>
                                <center><p class="fs-5 text-white">Rangpur Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#0e7490;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#7c3aed;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$shylet_count}}</h3></center>
                                <center><p class="fs-5 text-white">Shylet Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#5b21b6;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#14b8a6;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$barisal_count}}</h3></center>
                                <center><p class="fs-5 text-white">Barishal Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#0f766e;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#d97706;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$dhaka_count}}</h3></center>
                                <center><p class="fs-5 text-white">Dhaka Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#92400e;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#e11d48;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$chittagong_count}}</h3></center>
                                <center><p class="fs-5 text-white">Chittagong Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#9f1239;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#2563eb;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$rajshahi_count}}</h3></center>
                                <center><p class="fs-5 text-white">Rajshahi Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#1e40af;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#d946ef;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$mymonshingh_count}}</h3></center>
                                <center><p class="fs-5 text-white">Mymonshingh Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#a21caf;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-3 ">
                        <div class="pt-3 shadow-sm rounded" style="background-color:#d946ef;">
                            <div>
                                <center><h3 class="fs-2 text-white">{{$khulna_count}}</h3></center>
                                <center><p class="fs-5 text-white">Khulna Division all</p></center>
                                
                            </div>
                            <div class="p-2" style="background-color:#a21caf;"><center><a href="" class="" >View all <span><i class="fa-solid fa-arrow-right"></i></span></a></center></div>
                    
                        </div>
                    </div>

                    
                    
                </div>





                <!-- total in table  -->
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">All Trainee</h3>
                    <div class="col">
                        <div class="text-end">
                            <button type="button" class="btn btn-primary mb-3">
                             Total Trainee <span class="bg-white text-dark px-1 rounded-3">{{$total_trainee_count}}</span>
                           </button>
                        </div>
                       <div class="card">
                            <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Office </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainee as $t)
                                    <tr>
                                    <th scope="row">{{$t->id}}</th>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->email}}</td>
                                    <td>{{$t->sitename_bn}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
                    {{ $trainee->links() }}
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>


    <style>
        a{
          text-decoration:none;
          color:white;  
        }
        a:hover{
            color:blue;
        }
    </style>


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>


@endsection
