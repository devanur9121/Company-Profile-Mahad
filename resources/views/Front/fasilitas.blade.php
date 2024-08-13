@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Fasilitas</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Semua Fasilitas</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->
<section id="galleryPage" class="section-padding">
  <div class="auto-container">
    <div class="row project-list">
      @foreach ($fasilitas as $data)
      <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
        <figure class="portfolio-sin-item">
          <img class="img-fluid" src="{{ asset('storage/fasilitas/' . $data->foto) }}" alt="" />
          <figcaption>
            <h3>{{$data->nama_fasilitas}}</h3>
            <div class="port-icon mt-3">
              <a class="icon-ho venobox" href="{{ asset('storage/fasilitas/' . $data->foto) }}"
                data-title="{{$data->nama_fasilitas}}" data-gall="gall1"><i class="icofont-eye"></i></a>
            </div>
          </figcaption>
        </figure>
        <h6 style="text-align: center"><strong>{{$data->nama_fasilitas}}</strong></h6>
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
              @if($fasilitas->onFirstPage())
              <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>
              @else
              <li class="page-item"><a class="page-link" href="{{ $fasilitas->previousPageUrl() }}" rel="prev"
                  aria-label="Previous">&laquo;</a></li>
              @endif

              @foreach(range(1, $fasilitas->lastPage()) as $page)
              @if($page == $fasilitas->currentPage())
              <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
              @else
              <li class="page-item"><a class="page-link" href="{{ $fasilitas->url($page) }}">{{ $page }}</a></li>
              @endif
              @endforeach

              @if($fasilitas->hasMorePages())
              <li class="page-item"><a class="page-link" href="{{ $fasilitas->nextPageUrl() }}" rel="next"
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
  </div>
</section>
@endsection