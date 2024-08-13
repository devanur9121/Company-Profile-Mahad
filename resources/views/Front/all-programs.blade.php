@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Program</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Program List</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<!-- START SERVICE PAGE WELCOME SECTION -->
<section id="servicelist" class="section-padding">
  <div class="auto-container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/2.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-people"></i> Sholat Berjamaah.</h4>
            <p style="text-align: justify">Program ini mendorong siswa untuk melakukan <strong>sholat lima
                waktu</strong> secara berjamaah. Sholat berjamaah mengajarkan kerjasama,
              disiplin, dan spiritualitas dalam ibadah sehari-hari.
            </p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/3.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-read-book"></i> Rotibul Haddad.</h4>
            <p style="text-align: justify">Program pembacaan Rotibul Haddad merupakan salah satu
              cara yang efektif dalam membentuk karakter Islami siswa. Wirid ini membantu siswa dalam
              menginternalisasi ajaran-ajaran agama dan menjalani kehidupan yang bermakna dan bertaqwa.
            </p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/4.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-read-book-alt"></i> Pembacaan Sholawat.</h4>
            <p style="text-align: justify">Pada program ini siswa diajarkan untuk memahami <strong>makna
                sholawat</strong>, menghormati Nabi Muhammad, dan menjalani kehidupan yang sesuai dengan ajaran-ajaran
              yang beliau bawa. Ini adalah cara untuk membentuk karakter siswa yang bertaqwa
              serta mengamalkan nilai-nilai Islami dalam kehidupan sehari-hari.</p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/5.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-education"></i> Pembacaan Tahlil.</h4>
            <p style="text-align: justify">Siswa diajarkan untuk memahami makna mendalam kalimat <strong>"La ilaha
                illallah,"</strong> serta pentingnya keesaan Allah dalam agama Islam. Ini adalah cara untuk membentuk
              karakter siswa yang memiliki fondasi iman yang kuat, menghormati Allah, dan menjalani kehidupan yang
              sesuai dengan ajaran-ajaran Islam.</p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/1.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-moon"></i> Sholat Tahajud.</h4>
            <p style="text-align: justify"><strong>Sholat Tahajud</strong> membantu siswa menjalani kehidupan yang
              lebih sadar akan nilai-nilai agama, lebih dekat dengan Allah, dan lebih peduli terhadap sesama. Ini
              adalah praktik ibadah yang membawa kebahagiaan, ketenangan batin, dan pertumbuhan
              spiritual dalam kehidupan siswa.
            </p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
      <div class="col-lg-4 col-md-4 col-12">
        <div class="service-list-item shadow">
          <div class="service-list-img">
            {{-- <img class="img-fluid" src="{{asset('Front/img/service/6.jpg')}}" alt=""> --}}
            <div class="mask mask-1"></div>
            <div class="mask mask-2"></div>
            <div class="content">
              <a href="#" class="info">Read More</a>
            </div>
          </div>
          <div class="service-list-des">
            <h4><i class="icofont-user-alt-1"></i> Pembiasaan Mandiri.</h4>
            <p style="text-align: justify"><strong>Pembiasaan mandiri</strong> adalah program yang mengajarkan
              siswa untuk menjadi pribadi yang mandiri, bertanggung jawab, dan dapat mengambil keputusan yang baik
              dalam kehidupan sehari-hari.
            </p>
          </div>
        </div>
      </div>
      <!-- end single service list -->
    </div>

    <!-- start pagination -->
    <div class="row wow fadeInUp mt-5">
      <div class="col-12">
        <div class="site-pagination">
          <div class="navbar justify-content-center">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="/program" aria-label="Previous">
                  <i class="icofont-caret-left"></i>
                </a>
              </li>
              <li class="page-item"><a class="page-link bo-tl" href="/program">1</a></li>
              <li class="page-item active"><a class="page-link bo-tl" href="/all-program">2</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <i class="icofont-caret-right"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end pagination -->
  </div>
</section>
<!-- END SERVICE PAGE WELCOME SECTION -->
@endsection