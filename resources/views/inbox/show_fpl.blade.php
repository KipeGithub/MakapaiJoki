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
                            <p class="mb-0">FPL Message Details</p>
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
                                        <label for="message-type-input" class="form-control-label">Message Type:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="message_type" value="{{ $message->message_type }}" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="number-input" class="form-control-label">Number:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="number" value="{{ $message->number }}" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="reference-data-input" class="form-control-label">Reference Data:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="reference_data" value="{{ $message->reference_data }}" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="aircraft-id-input" class="form-control-label">Aircraft ID:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="aircraft_id" value="{{ $message->aircraft_id }}" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">SSR Mode, Code, Flight Rules, Type of Flight<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="ssr_mode" value="{{ $message->ssr_mode }}" placeholder="SSR Mode" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="ssr_code" value="{{ $message->ssr_code }}" placeholder="Code" style="width: 25%;" readonly>
                                            <input class="form-control" type="number" name="flight_rules" value="{{ $message->flight_rules }}" placeholder="Flight Rules" style="width: 25%;" readonly>
                                            <input class="form-control" type="number" name="type_of_flight" value="{{ $message->flight }}" placeholder="Type of Flight" style="width: 25%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Number, Type of Aircraft<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="number" name="number_aircraft" value="{{ $message->number_aircraft }}" placeholder="Number" style="width: 50%;" readonly>
                                            <input class="form-control" type="text" name="type_of_aircraft" value="{{ $message->type_of_aircraft }}" placeholder="Type of Aircraft" style="width: 50%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Wake Turb Cat<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="number" name="wake_turb_cat" value="{{ $message->wake_turb_cat }}" placeholder="Wake Turb Cat" style="width: 33.33%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Equipment<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="equipment_1" value="{{ $message->equipment_1 }}" placeholder="" style="width: 33.33%;" readonly>
                                            <div>/</div>
                                            <input class="form-control" type="text" name="equipment_2" value="{{ $message->equipment_2 }}" placeholder="" style="width: 33.33%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Departure:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" id="depad" name="depad" value="{{ $message->depad }}" placeholder="Depad" style="width: 50%;" readonly>
                                            <input class="form-control" type="text" name="time" value="{{ $message->time }}" placeholder="Time" style="width: 50%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Cruising:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="cruising_speed" id="cruising_speed" value="{{ $message->cruising_speed }}" placeholder="Cruising Speed" style="width: 50%;" readonly>
                                            <input class="form-control" type="text" name="level" id="level" value="{{ $message->level }}" placeholder="Level" style="width: 50%;" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="route-input" class="form-control-label">Route:<span class="text-danger">*</span></label>
                                        <textarea readonly class="form-control" name="route" id="route" rows="3" style="width: 100%;" readonly>{{ $message->route }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Destination Details:<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" id="dest_ad" name="dest_ad" value="{{ $message->dest_ad }}" placeholder="Dest Ad" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="total_set_hh_min" value="{{ $message->total_set_hh_min }}" placeholder="Total Set HH Min" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="altn_ad" value="{{ $message->altn_ad }}" placeholder="ALTN AD" style="width: 25%;" readonly>
                                            <input class="form-control" type="text" name="second_altn_ad" value="{{ $message->second_altn_ad }}" placeholder="2nd ALTN AD" style="width: 25%;" readonly>
                                        </div>
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
