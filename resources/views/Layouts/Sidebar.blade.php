<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="background-color: #202f57">
      <div class="sidebar-brand-icon">
      </div>
      <div class="sidebar-brand-text mx-3">DATA MAHASISWA</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Route::is('data.dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('data.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt text-primary"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Data
    </div>
    <li class="nav-item {{ Route::is('data.student') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('data.student')}}">
        <i class="fa fa-users text-primary"></i>
        <span style="margin-left: 2px">Mahasiswa</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('data.subject') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('data.subject')}}">
        <i class="fa fa-calendar text-primary"></i>
        <span class="ml-2">Mata Kuliah</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('data.score') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('data.score')}}">
        <i class="fa fa-clipboard text-primary"></i>
        <span style="margin-left: 10px">Penilaian</span>
      </a>
    </li>
    <hr class="sidebar-divider">
  </ul>