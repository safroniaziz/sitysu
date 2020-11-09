<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu menu-heading mt-4 mb-3">
                <span class="heading">MENU UTAMA</span>
            </li>

            <li class="menu">
                <a href="{{ route('beranda') }}" aria-expanded="false" class="dropdown-toggle" {{ request()->is('/') ? 'data-active=true' : '' }}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Beranda</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('surat') }}" aria-expanded="false" class="dropdown-toggle" {{ request()->is('surat/*') ? 'data-active=true' : '' }}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span>Surat</span>
                    </div>
                </a>
            </li>

            @hasrole('admin')
            <li class="menu">
                <a href="#app" data-toggle="collapse" class="dropdown-toggle" {{ request()->is('manajemen-user/*') ? 'data-active=true aria-expanded=true' : '' }}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Manajemen User</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->is('manajemen-user/*') ? 'show' : '' }}" id="app" data-parent="#accordionExample">
                    <li class="{{ request()->is('manajemen-user/satuan-kerja/*') ? 'active' : '' }}">
                        <a href="{{ route('satuan.kerja') }}" aria-expanded="false" class="dropdown-toggle" {{ request()->is('satuan-kerja') ? 'data-active=true' : '' }}> Satuan Kerja </a>
                    </li>
                    <li class="{{ request()->is('manajemen-user/data-user/*') ? 'active' : '' }}">
                        <a href="{{ route('manajemen.user') }}" aria-expanded="false" class="dropdown-toggle"> Data User  </a>
                    </li>
                </ul>
            </li>
            @endhasrole

            {{-- <li class="menu menu-heading mt-4 mb-3">
                <span class="heading">BANTUAN</span>
            </li>

            <li class="menu">
                <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span>Tentang</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <span>Petunjuk</span>
                    </div>
                </a>
            </li> --}}

            <li class="menu menu-heading mt-4 mb-3">
                <span class="heading">Pengaturan</span>
            </li>

            <li class="menu">
                <a href="{{ route('profil') }}" aria-expanded="false" class="dropdown-toggle" {{ request()->is('profil') ? 'data-active=true' : '' }}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span>Profil</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('ubah.password') }}" aria-expanded="false" class="dropdown-toggle" {{ request()->is('ubah-password') ? 'data-active=true' : '' }}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <span>Ubah Password</span>
                    </div>
                </a>
            </li>

        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->