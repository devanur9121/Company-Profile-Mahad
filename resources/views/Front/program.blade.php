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
            <h4><i class="icofont-university"></i> Madrasah Diniyyah.</h4>
            <p style="text-align: justify">Program ini dirancang untuk memberikan pendidikan agama yang komprehensif.
              Ini mencakup pemahaman tentang hukum Islam <strong>(Fiqih)</strong>, pengucapan Al-Qur'an dengan benar
              <strong>(Tajwid)</strong>, tata bahasa dan penguasaan bahasa Arab <strong>(Nahwu dan Shorof)</strong>,
              penulisan bahasa Arab <strong>(Imla')</strong>, keyakinan <strong>(Aqidah)</strong>, dan etika
              <strong>(Akhlaq)</strong>.
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
            <h4><i class="icofont-book"></i> Menghafal Al-Qur'an.</h4>
            <p style="text-align: justify">Program ini menekankan pentingnya hafalan Al-Qur'an dalam kehidupan santri.
              Santri diberi target menghafal Al-Qur'an <strong>minimal 3 juz untuk tingkat SMP</strong> dan
              <strong>minimal 6 juz
                untuk tingkat SMA</strong>, dengan harapan bahwa Al-Qur'an akan menjadi pedoman utama
              dalam kehidupan santri.
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
            <h4><i class="icofont-ui-calendar"></i> Kajian Rutin.</h4>
            <p style="text-align: justify">Program ini mencakup pembahasan berbagai topik seperti tafsir Al-Qur'an,
              hadis, sejarah Islam, dan masalah-masalah kontemporer yang relevan. Kajian rutin bertujuan untuk
              meningkatkan pengetahuan dan pemahaman santri tentang agama Islam.</p>
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
            <h4><i class="icofont-culinary"></i> Puasa Sunnah.</h4>
            <p style="text-align: justify">Program puasa sunnah <strong>senin kamis</strong> adalah bentuk ibadah dan
              disiplin diri. Santri diajarkan untuk berpuasa pada hari Senin dan Kamis sebagai bentuk pengendalian diri
              dan spiritualitas. Program ini membantu santri untuk mendalami dan memahami makna ibadah puasa dalam
              Islam. Mereka belajar tentang niat yang tulus, pengendalian diri, dan perasaan empati terhadap
              orang-orang yang kurang beruntung.</p>
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
            <h4><i class="icofont-globe-alt"></i> Ekstrakulikuler.</h4>
            <ul>
              <li style="text-align: justify"><strong>Program Hadroh</strong> mengajarkan santri seni
                Islami, keterampilan musik, kerjasama tim, dan pengalaman dalam acara Islami.</li>
              <li style="text-align: justify"><strong>Program Muhadhoroh</strong> membantu santri menjadi
                pembicara yang baik, memiliki kemampuan berbicara di depan umum, dan merasa
                percaya diri dalam berdiskusi tentang agama.</li>
            </ul>
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
            <h4><i class="icofont-certificate-alt-1"></i> Bahasa.</h4>
            <p style="text-align: justify">Program bahasa ini memberikan kesempatan kepada santri untuk mempelajari
              <strong>bahasa Arab</strong>, yang merupakan bahasa utama dalam agama Islam, serta <strong>bahasa
                Inggris</strong> yang merupakan bahasa internasional. Ini membantu santri dalam berkomunikasi dan
              memahami sumber-sumber Islam yang ditulis dalam <strong>bahasa Arab</strong>, dan juga membekali mereka
              dengan keterampilan <strong>bahasa Inggris</strong> yang berguna dalam konteks global.
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
    </div>
    <!-- end pagination -->
  </div>
</section>
<!-- END SERVICE PAGE WELCOME SECTION -->
@endsection