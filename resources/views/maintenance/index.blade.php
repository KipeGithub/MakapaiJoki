@extends('layouts.app')

@can ('isAdmin')
    @section('content')
        @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Statistik Storage A</p>
                                        <h5 class="font-weight-bolder">
                                        used {{ number_format($diskCUsagePercent, 2) }} %
                                        </h5>
                                        <p class="mb-0">
                                            Merupakan data jumlah penyimpanan yang digunakan pada storage A
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-primary text-center rounded-circle">
                                        <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Statistik Storage B</p>
                                        <h5 class="font-weight-bolder">
                                            used {{ number_format($diskDUsagePercent, 2) }} %
                                        </h5>
                                        <p class="mb-0">
                                            Merupakan data jumlah penyimpanan yang digunakan pada storage B
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @include('layouts.footers.auth.footer')
        </div>
    @endsection

@elsecan ('isUser')
    @section('content')
        @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
        <div class="row mt-4 mx-4" overflow-x: hidden;>
            <div class="col-12">
                <div class="alert alert-light" role="alert">
                    <strong>ANDA TIDAK MEMILIKI AKSES FITUR INI!</strong>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    @endsection
@endcan