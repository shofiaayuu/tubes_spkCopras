<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets\img\logo.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">SPK/COPRAS</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kriteria') }}" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Kriteria & Bobot
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('alternatif') }}" class="nav-link">
                        <i class="nav-icon fas fa-puzzle-piece"></i>
                        <p>
                            Alternatif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('perhitungan') }}" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Data Perhitungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('perangkingan') }}" class="nav-link">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>
                            Hasil Perangkingan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
