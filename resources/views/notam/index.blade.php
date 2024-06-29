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
                                {{ auth()->user()->role ?? 'Role tidak terdifinisi!' }}
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
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('notam.store') }}">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Buat pesan NOTAM</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from-input" class="form-control-label">From User<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fromuser"
                                            value="{{ Auth::user()->username }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to-input" class="form-control-label">To User<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control chosen-select" name="to_user_id[]" multiple="multiple">
                                            <option value="all">Pilih Semua</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="filling-time-input" class="form-control-label">Filling Time<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" id="filling-time-input"
                                            name="filling_time" value="{{ now() }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority-input" class="form-control-label">Priority<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="priority">
                                            <option value="SS">SS</option>
                                            <option value="FF">FF</option>
                                            <option value="DD">DD</option>
                                            <option value="GG">GG</option>
                                            <option value="KK">KK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-series-input" class="form-control-label">Message Series:<span
                                                class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="message_series_0"
                                                value="NOTAMN" readonly>
                                            <input class="form-control" type="text" name="message_series_1"
                                                value="{{ old('message_series.1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number-input" class="form-control-label">Number:<span
                                                class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="number_0"
                                                value="{{ old('number.0') }}">
                                            <input class="form-control" type="number" name="number_1"
                                                value="{{ old('number.1') }}" min="0">
                                            <input class="form-control" type="text" name="number_2"
                                                value="{{ old('number.2') }}">
                                            <input class="form-control" type="text" name="number_3"
                                                value="{{ old('number.3') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="identified-input" class="form-control-label">Identified:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="identified"
                                            value="{{ old('identified') }}" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="fir-input" class="form-control-label">FIR:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fir"
                                            value="{{ old('fir') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="notam-code-input" class="form-control-label">Notam Code:<span
                                                class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-control" type="text" name="notam_code_0"
                                                value="{{ old('notam_code.0') }}">
                                            <input class="form-control" type="text" name="notam_code_1"
                                                value="{{ old('notam_code.1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="traffic-input" class="form-control-label">Traffic:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="traffic"
                                            value="{{ old('traffic') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="purpose-input" class="form-control-label">Purpose:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="purpose"
                                            value="{{ old('purpose') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="scope-input" class="form-control-label">Scope:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="scope"
                                            value="{{ old('scope') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="lower-limit-input" class="form-control-label">Lower Limit:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lower_limit"
                                            value="{{ old('lower_limit') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="upper-limit-input" class="form-control-label">Upper Limit:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="upper_limit"
                                            value="{{ old('upper_limit') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="coordinates-input" class="form-control-label">Coordinates:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="coordinates" id="coordinates"
                                            value="{{ old('coordinates') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="location-input" class="form-control-label">Location:<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="location_0" id="location-dropdown">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->koordinate }}">{{ $location->lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="from-input" class="form-control-label">From:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" name="from" id="from-input"
                                            value="{{ old('from') }}">
                                        {{-- <small class="form-text text-muted">Format: yyyy-mm-ddThh:mm</small> --}}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="from-input" class="form-control-label">To:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" name="to" id="from-input"
                                            value="{{ old('to') }}">
                                        {{-- <small class="form-text text-muted">Format: yyyy-mm-ddThh:mm</small> --}}
                                    </div>
                                </div>

                                {{-- <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="to-input" class="form-control-label">To:<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="to"
                                            value="{{ old('to') }}">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="YYMMDDhhmm" class="form-control-label">YYMMDDhhmm<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="datetime-local" id="YYMMDDhhmm"
                                            name="fYYMMDDhhmm" value="{{ now() }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estperm-select" class="form-control-label">(EST/PERM)<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="estperm" id="estperm-select" required>
                                            <option value="">Select Option</option>
                                            <option value="PERMANEN">Permanen</option>
                                            <option value="EST">Estimasi (EST)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="end-activity-container" style="display: none;">
                                    <div class="form-group">
                                        <label for="end-date" class="form-control-label">End of Activity:</label>
                                        <input class="form-control" type="datetime-local" name="end_date"
                                            id="end-date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time-schedule-input" class="form-control-label">Time
                                            Schedule:<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="time_schedule"
                                            value="{{ old('time_schedule') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="text-of-notam-input" class="form-control-label">Text of
                                            NOTAM:<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="text_of_notam" rows="3">{{ old('text_of_notam') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file-input" class="form-control-label">Upload File:</label>
                                        <input class="form-control" type="file" id="file-input" name="file">
                                    </div>
                                    <h6><span class="text-danger">*</span> = wajib diisi </h6>
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
            var localDateTime = new Date().toISOString().slice(0,
                16); // Mengambil waktu saat ini dan memformatnya sesuai input datetime-local
            var fillingTimeInput = document.getElementById('filling-time-input');
            if (!fillingTimeInput.value) {
                fillingTimeInput.value = localDateTime; // Hanya mengatur waktu jika belum ada nilai yang di-set
            }
        };
    </script>
    <!-- Chosen JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script>
        document.getElementById('estperm-select').addEventListener('change', function() {
            const endDateContainer = document.getElementById('end-activity-container');
            if (this.value === 'EST') {
                endDateContainer.style.display = 'block';
            } else {
                endDateContainer.style.display = 'none';
                document.getElementById('end-date').value = '';
            }
        });
        document.getElementById('location-dropdown').addEventListener('change', function() {
            const selectedCoordinates = this.value;
            document.getElementById('coordinates').value = selectedCoordinates;
        });

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
