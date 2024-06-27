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
                            <p class="mb-0">METAR Message Details</p>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="message-id-input" class="form-control-label">Message ID<span class="text-danger" readonly>*</span></label>
                                    <div class="d-flex">
                                        <input class="form-control" type="text" name="message_id_part1" value="{{ $message->message_id_part1 }}" style="width: 33.33%; margin-right: 2px;" readonly>
                                        <input class="form-control" type="text" name="message_id_part2" value="{{ $message->message_id_part2 }}" style="width: 33.33%; margin-right: 2px;" readonly>
                                        <input class="form-control" type="text" name="message_id_part3" value="{{ $message->message_id_part3 }}" style="width: 33.33%;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="origin-input" class="form-control-label">Origin<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="origin" value="{{$message->origin }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="issued-input" class="form-control-label">Issued (DDhhmm)<span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" name="issued" value="{{ $message->issued }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type-input" class="form-control-label">Type<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="type" value="{{ $message->type }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="location-input" class="form-control-label">Location<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="location" value="{{ $message->location }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="observed-input" class="form-control-label">Observed (DDhhmm)<span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" name="observed" value="{{ $message->observed }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="free-text-metar-input" class="form-control-label">Free Text Metar<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="free_text_metar" rows="3" readonly>{{ $message->free_text_metar }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file-path-input" class="form-control-label">File</label>
                                    @if($message->file)
                                    <a href="{{ asset('storage/' . $message->file) }}" target="_blank">Download File</a>
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