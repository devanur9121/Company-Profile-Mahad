@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Struktur</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Struktur Organisasi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<section id="services" class="section-padding">
  <div class="auto-container">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
        <div class="section-title">
          <h6 class="theme-color">STRUKTUR ORGANISASI</h6>
          <p>Struktur organisasi ini menjadi sarana bagi santri dalam mengaplikasikan nilai dan sunnah pondok modern
            sebagai bekal hidup bermasyarakat. Organisasi ini terdiri dari 9 bagian yang dipimpin oleh seorang ketua dan
            wakil ketua dengan anggota pengurus sebanyak 31 santri</p>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach ($struktur as $item)
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow" style="background-color: whitesmoke">
          <div class="service-list-des">
            <h3 style="text-align: center">{{ $item->jabatan }}</h3>
            <h5 style="text-align: center">{{ $item->koordinator }}</h5>
            @if ($item->anggota1 || $item->anggota2)
            <h6><b>Anggota:</b></h6>
            <ul class="accordion" style="margin-left: 10px">
              @if ($item->anggota1)
              <li>
                <details>
                  <summary class="accordion-button">{{ $item->anggota1 }}</summary>
                </details>
              </li>
              @endif
              @if ($item->anggota2)
              <li>
                <details>
                  <summary class="accordion-button">{{ $item->anggota2 }}</summary>
                </details>
              </li>
              @endif
            </ul>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- START SERVICE PAGE WELCOME SECTION -->
{{-- <section id="servicelist" class="section-padding">
  <div class="auto-container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-university"></i> Madrasah Diniyyah.</h4>
            <p style="text-align: justify">Program ini dirancang untuk memberikan pendidikan agama yang
              komprehensif.
              Ini mencakup pemahaman tentang hukum Islam <strong>(Fiqih)</strong>, pengucapan Al-Qur'an dengan benar
              <strong>(Tajwid)</strong>, tata bahasa dan penguasaan bahasa Arab <strong>(Nahwu dan Shorof)</strong>,
              penulisan bahasa Arab <strong>(Imla')</strong>, keyakinan <strong>(Aqidah)</strong>, dan etika
              <strong>(Akhlaq)</strong>.
            </p>
          </div>
        </div>
      </div>

      <!-- start pagination -->
      {{-- <div class="row wow fadeInUp mt-5">
        <div class="col-12">
          <div class="site-pagination">
            <div class="navbar justify-content-center">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="/program" aria-label="Previous">
                    <i class="icofont-caret-left"></i>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link bo-tl" href="/program">1</a></li>
                <li class="page-item"><a class="page-link bo-tl" href="/all-program">2</a></li>
                <li class="page-item">
                  <a class="page-link" href="/all-program" aria-label="Next">
                    <i class="icofont-caret-right"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div> --}}
<!-- end pagination -->
<!-- END SERVICE PAGE WELCOME SECTION -->

@endsection