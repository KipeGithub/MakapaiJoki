@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md">
                <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terdapat masalah dengan inputan anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="POST" action="{{ route('atsmessage.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">ATS Message Details</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from-user-input" class="form-control-label">From User<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="from_user" value="{{ $message->fromUser->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to-user-input" class="form-control-label">To User<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="to_user" value="{{ $message->toUser->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filling-time-input" class="form-control-label">Filling Time<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="filling_time" value="{{ $message->filling_time }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority-input" class="form-control-label">Priority<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="priority" value="{{ $message->priority }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="free-text-ats-input" class="form-control-label">Free Text ATS <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="free_text_ats" rows="3" readonly>{{ $message->free_text_ats }}</textarea>
                                </div>
                                <div class="form-group">
                                        <label for="file-path-input" class="form-control-label">File: </label>
                                        @if($message->file_path)
                                            <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">Download File</a>
                                        @else
                                            <p>Tidak Ada File Yang Dikirim oleh Pengirim</p>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
