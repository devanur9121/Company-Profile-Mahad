@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Image Gallery</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Gallery</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

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
            <li class="filter" data-filter=".{{ $kegiatan->kegiatan_id }}">{{ $kegiatan->kegiatan->jenis_kegiatan }}
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
  <!-- blog pagination -->
  <div class="row wow fadeInUp mt-5">
    <div class="col-12">
      <div class="site-pagination">
        <div class="navbar justify-content-center">
          <ul class="pagination">
            @if($galeri->onFirstPage())
            <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $galeri->previousPageUrl() }}" rel="prev"
                aria-label="Previous">&laquo;</a></li>
            @endif

            @foreach(range(1, $galeri->lastPage()) as $page)
            @if($page == $galeri->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $galeri->url($page) }}">{{ $page }}</a></li>
            @endif
            @endforeach

            @if($galeri->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $galeri->nextPageUrl() }}" rel="next"
                aria-label="Next">&raquo;</a></li>
            @else
            <li class="page-item disabled"><span class="page-link" aria-hidden="true">&raquo;</span></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end blog pagination -->
</section>
<!-- END PORTFOLIO PAGE SECTION -->

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
@endsection