@extends('layouts.app')

@can ('isAdmin')
    @section('content')
        @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
        <div class="row mt-4 mx-4" >
            <div class="col-12">
                <div class="alert alert-light" role="alert">
                    Fitur ini berfungsi untuk <strong>menambahkan, mengedit, dan menghapus </strong> user/ bandara
                </div>
                <div class="container card mb-4">
                    <div class="row">
                        <div class="col-6 card-header">
                            <h6 class="align-middle mb-0">Daftar Pengguna Layanan</h6>
                        </div>
                        <!-- <div class="col card-header m-0">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Type here...">
                            </div>
                        </div> -->
                        <div class="col-4 card-header">
                            <form action="{{ route('usermgt.index')}}" method="GET">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                    <input type="search" name="searchUser" class="form-control" placeholder="Cari Berdasarkan Username">
                                </div>
                            </form>                            
                        </div>
                        <div class="col-2 card-header">
                            <a class="align-middle mb-0" href="{{ route('usermgt.create')}}">
                                    <button class="btn btn-secondary mb-0 float-end">Tambah</button>
                            </a>
                        </div>
                        
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p class="text-white">{{ $message }}</p>
                        </div>
                        @endif
                        
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <td><p class="text-xxs text-center font-weight-bold mb-0">{{ $users->username }}</p></td>
                                        <td><p class="text-xxs text-center font-weight-bold mb-0">{{ $users->firstname }} {{ $users->lastname }}</p></td>                                    
                                        <td><p class="text-xxs text-center font-weight-bold mb-0">{{ $users->email }}</p></td>                                    
                                        <td><p class="text-xxs text-center font-weight-bold mb-0">{{ $users->about }}</p></td>                                    
                                        <td><p class="text-xxs text-center font-weight-bold mb-0">{{ $users->role }}</p></td>                                    
                                        <td class="align-middle text-center">
                                            <form class="btn-group" action="{{ route('usermgt.destroy', $users)}}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary text-xxs font-weight-bold mt-1 mb-1 cursor-pointer" href="{{ route('usermgt.edit', $users)}}" >
                                                        <i class="fa fa-edit"></i>
                                                </a>
                                                <button onclick="return confirm('Yakin hapus data?')" type="submit" class="btn btn-danger text-xxs font-weight-bold mt-1 mb-1 cursor-pointer rounded-0">
                                                        <i class="fa fa-trash"></i>
                                                </button>
                                            </form> 
                                            <!-- <a class="text-xxs font-weight-bold mt-1 mb-1 ps-2 cursor-pointer" href="{{ route('usermgt.edit', $users)}}" >
                                                <button class="btn btn-warning mb-0">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <form class="" action="{{ route('usermgt.destroy', $users)}}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <a class="text-xxs font-weight-bold mb-0 ps-2 cursor-pointer">
                                                    <button class="btn btn-danger mb-0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
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