@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Contact Page</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> contact</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<!-- START CONTACT PAGE SECTION -->
<section id="contcat" class="section-padding">
  <div class="auto-container">
    <div class="row">
      <div class="col-lg-4 col-md-5 col-12 mb-lg-0 mb-md-0 mb-5">
        <div class="address-box-wrap bg-gray shadow-sm p-lg-5 p-md-3 p-3">
          <div class="address-box-sin mb-4">
            <div class="address-box-icon">
              <i class="icofont-location-pin"></i>
              <div class="address-text">
                <h4>Office Address</h4>
              </div>
            </div>
            <div class="address-box-des">
              <p>Jl. Letda Sucipto, Perbon, Kec. Tuban, <br> Kabupaten Tuban.</p>
            </div>
          </div>
          <!-- end single address box -->
          <div class="address-box-sin mb-4">
            <div class="address-box-icon">
              <i class="icofont-envelope-open"></i>
              <div class="address-text">
                <h4>Send Email</h4>
              </div>
            </div>
            <div class="address-box-des">
              <p>lpi.bas_tbn@yahoo.com</p>
            </div>
          </div>
          <!-- end single address box -->
          <div class="address-box-sin mb-4">
            <div class="address-box-icon">
              <i class="icofont-fax"></i>
              <div class="address-text">
                <h4>Telp</h4>
              </div>
            </div>
            <div class="address-box-des">
              <p>0856-4858-5193</p>
            </div>
          </div>
          <!-- end single address box -->
          <div class="address-box-sin">
            <div class="address-box-icon">
              <i class="icofont-eye"></i>
              <div class="address-text">
                <h4>Opening Time</h4>
              </div>
            </div>
            <div class="address-box-des">
              <p>Mon-Sun: 7AM - 10PM</p>
            </div>
          </div>
          <!-- end single address box -->
        </div>
      </div>
      <!-- end col -->
      <div class="col-lg-8 col-md-7 col-12 pl-lg-5 pl-md-3 pl-0">
        <div class="contact-heading mb-5">
          <h2>Our Maps</h2>
        </div>
        <div class="contact-form-wrap">
          <div class="gmap_canvas">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9859753184032!2d112.0330129741063!3d-6.89228036744382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77a2a57db90e5b%3A0xc86e73c7c33a48d8!2sMa&#39;had%20Bahrul%20Huda!5e0!3m2!1sid!2sid!4v1698754278286!5m2!1sid!2sid"
              width="700" height="500" style="border: 4px solid #000;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
  </div>
</section>
<!-- END CONTACT PAGE SECTION -->
@endsection