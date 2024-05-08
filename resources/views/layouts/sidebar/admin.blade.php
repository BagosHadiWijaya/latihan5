<div class="sidebar-content">
  <ul>
    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="link">
        <i class="ti-home"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="menu-category">
      <span class="text-uppercase">Management</span>
    </li>
    <li class="{{ request()->routeIs(['admin*', 'pelanggan*', 'terapis*']) ? 'active' : '' }}">
      <a href="#" class="main-menu has-dropdown">
        <i class="fa-solid fa-users"></i>
        <span>User</span>
      </a>
      <ul class="sub-menu">
        <li>
          <a href="{{ route('pelanggan.index') }}" class="link"><span>Pelanggan</span></a>
        </li>
        <li>
          <a href="{{ route('terapis.index') }}" class="link"><span>Terapis</span></a>
        </li>
        <li>
          <a href="{{ route('pesanan.index') }}" class="link"><span>Pesanan</span></a>
        </li>
      </ul>
    </li>
    <li class="{{ request()->routeIs(['alternatif*', 'kriteria*']) ? 'active' : '' }}">
      <a href="#" class="main-menu has-dropdown">
        <i class="fa-solid fa-database"></i>
        <span>Manage Data</span>
      </a>
      <ul class="sub-menu">
        <li>
          <a href="{{ route('alternatif.index') }}" class="link"> <span>Alternatif</span></a>
        </li>
        <li>
          <a href="{{ route('kriteria.index') }}" class="link"> <span>Kriteria</span></a>
        </li>
      </ul>
    </li>
  </ul>
</div>
