@extends('admin.layout.app')

@section('content')


  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Technical Ransaini</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Applicant</h6>
                                        <h2 class="my-2">10</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">New Applicant</h6>
                                        <h2 class="my-2">20</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-secondary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Progress Applicant</h6>
                                        <h2 class="my-2">30</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-success">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Approved Applicant</h6>
                                        <h2 class="my-2">40</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                             <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Admit Card Generated Applicant</h6>
                                        <h2 class="my-2">50</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->




                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class=" widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Rejected Applicant</h6>
                                        <h2 class="my-2">60</h2>
                                        <p class="mb-0">
                                            {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>

                        

@endsection