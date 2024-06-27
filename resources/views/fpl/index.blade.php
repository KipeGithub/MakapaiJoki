@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <h4>Sender Identity</h1>
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? '' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->role ?? "Role tidak terdifinisi!" }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                </div>
        </div>
    </div>
</div>
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
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('fpl.store') }}">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Buat Pesan FPL</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from-input" class="form-control-label">From User<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="fromuser" value="{{ Auth::user()->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to-input" class="form-control-label">To User<span class="text-danger">*</span></label>
                                    <select class="form-control chosen-select" name="to_user_id[]" multiple="multiple">
                                        <option value="all">Pilih Semua</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filling-time-input" class="form-control-label">Filling Time<span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" id="filling-time-input" name="filling_time" value="{{ now() }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority-input" class="form-control-label">Priority<span class="text-danger">*</span></label>
                                    <select class="form-control" name="priority">
                                        <option value="SS">SS</option>
                                        <option value="FF">FF</option>
                                        <option value="DD">DD</option>
                                        <option value="GG">GG</option>
                                        <option value="KK">KK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message-type-input" class="form-control-label">Message Type:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="message_type" value="{{ old('message_type') }}" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label for="number-input" class="form-control-label">Number:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="number" value="{{ old('number') }}" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label for="reference-data-input" class="form-control-label">Reference Data:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="reference_data" value="{{ old('reference_data') }}" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label for="aircraft-id-input" class="form-control-label">Aircraft ID:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="aircraft_id" value="{{ old('aircraft_id') }}" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">SSR Mode, Code, Flight Rules, Type of Flight<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="text" name="ssr_mode" value="{{ old('ssr_mode') }}" placeholder="SSR Mode" style="width: 25%;">
                                        <input class="form-control" type="text" name="ssr_code" value="{{ old('ssr_code') }}" placeholder="Code" style="width: 25%;">
                                        <input class="form-control" type="number" name="flight_rules" value="{{ old('flight_rules') }}" placeholder="Flight Rules" style="width: 25%;">
                                        <input class="form-control" type="number" name="type_of_flight" value="{{ old('type_of_flight') }}" placeholder="Type of Flight" style="width: 25%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Number, Type of Aircraft<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="number" name="number_aircraft" value="{{ old('number') }}" placeholder="Number" style="width: 50%;">
                                        <input class="form-control" type="text" name="type_of_aircraft" value="{{ old('type_of_aircraft') }}" placeholder="Type of Aircraft" style="width: 50%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Wake Turb Cat<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="number" name="wake_turb_cat" value="{{ old('wake_turb_cat') }}" placeholder="Wake Turb Cat" style="width: 33.33%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Equipment<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="text" name="equipment_1" value="{{ old('equipment_1') }}" placeholder="" style="width: 33.33%;">
                                        <div>/</div>
                                        <input class="form-control" type="text" name="equipment_2" value="{{ old('equipment_2') }}" placeholder="" style="width: 33.33%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Departure:<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="text" id="depad" name="depad" value="{{ old('depad') }}" placeholder="Depad" style="width: 50%;">
                                        <input class="form-control" type="text" name="time" value="{{ now() }}" placeholder="Time" style="width: 50%;" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Cruising:<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="text" name="cruising_speed" id="cruising_speed" value="{{ old('cruising_speed') }}" placeholder="Cruising Speed" style="width: 50%;" readonly>
                                        <input class="form-control" type="text" name="level" id="level" value="{{ old('level') }}" placeholder="Level" style="width: 50%;" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="route-input" class="form-control-label">Route:<span class="text-danger">*</span></label>
                                    <textarea readonly class="form-control" name="route" id="route" rows="3" style="width: 100%;">{{ old('route') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Destination Details:<span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-control" type="text" id="dest_ad" name="dest_ad" value="{{ old('dest_ad') }}" placeholder="Dest Ad" style="width: 25%;">
                                        <input class="form-control" type="text" name="total_set_hh_min" value="{{ old('total_set_hh_min') }}" placeholder="Total Set HH Min" style="width: 25%;">
                                        <input class="form-control" type="text" name="altn_ad" value="{{ old('altn_ad') }}" placeholder="ALTN AD" style="width: 25%;">
                                        <input class="form-control" type="text" name="second_altn_ad" value="{{ old('second_altn_ad') }}" placeholder="2nd ALTN AD" style="width: 25%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info btn-sm" id="getRouteBtn">Get Route<span class="text-danger">*</span></button>
                                </div>
                                <button type="reset" class="btn btn-secondary btn-sm">Reset Form</button>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Kirim Pesan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>

<script>
    window.onload = function() {
        var localDateTime = new Date().toISOString().slice(0, 16); // Mengambil waktu saat ini dan memformatnya sesuai input datetime-local
        var fillingTimeInput = document.getElementById('filling-time-input');
        if (!fillingTimeInput.value) {
            fillingTimeInput.value = localDateTime; // Hanya mengatur waktu jika belum ada nilai yang di-set
        }
    };
</script>
<script>
    document.getElementById('getRouteBtn').addEventListener('click', function() {
        var depad = document.getElementById('depad').value;
        var dest_ad = document.getElementById('dest_ad').value;

        // Kirim permintaan AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);

                // Isi nilai ke input text area route, input text level, dan input text cruising speed
                document.getElementById('route').value = data.routes;
                document.getElementById('level').value = data.flight_level;
                // document.getElementById('cruising_speed').value = data.speed;
            }
        };
        xhr.open('GET', '/get-route?depad=' + depad + '&dest_ad=' + dest_ad, true);
        xhr.send();
    });
</script>
<!-- Chosen JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi Chosen
        $('.chosen-select').chosen({
            width: '100%'
        });

        // Pilih Semua Opsi
        $('.chosen-select').on('change', function(evt, params) {
            if (params.selected === 'all') {
                // Pilih semua opsi
                $('.chosen-select > option').prop('selected', true);
                $('.chosen-select').trigger('chosen:updated');
            } else if (params.deselected === 'all') {
                // Hapus semua opsi
                $('.chosen-select > option').prop('selected', false);
                $('.chosen-select').trigger('chosen:updated');
            }
        });
    });
</script>
@endsection