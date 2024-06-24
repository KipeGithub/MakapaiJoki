<!-- resources/views/inbox/show_notam.blade.php -->
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
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">NOTAM Message Details</p>
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
                                        <label for="message-series-input" class="form-control-label">Message Series:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="message_series_0" value="{{ $message->message_series_0 }}" style="width: 50%;" readonly >
                                            <input class="form-control" type="text" name="message_series_1" value="{{ $message->message_series_0 }}" style="width: 50%;" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="number-input" class="form-control-label">Number:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="number_0" value="{{ $message->number_0 }}" style="width: 30%;" readonly>
                                            <input class="form-control" type="number" name="number_1" value="{{ $message->number_1 }}" min="0" style="width: 30%;" readonly >
                                            <input class="form-control" type="text" name="number_2" value="{{ $message->number_2 }}" style="width: 30%;" readonly >
                                            <input class="form-control" type="text" name="number_3" value="{{ $message->number_3 }}" style="width: 30%;" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="identified-input" class="form-control-label">Identified:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="identified" value="{{ $message->identified }}" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="fir-input" class="form-control-label">FIR:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="fir" value="{{ $message->fir }}" style="width: 30%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notam-code-input" class="form-control-label">Notam Code:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="notam_code_0" value="{{ $message->notam_code_0 }}" style="width: 30%;" readonly>
                                            <input class="form-control" type="text" name="notam_code_1" value="{{ $message->notam_code_1 }}" style="width: 30%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="traffic-input" class="form-control-label">Traffic:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="traffic" value="{{ $message->traffic }}" style="width: 30%;" readonly>
                                        <label for="purpose-input" class="form-control-label">Purpose:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="purpose" value="{{ $message->purpose }}" style="width: 30%;" readonly>
                                        <label for="scope-input" class="form-control-label">Scope:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="scope" value="{{ $message->scope }}" style="width: 30%;" readonly>
                                        <label for="lower-limit-input" class="form-control-label">Lower Limit:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lower_limit" value="{{ $message->lower_limit }}" style="width: 30%;" readonly>
                                        <label for="upper-limit-input" class="form-control-label">Upper Limit:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="upper_limit" value="{{ $message->upper_limit }}" style="width: 30%;" readonly>
                                        <label for="coordinates-input" class="form-control-label">Coordinates:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="coordinates" value="{{ $message->coordinates }}" style="width: 30%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="location-input" class="form-control-label">Location:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="location_0" value="{{ $message->location_0 }}" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="location_1" value="{{ $message->location_1 }}" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="location_2" value="{{ $message->location_2 }}" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="location_3" value="{{ $message->location_3 }}" style="width: 25%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="from-input" class="form-control-label">From:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="from" value="{{ $message->from }}" style="width: 50%;" readonly>
                                        <label for="to-input" class="form-control-label">To:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="to" value="{{ $message->to }}" style="width: 50%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="YYMMDDhhmm" class="form-control-label">YYMMDDhhmm<span class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" id="YYMMDDhhmm" name="fYYMMDDhhmm" value="{{ $message->fYYMMDDhhmm }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="number-input" class="form-control-label">(EST/PERM)<span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="estperm" value="{{ $message->estperm }}" min="0" style="width: 30%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="time-schedule-input" class="form-control-label">Time Schedule:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="time_schedule" value="{{ $message->time_schedule }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="text-of-notam-input" class="form-control-label">Text of NOTAM:<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="text_of_notam" rows="3" readonly>{{ $message->text_of_notam }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file-path-input" class="form-control-label">File</label>
                                        @if($message->file_path)
                                            <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank">Download File</a>
                                        @else
                                            <p>Tidak Ada File Yang Dikirim oleh Pengirim</p>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
