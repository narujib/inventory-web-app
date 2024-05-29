<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('profile') }}"><i class="bx bx-user me-1"></i>Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="pages-account-settings-notifications.html"><i class="fa-solid fa-user-pen me-1"></i></i>Ubah Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('edit-password') ? 'active' : '' }}" href="{{ url('edit-password') }}"><i class="fa-solid fa-key me-1"></i>Ubah Password</a>
    </li>
</ul>