@extends('Front.index')

@section('content')
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Blog</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Blog Category </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<!-- START BLOG PAGE WELCOME SECTION -->
<section id="bloglist" class="section-padding">
  <div class="auto-container">
    <div class="row mb-lg-5 mb-0">
      <div class="col-lg-8 col-md-8 col-12">
        @foreach ($news_category as $item)
        <div class="single-blog-post wow fadeInUp">
          <div class="single-blog-post-wrap">
            <div class="single-blog-post-icon">
              <i class="icofont-photobucket"></i>
            </div>
            <div class="single-blog-post-content">
              <h4 class="single-blog-post-title">
                <a href="/blog-berita/{{ $item->id }}">{{ $item->title }}</a>
              </h4>
              <div class="single-blog-post-Info">
                <span><i class="icofont-user"></i>{{ $item->user->nama_lengkap }}</span>
                <small>/</small>
                <span><i class="icofont-comment"></i>{{ $commentCount }} Comments</span>
                <small>/</small>
                <span><i class="icofont-calendar"></i>{{ $item->tanggal->format('D, d M Y') }}</span>
                <small>/</small>
                <span class="tzcategory"><i class="icofont-ui-tag"></i>
                  <a href="/blog-berita/kategori/{{$item->kategori_id}}"
                    rel="category tag">{{ $item->kategori->nama_kategori }}</a>
                </span>
              </div>
              <div class="single-blog-post-img">
                @foreach (json_decode($item->image_urls) as $imageUrl)
                <img class="img-fluid" src="{{ $imageUrl }}" alt="">
                @endforeach
              </div>
              <p>
                {{ Str::limit(strip_tags(html_entity_decode($item->deskripsi)), 200) }}
              </p>
              <a href="/blog-berita/{{ $item->id }}" class="blog-read-more-btn">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- end single blog post -->

        <!-- blog pagination -->
        <div class="row wow fadeInUp mt-5">
          <div class="col-12">
            <div class="site-pagination">
              <div class="navbar justify-content-center">
                <ul class="pagination">
                  @if($news_category->onFirstPage())
                  <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>
                  @else
                  <li class="page-item"><a class="page-link" href="{{ $news_category->previousPageUrl() }}" rel="prev"
                      aria-label="Previous">&laquo;</a></li>
                  @endif

                  @foreach(range(1, $news_category->lastPage()) as $page)
                  @if($page == $news_category->currentPage())
                  <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                  @else
                  <li class="page-item"><a class="page-link" href="{{ $news_category->url($page) }}">{{ $page }}</a>
                  </li>
                  @endif
                  @endforeach

                  @if($news_category->hasMorePages())
                  <li class="page-item"><a class="page-link" href="{{ $news_category->nextPageUrl() }}" rel="next"
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
      <!-- end col -->

      <div class="col-lg-4 col-md-4 col-12 mt-lg-0 mt-md-0 mt-5 pl-lg-5 pl-md-5 pl-0">
        <div class="sidebar-widget post_wid mb-5">
          <div class="sidebar-widget-inner">
            <div class="sidebar-widget-title">
              <h5>Recent Post</h5>
            </div>
            @foreach ($recentPosts as $post)
            <div class="singleRecpost">
              @foreach (json_decode($post->image_urls) as $imageUrl)
              <img class="img-fluid" src="{{ $imageUrl }}" alt="">
              @endforeach
              <h6 class="recTitle"><a href="/blog-berita/{{ $post->id }}">{{ $post->title }}</a></h6>
              <p class="posted-on">{{ $post->tanggal->format('D, d M Y') }}</p>
            </div>
            @endforeach
          </div>
        </div>
        <!-- end sidebar widget -->
        <div class="sidebar-widget cat_wid service-links mb-5">
          <div class="sidebar-widget-inner">
            <div class="sidebar-widget-title">
              <h5>Popular Categories</h5>
            </div>
            <ul>
              @foreach ($popularCategories as $kategori)
              <li><a href="/blog-berita/kategori/{{$kategori->id}}"><i class="icofont-circled-right"></i>
                  {{ $kategori->nama_kategori }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- end sidebar widget -->
        <div class="sidebar-widget gal_wid mb-5">
          <div class="sidebar-widget-inner">
            <div class="sidebar-widget-title">
              <h5>Photo Gallery</h5>
            </div>
            <div class="gallery-grid">
              @foreach ($galleryPhotos as $photo)
              <div class="single-gallery-wrap">
                <div class="single-gallery">
                  <a href="#" class="open-modal" data-toggle="modal" data-target="#galleryModal-{{ $photo->id }}">
                    <div class="image-wrapper">
                      <img class="img-fluid" src="{{ asset('storage/galeri/' . $photo->foto) }}"
                        alt="{{ $photo->nama_kegiatan }}">
                      <i class="icofont-link"></i>
                    </div>
                  </a>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="galleryModal-{{ $photo->id }}" tabindex="-1" role="dialog"
                aria-labelledby="galleryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">
                    <div class="modal-header" style="color: black;">
                      <h5 style="color: white;" class="modal-title" id="galleryModalLabel">{{ $photo->nama_kegiatan }}
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="text-align: center; max-height: 80vh; overflow-y: auto;">
                      <img src="{{ asset('storage/galeri/' . $photo->foto) }}" class="img-fluid"
                        alt="{{ $photo->alt_text }}">
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <!-- end sidebar widget -->
          <div class="sidebar-widget tag_wid">
            <div class="sidebar-widget-inner">
              <div class="sidebar-widget-title">
                <h5>Tag Cloud</h5>
              </div>
              <div class="tag-list">
                @foreach ($popularTags as $tag)
                <span><a href="/blog-berita/tags/{{$tag->id}}">{{ $tag->nama }}</a></span>
                @endforeach
              </div>
            </div>
          </div>
          <!-- end sidebar widget -->
        </div>
        <!-- end col -->
      </div>
    </div>
</section>
<!-- END BLOG PAGE WELCOME SECTION -->
@endsection