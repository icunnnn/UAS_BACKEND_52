<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="social">
            <h5 style="color: grey">{{ Auth::user()->name }}</h5>
        </div>
        <div class="info">
            <a href="#" class="d-block"></a>
        </div>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a><button type="button" class="btn btn-transparent btn-sm">Masuk sebagai <b>{{ Auth::user()->role }}</b> </button></a>
        </div>
    </div>

   
</div>

@if (Auth::check() && Auth::user()->role == 'admin')
    <h3 class="nav-header">Main</h3>
    <li class="nav-item">
        <a href="{{ url('dashboard52') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                User Management
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('agama52') }}" class="nav-link">
            <i class="nav-icon fas fa-universal-access"></i>
            <p>
                Data Agama
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('logout52') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
@else
    <h3 class="nav-header">Main</h3>
    <li class="nav-item">
        <a href="{{ url('dashboard52') }}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/changePassword52') }}" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
                Ubah Password
            </p>
        </a>
    </li>

    <h3 class="nav-header">Menu</h3>
    <li class="nav-item">
        <a href="{{ url('logout52') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
@endif
