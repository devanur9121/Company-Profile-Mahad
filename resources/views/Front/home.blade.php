@extends('Front.index')

@section('content')
<!-- START SLIDER SECTION -->
<section class="slider-section">
   <div class="home-slides owl-carousel owl-theme">
      <div class="home-single-slide" data-background="{{asset('Front/img/bg/slide1.jpg')}}">
         <div class="home-single-slide-overlay"></div>
         <div class="home-single-slide-inner">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="home-single-slide-dec">
                        <h4>Welcome to web</h4>
                        <h2>Informasi Ma'had Bahrul Huda</h2>
                        <p>Ketahui lebih lanjut tentang kami.</p>
                        <div class="home-single-slide-button mt-4">
                           <a href="/about-us" class="slide-btn-one mb-lg-0 mb-md-0 mb-2">Tentang Kami <i
                                 class="icofont-long-arrow-right"></i></a>
                           <a href="/contact" class="slide-btn-two">Contact Us</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end single slider -->
      <div class="home-single-slide" data-background="{{asset('Front/img/bg/slide2.jpg')}}">
         <div class="home-single-slide-overlay"></div>
         <div class="home-single-slide-inner">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="home-single-slide-dec">
                        <h3 style="color: white">Informasi PPDB</h3>
                        <h4>SMP Bina Anak Sholeh Tuban</h4>
                        <p>Untuk mendapatkan informasi pendaftaran peserta didik baru SMP BAS Tuban, silakan klik di
                           bawah ini.</p>
                        <div class="home-single-slide-button mt-4">
                           <a href="https://ppdb.smpbastuban.sch.id/" class="slide-btn-one">More Info <i
                                 class="icofont-long-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end single slider -->
      <div class="home-single-slide" data-background="{{asset('Front/img/bg/home-about-img.png')}}">
         <div class="home-single-slide-overlay"></div>
         <div class="home-single-slide-inner">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="home-single-slide-dec">
                        <h3 style="color: white">Informasi PPDB</h3>
                        <h4>SMA AL HUDA Boarding School</h4>
                        <p>Untuk mendapatkan informasi pendaftaran peserta didik baru SMA AL HUDA, silakan klik di
                           bawah ini.</p>
                        <div class="home-single-slide-button mt-4">
                           <a href="https://ppdb.sma-alhuda.sch.id/" class="slide-btn-one">More Info <i
                                 class="icofont-long-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end single slider -->
   </div>
</section>
<!-- END SLIDER SECTION  -->

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
               </p><br>
               <div class="about-btn wow fadeInUp">
                  <a href="/about-us" class="about-us-into-btn-2 mr-2">Read More</a>
               </div>
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
   </div>
   <!--- END CONTAINER -->
</section>
<!-- END WELCOME SECTION -->

