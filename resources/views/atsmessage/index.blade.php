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
                <form role="form" method="POST" action="{{ route('atsmessage.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Buat pesan ATS</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from-input" class="form-control-label">From User<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="from" value="{{ Auth::user()->username }}" readonly>
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
                                    <label for="filling-time-input" class="form-control-label">Filling Time <span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" id="filling-time-input" name="filling_time" value="{{ now() }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority-input" class="form-control-label">Priority <span class="text-danger">*</span></label>
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
                                    <label for="free-text-ats-input" class="form-control-label">Free Text ATS <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="free_text_ats" rows="3">{{ old('free_text_ats') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file-input" class="form-control-label">Upload File:</label>
                                    <input class="form-control" type="file" id="file-input" name="file">
                                </div>
                            </div>
                            <h6><span class="text-danger">*</span> = wajib diisi </h6>

                            <button type="reset" class="btn btn-secondary btn-sm">Reset Form</button>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
                <!-- <form role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Buat pesan ATS</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from-input" class="form-control-label">From</label>
                                        <input class="form-control" type="text" name="from" value="{{ old('from') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to-input" class="form-control-label">To</label>
                                        <select class="form-control" name="to">
                                            <option value="XX">XX</option>
                                            <option value="YY">YY</option>
                                            <option value="ZZ">ZZ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="filling-time-input" class="form-control-label">Filling Time</label>
                                        <input class="form-control" type="datetime-local" id="filling-time-input" name="filling_time" value="{{ old('filling_time') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority-input" class="form-control-label">Priority</label>
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
                                        <label for="free-text-ats-input" class="form-control-label">Free Text ATS</label>
                                        <textarea class="form-control" name="free_text_ats" rows="3">{{ old('free_text_ats') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file-input" class="form-control-label">Upload File:</label>
                                        <input class="form-control" type="file" id="file-input" name="file">
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-secondary btn-sm">Reset Form</button>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Kirim Pesan</button>
                            </div>
                        </div>
                    </form> -->
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