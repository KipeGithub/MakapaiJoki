@extends('layouts.app')

@can ('isAdmin')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="alert alert-light" role="alert">
            Fitur ini berfungsi untuk <strong> melihat pesan (message) yang keluar </strong> dari user/ bandara diluar anda.
        </div>
        <div class="container card mb-4">
            <div class="row">
                <div class="col-8 card-header">
                    <h6 class="align-middle mb-0">DAFTAR PESAN KELUAR (OUTBOX) </h6>
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
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Alamat Kirim</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pesan</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Waktu Pengiriman</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                            @php
                            // Tentukan URL berdasarkan jenis pesan
                            $url = '';
                            switch ($message->type) {
                            case 'ATS':
                            $url = url('/inbox/ats/' . $message->id);
                            break;
                            case 'FPL':
                            $url = url('/inbox/fpl/' . $message->id);
                            break;
                            case 'METAR':
                            $url = url('/inbox/metar/' . $message->id);
                            break;
                            case 'NOTAM':
                            $url = url('/inbox/notam/' . $message->id);
                            break;
                            }
                            @endphp
                            <tr>
                                <td>
                                    <p class="text-xxs text-center font-weight-bold mb-0">{{ $message->from_username }}</p>
                                </td>
                                <td>
                                    <p class="text-xxs text-center font-weight-bold mb-0">{{ $message->type }}</p>
                                </td>
                                <td>
                                    <p class="text-xxs text-center font-weight-bold mb-0">{{ $message->filling_time }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <form class="btn-group" action="{{ url('/inbox/delete/' . $message->type . '/' . $message->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info text-xxs font-weight-bold mt-1 mb-1 cursor-pointer" href="{{ $url }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button onclick="return confirm('Yakin hapus data?')" type="submit" class="btn btn-danger text-xxs font-weight-bold mt-1 mb-1 cursor-pointer rounded-0">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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