<!-- START SERVICE TAB SECTION -->
<section id="servicetab" class="section-padding">
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
            <div class="section-title">
               <h6 class="theme-color">Ma'had Bahrul Huda</h6>
               <h2>Layanan Yang Kami Berikan</h2>
               <p>Sebagai sebuah Lembaga Pendidikan Islam yang bertugas dalam melayani pembinaan, pengembangan akademik
                  serta karakter santri, Kami menyediakan beberapa layanan antara lain.</p>
            </div>
         </div>
      </div>
      <!-- end section title -->
      <div class="service-tab">
         <div class="row">
            <div class="col-lg-3 col-12 mb-lg-0 mb-md-4 mb-4">
               <ul id="tabsJustified" class="nav nav-tabs">
                  <li class="nav-item">
                     <a href="#" data-target="#one" data-toggle="tab" class="nav-link">
                        <i class="icofont-paper"></i>
                        <span>Staff Kami</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" data-target="#two" data-toggle="tab" class="nav-link active">
                        <i class="icofont-teacher"></i>
                        <span>Program Kami</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" data-target="#three" data-toggle="tab" class="nav-link">
                        <i class="icofont-brainstorming"></i>
                        <span>Struktur<br> Organisasi</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" data-target="#four" data-toggle="tab" class="nav-link">
                        <i class="icofont-university"></i>
                        <span>Fasilitas Kami</span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- end col -->
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
               <div id="tabsJustifiedContent" class="tab-content">
                  <div id="one" class="tab-pane animated fadeInUp">
                     <div class="auto-container">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                              <div class="service-tab-left">
                                 <h4>STAFF KAMI</h4>
                                 <p>Kami memiliki staff-staff pengajar yang berkualitas pada bidangnya yang dapat
                                    membantu santri dalam pengembangan akademik dari santri.</p>
                                 <a href="/staff" class="service-btn">View Service </a>
                              </div>
                           </div>
                           <!-- end col -->
                           <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                              <div class="ab-img-col">
                                 <figure>
                                    <img class="img-fluid" src="{{asset('Front/img/service/staff.png')}}" alt="">
                                 </figure>
                              </div>
                           </div>
                           <!-- end col -->
                        </div>
                     </div>
                  </div>
                  <div id="two" class="tab-pane animated fadeInUp active show">
                     <div class="auto-container">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                              <div class="service-tab-left">
                                 <h4>PROGRAM KAMI</h4>
                                 <p>Kami telah membuat program-program unggulan yang membantu dalam membentuk karakter
                                    dari santri.</p>
                                 <a href="/program" class="service-btn">View Service </a>
                              </div>
                           </div>
                           <!-- end col -->
                           <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                              <div class="ab-img-col">
                                 <figure>
                                    <img class="img-fluid" src="{{asset('Front/img/service/program.gif')}}" alt="">
                                 </figure>
                              </div>
                           </div>
                           <!-- end col -->
                        </div>
                     </div>
                  </div>
                  <div id="three" class="tab-pane animated fadeInUp">
                     <div class="auto-container">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                              <div class="service-tab-left">
                                 <h4>STRUKTUR ORGANISASI KEASRAMAAN</h4>
                                 <p>Dengan adanya struktur organisasi keasramaan, kami memberikan wadah bagi santri
                                    untuk menjadi individu yang mandiri serta dapat melatih jiwa kepemimpinan dari
                                    santri.</p>
                                 <a href="/struktur-organisasi" class="service-btn">View Service </a>
                              </div>
                           </div>
                           <!-- end col -->
                           <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                              <div class="ab-img-col">
                                 <figure>
                                    <img class="img-fluid" src="{{asset('Front/img/service/struktur.png')}}" alt="">
                                 </figure>
                              </div>
                           </div>
                           <!-- end col -->
                        </div>
                     </div>
                  </div>
                  <div id="four" class="tab-pane animated fadeInUp">
                     <div class="auto-container">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-5 text-lg-right text-left">
                              <div class="service-tab-left">
                                 <h4>FASILITAS KAMI</h4>
                                 <p>Lembaga kami menyediakan fasilitas-fasilitas yang baik dan layak untuk santri kami.
                                 </p>
                                 <a href="#" class="service-btn">View Service </a>
                              </div>
                           </div>
                           <!-- end col -->
                           <div class="col-lg-6 col-md-6 col-12 pl-lg-5 pl-0">
                              <div class="ab-img-col">
                                 <figure>
                                    <img class="img-fluid" src="{{asset('Front/img/service/fasilitas.png')}}" alt="">
                                 </figure>
                              </div>
                           </div>
                           <!-- end col -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
      </div>
   </div>
   <!--- END CONTAINER -->
</section>
<!-- END SERVICE TAB SECTION -->

