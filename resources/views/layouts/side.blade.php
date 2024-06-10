<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{asset('baznaslogo.png')}}" alt="">
            <span class="d-none d-lg-block">{{config('app.name')}}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->username}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->username}}</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{url('keluar')}}" method="post" id="logout">
                            @csrf
                            <button type="button" class="dropdown-item d-flex align-items-center" onclick="logout()">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{url('admin/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/kelola-upz','admin/kelola-muzaki','admin/kelola-mustahiq','admin/kelola-pemasukan','admin/kelola-distribusi') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kelola</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content {{ Request::is('admin/kelola-upz','admin/kelola-muzaki','admin/kelola-mustahiq','admin/kelola-pemasukan','admin/kelola-distribusi') ? '' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ Request::is('admin/kelola-upz') ? 'active' : '' }}" href="{{url('admin/kelola-upz')}}">
                        <span>Kelola Pengguna</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('admin/kelola-muzaki') ? 'active' : '' }}" href="{{url('admin/kelola-muzaki')}}">
                        <span>Kelola Muzaki</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('admin/kelola-mustahiq') ? 'active' : '' }}" href="{{url('admin/kelola-mustahiq')}}">
                        <span>Kelola Mustahiq</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('admin/kelola-pemasukan') ? 'active' : '' }}" href="{{url('admin/kelola-pemasukan')}}">
                        <span>Kelola Pemasukan</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('admin/kelola-distribusi') ? 'active' : '' }}" href="{{url('admin/kelola-distribusi')}}">
                        <span>Kelola Distribusi</span>
                    </a>
                </li>
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link {{ Request::is('upz/dashboard') ? '' : 'collapsed' }}" href="{{url('upz/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('upz/data-upz','upz/kelola-muzaki','upz/kelola-mustahiq','upz/kelola-pemasukan','upz/kelola-distribusi') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kelola</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content {{ Request::is('upz/data-upz','upz/kelola-muzaki','upz/kelola-mustahiq','upz/kelola-pemasukan','upz/kelola-distribusi') ? '' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ Request::is('upz/data-upz') ? 'active' : '' }}" href="{{url('upz/data-upz')}}">
                        <span>Kelola Akun</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('upz/kelola-muzaki') ? 'active' : '' }}" href="{{url('upz/kelola-muzaki')}}">
                        <span>Kelola Muzaki</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('upz/kelola-mustahiq') ? 'active' : '' }}" href="{{url('upz/kelola-mustahiq')}}">
                        <span>Kelola Mustahiq</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('upz/kelola-pemasukan') ? 'active' : '' }}" href="{{url('upz/kelola-pemasukan')}}">
                        <span>Kelola Pemasukan</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('upz/kelola-distribusi') ? 'active' : '' }}" href="{{url('upz/kelola-distribusi')}}">
                        <span>Kelola Distribusi</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link {{ Request::is('tentang') ? '' : 'collapsed' }}" href="{{url('tentang')}}">
                <i class="bi bi-file-earmark-person-fill"></i>
                <span>Tentang</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->