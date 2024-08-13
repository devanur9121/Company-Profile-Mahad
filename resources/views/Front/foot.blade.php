<footer class="footer-section">
  <div id="top-footer" class="overlay-2 section-back-image-2" data-background="{{asset('Front/img/bg/taman.jpg')}}">
    <div class="auto-container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-5 mb-sm-5 mb-5">
          <div class="footer-widget-title col-12 p-0">
            <div class="logo">
              <a href="/home" style=" display: flex; justify-content: center; align-items: center;">
                <img class="img-fluid" src="{{asset('Front/img/Logo-1.png')}}" alt="" style="width:50%; height:25%;">
              </a>
            </div>
          </div>
          <div class="footer-widget-inner">
            <p style="text-align: justify">Lembaga Pendidikan Islam yang berada di bawah naungan Yayasan Bahrul Huda.
            </p>
            <div class="img-menu float-lg-left float-none mt-3">
              <div class="footer-social">
                <ul>
                  <li><a class="social-fb" href="https://www.facebook.com/binaanaksholehtuban/"><i
                        class="icofont-facebook"></i></a></li>
                  <li><a class="social-tw"
                      href="https://instagram.com/official_mahadbahrulhuda?igshid=NGVhN2U2NjQ0Yg=="><i
                        class="icofont-instagram"></i></a></li>
                  <li><a class="social-gp" href="https://www.youtube.com/channel/UCC6ZxlHQv6t6msAHtkqlPJg"><i
                        class="icofont-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-5 mb-sm-5 mb-5">
          <div class="footer-widget-title col-12 p-0">
            <h4>Latest Post</h4>
          </div>
          <div class="footer-widget-inner">
            @php
            $recentPosts = DB::table('news')->latest()->take(2)->get();
            @endphp

            @foreach ($recentPosts as $item)
            <div class="singleRecpost">
              @foreach (json_decode($item->image_urls) as $imageUrl)
              <img class="img-fluid" src="{{ $imageUrl }}" alt="">
              @endforeach
              <h6 class="recTitle">
                <a href="/blog-berita/{{ $item->id }}">{{ $item->title }}</a>
              </h6>
              <p class="posted-on">{{ Carbon\Carbon::parse($item->tanggal)->format('D, d M Y') }}</p>
            </div>
            @endforeach
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
          <div class="footer-widget-title col-12 p-0">
            <h4>Useful Links</h4>
          </div>
          <div class="footer-widget-inner">
            <ul>
              <li><a href="/program"><i class="icofont-circled-right"></i> Program Kami</a></li>
              <li><a href="/staff"><i class="icofont-circled-right"></i> Staff Kami</a></li>
              <li><a href="/galeri"><i class="icofont-circled-right"></i> Galeri Kegiatan</a></li>
              <li><a href="/faq"><i class="icofont-circled-right"></i> Frequently Question</a></li>
              <li><a href="/dokumen-downloads"><i class="icofont-circled-right"></i> Perizinan Santri</a></li>
            </ul>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-0">
          <div class="footer-widget-title col-12 p-0">
            <h4>Get In Touch</h4>
          </div>
          <div class="footer-widget-inner">
            <div class="footer-contact-widget">
              <div class="footer-contact-sin">
                <div class="footer-contact-sin-left">
                  <i class="icofont-pin"></i>
                </div>
                <div class="footer-contact-sin-right">
                  <p>Jl. Letda Sucipto, Perbon, Kec. Tuban</p>
                </div>
              </div>
              <div class="footer-contact-sin">
                <div class="footer-contact-sin-left">
                  <i class="icofont-smart-phone"></i>
                </div>
                <div class="footer-contact-sin-right">
                  <p>0856-4858-5193</p>
                </div>
              </div>
              <div class="footer-contact-sin">
                <div class="footer-contact-sin-left">
                  <i class="icofont-envelope"></i>
                </div>
                <div class="footer-contact-sin-right">
                  <p>lpi.bas_tbn@yahoo.com</p>
                </div>
              </div>
              <div class="footer-contact-sin">
                <div class="footer-contact-sin-left">
                  <i class="icofont-clock-time"></i>
                </div>
                <div class="footer-contact-sin-right">
                  <p>Mon - Sun : 07:00 - 22:00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
    </div>
  </div>
  <div id="bottom-footer" class="bg-gray">
    <div class="auto-container">
      <div class="row mb-lg-0 mb-md-4 mb-4">
        <div class="col-lg-6 col-md-12 col-12">
          <p class="copyright-text">Copyright © 2023 <a href="/home">Ma'had Bahrul Huda</a> | All Rights Reserved</p>
        </div>
        <!-- end col -->
        <div class="col-lg-6 col-md-12 col-12">
          <div class="footer-menu">
            <ul>
              <li><a href="/home">Home</a></li>
              <li><a href="/about-us">About Us</a></li>
              <li><a href="/contact">Contact Us</a></li>
              <li><a href="/tata-tertib">Tata Tertib</a></li>
            </ul>
          </div>
        </div>
        <!-- end col -->
      </div>
    </div>
  </div>
</footer>