<!-- START TESTIMONIAL & FAQ SECTION -->
<section id="testimonial" class="section-padding overlay section-back-image"
   data-background="{{asset('Front/img/bg/taman.jpg')}}">
   <div class="auto-container">
      <div class="row ml-lg-4 ml-md-4 ml-0 mr-lg-4 mr-md-4 mr-0">
         <div class="col-lg-6 col-md-12 col-12 mb-lg-0 mb-md-5 mb-5">
            <div class="section-title white-title section-title-left">
               <h2>Testimonial Alumni</h2>
            </div>
            <!-- end section title -->
            <div class="owl-carousel owl-theme testimonial-wrapper">
               <div class="item"
                  data-dot="<img class='testimonial-thumb rounded' src='{{asset('Front/img/testimonial/3.png')}}'/>">
                  <div class="testimonial-inner">
                     <div class="tes-quote">
                        <i class="icofont-quote-left"></i>
                     </div>
                     <div class="tes-dec">
                        <p class="author-des">Ma'had Bahrul Huda bukan hanya asrama tetapi juga rumah, karena di sana
                           saya banyak mendapatkan saudara baru.</p>
                        <p class="tes-author"><strong>Maulana Mahardika</strong> - Akademi Angkatan Udara</p>
                     </div>
                  </div>
               </div>
               <!-- end single item -->
               <div class="item"
                  data-dot="<img class='testimonial-thumb rounded' src='{{asset('Front/img/testimonial/4.png')}}'/>">
                  <div class="testimonial-inner">
                     <div class="tes-quote">
                        <i class="icofont-quote-left"></i>
                     </div>
                     <div class="tes-dec">
                        <p class="author-des">Ma'had Bahrul Huda teruslah mencetak generasi Islam penerus Bangsa yang
                           berkualitas.</p>
                        <p class="tes-author"><strong>Halimatusy Syifa</strong> - Universitas Brawijaya</p>
                     </div>
                  </div>
               </div>
               <!-- end single item -->
               <div class="item"
                  data-dot="<img class='testimonial-thumb rounded' src='{{asset('Front/img/testimonial/3.png')}}'/>">
                  <div class="testimonial-inner">
                     <div class="tes-quote">
                        <i class="icofont-quote-left"></i>
                     </div>
                     <div class="tes-dec">
                        <p class="author-des">Perjalanan menuntut ilmu di Ma'had Bahrul Huda yang sangat mengesankan
                           selama 6 tahun, dikarenakan banyak ilmu yang sangat bermanfaat untuk diterapkan.</p>
                        <p class="tes-author"><strong>Febry Bara</strong> - Curtin University Australia</p>
                     </div>
                  </div>
               </div>
               <!-- end single item -->
               <div class="item"
                  data-dot="<img class='testimonial-thumb rounded' src='{{asset('Front/img/testimonial/4.png')}}'/>">
                  <div class="testimonial-inner">
                     <div class="tes-quote">
                        <i class="icofont-quote-left"></i>
                     </div>
                     <div class="tes-dec">
                        <p class="author-des">Teruslah mencetak kader muslimah yang unggul dan kompetitif, serta
                           bertanggung jawab atas harapan Bangsa.</p>
                        <p class="tes-author"><strong>Neomy Dwi Julianti</strong> - Universitas Islam Negeri Sunan Ampel
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end single item -->
            </div>
         </div>
         <!-- end col -->
         <div class="col-lg-6 col-md-12 col-12 mt-lg-0 mt-4">
            <div class="section-title white-title section-title-left">
               <h2>Frequently Asked Question</h2>
            </div>
            <!-- end section title -->
            <div class="panel-group faq-home-accor" id="accordion">
               <div class="panel panel-default mb-3">
                  <div class="panel-heading">
                     <h5 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1">
                           Apa sih Ma’had Bahrul Huda? <i class=" text-white icofont icofont-minus"></i></a>
                     </h5>
                  </div>
                  <div id="panel1" class="panel-collapse collapse show">
                     <div class="panel-body text-white">
                        <p>Ma'had Bahrul Huda merupakan Lembaga Pendidikan Islam yang berada di bawah
                           naungan Yayasan Bahrul Huda yang bertugas dalam melayani suatu pembinaan, pengembangan
                           akademik,
                           karakter santri dengan sistem pengelolaan asrama dengan berbasis pesantren atau biasa
                           disebut
                           dengan
                           <i>Boarding School</i>.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default mb-3">
                  <div class="panel-heading">
                     <h5 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel2">
                           Berapa biaya pendidikan Ma’had Bahrul Huda? <i
                              class=" text-white icofont icofont-plus"></i></a>
                     </h5>
                  </div>
                  <div id="panel2" class="panel-collapse collapse">
                     <div class="panel-body text-white">
                        <p>Untuk biaya Ma’had sudah di include kan dengan biaya daftar ulang saat pendaftaran peserta
                           didik baru. Untuk mengetahui
                           informasi lebih lanjut dapat dilihat di website <a
                              href="https://ppdb.smpbastuban.sch.id/#informasi-penting">SMP BAS Tuban</a> atau <a
                              href="https://ppdb.sma-alhuda.sch.id/">SMA AL HUDA <i>Boarding School</i></a>.</p>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h5 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">
                           Apa saja peraturan-peraturan santri Ma’had Bahrul Huda? <i
                              class=" text-white icofont icofont-plus"></i></a>
                     </h5>
                  </div>
                  <div id="panel3" class="panel-collapse collapse">
                     <div class="panel-body text-white">
                        <p>Peraturan santri Ma’had Bahrul Huda dapat dilihat pada bagian <a href="/tata-tertib">Tata
                              Tertib</a>.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!--  end row -->
   </div>
   <!--- END CONTAINER -->
</section>
<!-- END TESTIMONIAL & FAQ SECTION -->

