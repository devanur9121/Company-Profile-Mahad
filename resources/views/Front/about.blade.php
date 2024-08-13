@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
   <div class="container h-100">
      <div class="row h-100">
         <div class="col-lg-12 my-auto">
            <div class="page-banner-content text-center">
               <h2 class="page-banner-title">About Us</h2>
               <div class="page-banner-breadcrumb">
                  <p><a href="/home">Home</a> Our Profile</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->
<!-- START ABOUT PAGE WELCOME SECTION -->
<!-- START WELCOME SECTION -->
<section id="habout" class="welcome-section-padding">
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-lg-0 mb-5">
            <div class="about-wel-des">
               <h6 class="theme-color"><i class="icofont-plus"></i> Ma'had info</h6>
               <h2 class="my-4">TENTANG KAMI</h2>
               <p style="text-align: justify">Ma'had Bahrul Huda merupakan Lembaga Pendidikan Islam yang berada di bawah
                  naungan Yayasan Bahrul Huda yang bertugas dalam melayani suatu pembinaan, pengembangan akademik,
                  karakter santri dengan sistem pengelolaan asrama dengan berbasis pesantren atau biasa disebut dengan
                  <i>Boarding School</i>.
               </p>
               <p class="my-4 text-align-justify"><b>Ma'had Bahrul Huda memiliki beragam program unggulan dengan tujuan
                     membentuk santri menjadi individu yang mandiri, berkepribadian muslim, unggul, serta mampu meraih
                     prestasi di berbagai bidang.</b></p>
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-6 col-md-6 col-12">
            <div class="about-wel-img-sec img-overlay">
               <a class="venobox" data-autoplay="true" data-vbtype="video" data-title="Intro Video" data-gall="videoh"
                  href="https://youtu.be/ii8GnX5r_30?si=FUJRa6F_N7dUleRq"><i class="icofont-play-alt-2"></i></a>
               <div class="img-wrap">
                  <img class="img-fluid" src="{{asset('Front/img/bg/home-about-img.png')}}" alt="">
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- START SERVICES SECTION -->
      <section id="services" class="section-padding">
         <div class="auto-container">
            <div class="row">
               <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
                  <div class="section-title">
                     <h6 class="theme-color">Prinsip Lembaga Kami</h6>
                     <h2>Ma'had Bahrul Huda</h2>
                     <p>Di bawah ini merupakan visi, misi, motto, dan tujuan dari lembaga kami.</p>
                  </div>
               </div>
            </div>
            <!-- end section title -->
            <div class="row justify-content-center">
               <div class="col-lg-6 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                  <div class="single-service-item shadow" style="background-color:whitesmoke">
                     <div class="icon-holder mb-3">
                        <div class="service-item-icon-bg">
                           <i class="icofont-university"></i>
                        </div>
                     </div>
                     <div class="service-item-text-holder">
                        <h4>VISI</h4>
                        <p><i>"Terbentuknya anak berkepribadian muslim, dan berprestasi optimal yang berbudaya
                              lingkungan".
                           </i></p>
                     </div>
                  </div>
               </div>
               <!-- End single service item -->
               <div class="col-lg-6 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                  <div class="single-service-item shadow" style="padding-bottom: 67px; background-color:whitesmoke">
                     <div class="icon-holder mb-3">
                        <div class="service-item-icon-bg">
                           <i class="icofont-certificate-alt-1"></i>
                        </div>
                     </div>
                     <div class="service-item-text-holder">
                        <h4>MOTTO</h4>
                        <p><i>"Islami, Mandiri, dan Berprestasi".
                           </i></p>
                     </div>
                  </div>
               </div>
            </div><br>
            <!-- End single service item -->
            <div class="row justify-content-center">
               <div class="col-lg-6 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                  <div class="single-service-item shadow" style="background-color:whitesmoke">
                     <div class="icon-holder mb-3">
                        <div class="service-item-icon-bg">
                           <i class="icofont-read-book"></i>
                        </div>
                     </div>
                     <div class="service-item-text-holder">
                        <h4>MISI</h4>
                        <p><i>"Menyelenggarakan lembaga pendidikan pesantren yang mengintegrasikan iman, ilmu, dan amal
                              untuk menyiapkan generasi muslim dan muslimah yang ber-akhlakul karimah, cerdas, mandiri,
                              dan bertanggung jawab".
                           </i></p>
                     </div>
                  </div>
               </div>
               <!-- End single service item -->
               <div class="col-lg-6 col-md-4 col-sm-12 col-12 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4">
                  <div class="single-service-item shadow" style="padding-bottom: 67px; background-color:whitesmoke">
                     <div class="icon-holder mb-3">
                        <div class="service-item-icon-bg">
                           <i class="icofont-learn"></i>
                        </div>
                     </div>
                     <div class="service-item-text-holder">
                        <h4>TUJUAN</h4>
                        <p><i>"Bersama dengan orang tua dan masyarakat menyiapkan generasi yang taqwa, cerdas, mandiri,
                              dan siap melanjutkan kepemimpinan umat dan bangsa".
                           </i></p>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End single service item -->
         </div>
         <!--- END CONTAINER -->
      </section>
      <!-- END SERVICES SECTION -->
   </div>
   <!--- END CONTAINER -->
</section>
<!-- END WELCOME SECTION -->
<!-- END ABOUT PAGE WELCOME SECTION -->
@endsection