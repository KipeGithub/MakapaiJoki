@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto ">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-center">
                                    <img src="{{ asset('img/Logo_Poltekbang_Makassar.png')}}" alt="" style="width: 100%; height: auto;">
                                    <h4 class="font-weight-bolder">Log in</h4>
                                    <p class="mb-0">Masukkan email terdaftar dan password anda untuk masuk</p>
                                </div>
                                <div class="card-body bg-white">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" aria-label="Email" placeholder="Masukkan email terdaftar">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" placeholder="Masukkan password akun anda">
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Ingat login saya</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1 bg-white">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://images.unsplash.com/photo-1610642372677-bcddb69f3531?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"ATS MESSAGE HANDLING SYSTEM (AMHS)"</h4>
                                <p class="text-white position-relative">Sistem penanganan pesan ATS adalah infrastruktur yang digunakan untuk mengelola dan menganalisis pesan dari berbagai sumber guna mendukung pengambilan keputusan dalam konteks penerbangan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