<!-- START PORTFOLIO PAGE SECTION -->
<section id="galleryPage" class="section-padding">
   <div class="auto-container">
      <div class="row mb-5">
         <div class="col-12 mx-auto text-center wow fadeInDown">
            <div class="portfolio-filter-menu" style="margin-top: 10px">
               <ul>
                  <li class="filter active" data-filter="*">All</li>
                  @php
                  $jenisKegiatanArray = [];
                  @endphp
                  @foreach($galeri as $kegiatan)
                  @if (!in_array($kegiatan->kegiatan->jenis_kegiatan, $jenisKegiatanArray))
                  <li class="filter" data-filter=".{{ $kegiatan->kegiatan_id }}">
                     {{ $kegiatan->kegiatan->jenis_kegiatan }}
                  </li>
                  @php
                  $jenisKegiatanArray[] = $kegiatan->kegiatan->jenis_kegiatan;
                  @endphp
                  @endif
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
      <!-- end portfolio menu list -->
      <div class="row project-list">
         @foreach ($galeri as $data)
         <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4 portofolio {{$data->kegiatan_id}}">
            <figure class="portfolio-sin-item">
               <img class="img-fluid" src="{{ asset('storage/galeri/' . $data->foto) }}" alt="" />
               <figcaption>
                  <h3>{{$data->nama_kegiatan}} | {{$data->tanggal_kegiatan}}</h3>
                  <div class="port-icon mt-3">
                     <a class="icon-ho venobox" href="{{ asset('storage/galeri/' . $data->foto) }}"
                        data-title="{{$data->nama_kegiatan}}" data-gall="gall1"><i class="icofont-eye"></i></a>
                  </div>
               </figcaption>
            </figure>
            <h6 style="text-align: center">{{$data->nama_kegiatan}}</h6>
         </div>
         @endforeach
         <!--  end single item -->
      </div>
      <div class="row mt-4">
         <div class="col-12 mx-auto text-center wow fadeInDown">
            <a href="/galeri" class="port-btn">Load More <i class="icofont-bubble-right"></i></a>
         </div>
      </div>
</section>
<!-- END PORTFOLIO PAGE SECTION -->

<!-- START BLOG SECTION -->
<section id="blog" class="section-padding bg-gray">
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-7 col-md-7 col-12 mx-auto text-center">
            <div class="section-title">
               <h6 class="theme-color">Informasi Berita</h6>
               <h2>Latest Blog Post</h2>
            </div>
         </div>
      </div>
      <!-- end section title -->
      <div class="row mb-5">
         <div class="col">
            <div class="blog-slides owl-carousel owl-theme">
               @foreach ($news as $item)
               <div class="blog-home-single">
                  <div class="blog-home-image">
                     @foreach (json_decode($item->image_urls) as $imageUrl)
                     <img class="img-fluid" src="{{ $imageUrl }}" alt="">
                     @endforeach
                     <div class="blog-home-post-date">
                        <i class="icofont-clock-time"></i>
                        <span>{{ $item->tanggal->format('D, d M Y') }}</span>
                     </div>
                  </div>
                  <div class="blog-home-des-wrap">
                     <div class="blog-home-des-left">
                        <ul>
                           <li><i class="icofont-comment"></i> <br>{{ $item->commentCount }}</li>
                        </ul>
                     </div>
                     <div class="blog-home-des-right">
                        <div class="havator">
                           @foreach (json_decode($item->image_urls) as $imageUrl)
                           <img class="img-fluid" src="{{ $imageUrl }}" alt="">
                           @endforeach
                        </div>
                        <div class="blog-home-meta">
                           <span>Post By<a href="#">{{ $item->user->nama_lengkap }}</a></span>
                           <span><a href="/blog-berita/kategori/{{$item->kategori_id}}"
                                 rel="category tag">{{ $item->kategori->nama_kategori }}</a></span>
                        </div>
                        <div class="blog-home-content">
                           <h4><a href="/blog-berita/{{ $item->id }}">{{ $item->title }}</a></h4>
                           <p style="text-align: justify">
                              {{ Str::limit(strip_tags(html_entity_decode($item->deskripsi)), 200) }}
                           </p>
                        </div>
                        <div class="blog-home-btn">
                           <a href="/blog-berita/{{ $item->id }}"> Read More <i class="icofont-double-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               <!--  end single item -->
            </div>
         </div>
      </div>
   </div>
   <!--- END CONTAINER -->
</section>
<!-- END BLOG SECTION -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function () {
    $('.portfolio-filter-menu ul li').on('click', function () {
      var selector = $(this).attr('data-filter');
      $('.portfolio').hide();
      if (selector === '*') {
        $('.portfolio').show();
      } else {
        $('.portfolio' + selector).show();
      }
    });
  });
</script>

<script>
   $(document).ready(function() {
    // Saat pertanyaan diklik
    $('.accordion-toggle').click(function() {
      // Tutup semua panel kecuali yang diklik
      $('.panel-collapse').not($(this).attr('href')).removeClass('show');
      // Toggle panel yang diklik
      $($(this).attr('href')).toggleClass('show');
    });
  });
</script>
@endsection