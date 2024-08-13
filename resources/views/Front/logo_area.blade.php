<div class="sticky-menu">
  <div class="logo-area mainmenu-area">
      <div class="auto-container">
        <div class="row" >
          <div class="col-lg-3 col-12 mx-auto text-lg-left text-center pl-0 mb-lg-0 mb-4">
            <div class="logo">
              <a href="/home">
                <img class="img-fluid" src="{{asset('Front/img/Logo-2.png')}}" alt="" width="" height="">
              </a>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-9 col-12 mx-auto d-lg-flex" style="padding-left: 70px">
            <nav class="navbar navbar-expand-md justify-content-center">
              <ul class="navbar-nav">
                <li><a class="nav-link" href="/home">Home</a></li>
                <li class="dropdown">
                  <a class="nav-link" href="#">About Us</a>
                  <ul class="dropdown-menu">
                    <li><a href="/about-us">Profil</a></li>
                    <li><a href="/fasilitas">Fasilitas</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link" href="#">Akademik</a>
                  <ul class="dropdown-menu">
                    <li><a href="/program">Program</a></li>
                    <li><a href="/tata-tertib">Tata Tertib</a></li>
                    <li><a href="/informasi-ppdb">Informasi PPDB</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link" href="#">Keasramaan</a>
                  <ul class="dropdown-menu">
                    <li><a href="/staff">Staff Pengajar</a></li>
                    <li><a href="/struktur-pengurus">Struktur Organisasi</a></li>
                    <li><a href="/jadwal-kegiatan">Jadwal Kegiatan Santri</a></li>
                    <li><a href="/dokumen-downloads">Surat Perizinan</a></li>
                  </ul>
                </li>
                <li><a class="nav-link" href="/galeri">Galeri</a></li>
                <li class="dropdown">
                  <a class="nav-link" href="#">Blog</a>
                  <ul class="dropdown-menu">
                    <li><a href="/blog-berita">Berita</a></li>
                    <li><a href="/faq">FAQ</a></li>
                  </ul>
                </li>
                <li><a href="/contact" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.sticky-menu');

    // Menambahkan kelas 'scrolled' saat melakukan scroll
    window.addEventListener('scroll', function() {
      if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Mengelola status aktif item navigasi
    const navItems = document.querySelectorAll('.mainmenu-area .navbar-nav li');
    const activeIndex = localStorage.getItem('activeNavItemIndex');

    if (activeIndex !== null && navItems[activeIndex]) {
      navItems[activeIndex].classList.add('active');
    }

    navItems.forEach((item, index) => {
      item.addEventListener('click', function() {
        navItems.forEach(navItem => navItem.classList.remove('active'));
        this.classList.add('active');
        localStorage.setItem('activeNavItemIndex', index);
      });
    });
  });
</script>
