@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Staff Pengajar</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Staff Pengajar</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<!-- START INTRODUCTION SECTION -->
<section id="teacherintro" class="section-padding">
  <div class="auto-container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-lg-0 mb-5">
        <div class="tea-intro-sec">
          <h6 class="theme-color">{{$data->bidang_kerja}}</h6>
          <h2 class="mb-4">{{$data->nama_lengkap}}</h2>
          <p class="text-align-justify">"Kita harus yakin bahwa kalau mengingat Allah, maka Allah juga akan mengingat
            hambanya, dan thariqah adalah ikhtiar untuk selalu mengingat dan mendekatkan diri kepada Allah. Untuk itu,
            carilah guru yang benar dan selalu mengingatkan untuk terus mendekat kepada-Nya" - KH.Fathul Huda</p>
        </div>
      </div>
      <!-- end col -->
      <div class="col-lg-6 col-md-6 col-12">
        <div class="tea-intro-img float-lg-right float-md-right float-none">
          <img class="img-fluid" src="{{ asset('storage/staff/' . $data->foto) }}" alt="">
        </div>
      </div>
      <!-- end col -->
    </div>
  </div>
</section>
<!-- END INTRODUCTION SECTION -->

<!-- START TEACHERS PAGE SECTION -->
<section id="teachers" class="section-padding pt-0">
  <div class="auto-container">
    <div class="row">
      <div class="col-12 text-left">
        <div class="section-title section-title-left">
          <h2>Our Staff</h2>
        </div>
      </div>
    </div>
    <!-- end section title -->
    <div class="row mb-5">
      <div class="col-12 mx-auto text-center wow fadeInDown">
        <div class="portfolio-filter-menu">
          <ul>
            <li class="filter active" data-filter="*">All</li>
            <li class="filter" data-filter=".Putra">Ma'had Putra</li>
            <li class="filter" data-filter=".Putri">Ma'had Putri</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach ($staff as $key => $data)
      @if($key>0)
      <div class="col-lg-3 col-md-4 col-12 mb-4  single-team-wrapper {{$data->jenis_mahad}}">
        <div class="single-team-member">
          <img class="img-fluid" src="{{ asset('storage/staff/' . $data->foto) }}" alt="">
          <div class="single-team-member-content">
            <ul class="single-team-member-social">
              {{-- <li><a href="#"><i class="icofont-facebook"></i></a></li>
              <li><a href="#"><i class="icofont-twitter"></i></a></li>
              <li><a href="#"><i class="icofont-pinterest"></i></a></li>
              <li><a href="#"><i class="icofont-youtube"></i></a></li> --}}
            </ul>
            <div class="single-team-member-text">
              <h5>{{ $data->nama_lengkap }}</h5>
              <p>{{ $data->bidang_kerja }}</p>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</section>
<!-- END TEACHERS PAGE SECTION -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    $('.portfolio-filter-menu ul li').on('click', function () {
      var selector = $(this).attr('data-filter');
      $('.single-team-wrapper').hide();
      if (selector === '*') {
        $('.single-team-wrapper').show();
      } else {
        $('.single-team-wrapper' + selector).show();
      }
    });
  });
</script>
@endsection