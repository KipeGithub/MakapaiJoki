@can('isAdmin')
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 fixed-start" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
                <img src="/img/Logo_Poltekbang_Makassar.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Dashboard AMHS</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class= "w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                        href="{{ route('profile') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile Saya</span>
                    </a>
                </li>
                <li class="nav-item mt-3 d-flex align-items-center">
                    <div class="ps-4">
                        <i class="fa-solid fa-book" style="color: #f4645f;"></i>
                    </div>
                    <h6 class="ms-2 text-uppercase text-xs font-weight-bolder mb-0">Fitur</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'usermgt') == true ? 'active' : '' }}"
                        href="{{ route('usermgt.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Features</h6>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ATS</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'atsmessage') == true ? 'active' : '' }}"
                        href="{{ route('atsmessage.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Free Text</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'fpl') == true ? 'active' : '' }}"
                        href="{{ route('fpl.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-paper-diploma text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">FPL</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">NOTAMN</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'notam') == true ? 'active' : '' }}"
                        href="{{ route('notam.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-map-big text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">NOTAM</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">METEO</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'meteo') == true ? 'active' : '' }}"
                        href="{{ route('meteo.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cloud-download-95 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">METAR (SA)</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'inbox') == true ? 'active' : '' }}"
                        href="{{ route('inbox.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesan Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'searchmessage') == true ? 'active' : '' }}"
                        href="{{ route('outbox.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesan Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'maintenance') == true ? 'active' : '' }}"
                        href="{{ route('maintenance.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Maintenance</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@elsecan ('isUser')
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 fixed-start" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
                <img src="/img/Logo_Poltekbang_Makassar.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Dashboard AMHS</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class= "w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                        href="{{ route('profile') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile Saya</span>
                    </a>
                </li>
                <li class="nav-item mt-3 d-flex align-items-center">
                    <div class="ps-4">
                        <i class="fa-solid fa-book" style="color: #f4645f;"></i>
                    </div>
                    <h6 class="ms-2 text-uppercase text-xs font-weight-bolder mb-0">Fitur</h6>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Features</h6>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ATS</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'atsmessage') == true ? 'active' : '' }}"
                        href="{{ route('atsmessage.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Free Text</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'fpl') == true ? 'active' : '' }}"
                        href="{{ route('fpl.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-paper-diploma text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">FPL</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'notam') == true ? 'active' : '' }}"
                        href="{{ route('notam.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-map-big text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">NOTAM</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">METEO</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'meteo') == true ? 'active' : '' }}"
                        href="{{ route('meteo.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cloud-download-95 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">METAR (SA)</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'inbox') == true ? 'active' : '' }}"
                        href="{{ route('inbox.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesan Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'searchmessage') == true ? 'active' : '' }}"
                        href="{{ route('outbox.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pesan Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'maintenance') == true ? 'active' : '' }}"
                        href="{{ route('maintenance.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Maintenance</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endcan
