<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image">
            </figure>
            <div class="user-info">
                <img src="{{ asset('assets/img/profile-17.jpeg') }}" alt="avatar">
                <h6 class="">Admin</h6>
                <p class="">Administrator</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'dashboard' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span> Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::segment(1) == 'kriteria' ? 'active' : '' }}">
                <a href="{{ route('kriteria') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'kriteria' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg>
                        <span> Data Kriteria</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::segment(1) == 'alternatif' ? 'active' : '' }}">
                <a href="{{ route('alternatif') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'alternatif' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-image">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                        <span> Data Alternatif</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::segment(1) == 'penilaian' ? 'active' : '' }}">
                <a href="{{ route('penilaian') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'penilaian' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bar-chart-2">
                            <line x1="18" y1="20" x2="18" y2="10" />
                            <line x1="12" y1="20" x2="12" y2="4" />
                            <line x1="6" y1="20" x2="6" y2="14" />
                        </svg>
                        <span> Data Penialain</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::segment(1) == 'perangkingan' ? 'active' : '' }}">
                <a href="{{ route('perangkingan') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'perangkingan' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-pie-chart">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
                            <path d="M22 12A10 10 0 0 0 12 2v10z" />
                        </svg>
                        <span> Data Perangkingan</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::segment(1) == 'result' ? 'active' : '' }}">
                <a href="{{ route('result') }}" wire:navigate
                    aria-expanded="{{ Request::segment(1) == 'result' ? 'true' : '' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2" />
                            <polyline points="2 17 12 22 22 17" />
                            <polyline points="2 12 12 17 22 12" />
                        </svg>
                        <span> Data Hasil Akhir</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

</div>
