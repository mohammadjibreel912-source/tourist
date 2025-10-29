<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <!-- SVG Logo هنا -->
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Explore360&deg;</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- Tourist Spots -->
    <li class="menu-header small text-uppercase"><span>Tourist Spots</span></li>
    <li class="menu-item">
      <a href="{{ route('spots.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-map"></i>
        <div>View Spots</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('spots.create') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-plus-circle"></i>
        <div>Add Spot</div>
      </a>
    </li>

    <!-- Payments / QR Codes -->
    <li class="menu-item">
      <a href="{{ route('payments.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-credit-card"></i>
        <div>Payments / QR Codes</div>
      </a>
    </li>

    <!-- Users -->
    <li class="menu-header small text-uppercase"><span>Users</span></li>
    <li class="menu-item">
      <a href="{{ route('admin.users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Manage Users</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.users.create') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-plus"></i>
        <div>Add User</div>
      </a>
    </li>

    <!-- Admin Extras -->
    <li class="menu-header small text-uppercase"><span>Settings</span></li>
    <li class="menu-item">
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="menu-link btn btn-link text-start w-100">
          <i class="menu-icon tf-icons bx bx-log-out"></i>
          <div>Logout</div>
        </button>
      </form>
    </li>
  </ul>
</aside>
