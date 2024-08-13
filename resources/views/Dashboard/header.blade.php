<header class="top-header">
  <nav class="navbar navbar-expand">
    <div class="left-topbar d-flex align-items-center">
      <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
      </a>
    </div>
    <div class="right-topbar ms-auto">
      <ul class="navbar-nav">
        <li class="nav-item search-btn-mobile">
          <a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-user-profile">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
            <div class="d-flex user-box align-items-center">
              <div class="user-info">
                <p class="user-name mb-0">{{ Auth::user()->nama_lengkap }}</p>
                <p class="designattion mb-0">Available</p>
              </div>
              {{-- <img src="{{Asset('Admin/images/logo.png')}}" class="user-img" alt="user avatar"> --}}
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <form action="/logout" method="POST">
              @csrf
              <button class="btn" style="margin-left:20px;">
                <i class="bx bx-power-off"></i><span>Logout</span></button>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>