@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Blog</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Blog Show</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->
<!-- START BLOG PAGE WELCOME SECTION -->
<section id="blogsingle" class="section-padding">
  <div class="auto-container">
    <div class="row mb-lg-5 mb-0">
      <div class="col-lg-8 col-md-8 col-12">
        <div class="blog-single single-blog-post">
          <div class="single-blog-post-wrap">
            <div class="single-blog-post-icon">
              <i class="icofont-photobucket"></i>
            </div>
            <div class="single-blog-post-content">
              <h4 class="single-blog-post-title">
                <a href="/blog-berita/{{ $news_show->id }}">{{ $news_show->title }}</a>
              </h4>
              <div class="single-blog-post-Info">
                <span><i class="icofont-user"></i> {{ $news_show->user->nama_lengkap }}</span>
                <small>/</small>
                <span><i class="icofont-comment"></i>{{ $commentCount }} Comments</span>
                <small>/</small>
                <span><i class="icofont-calendar"></i>{{ $news_show->created_at->format('D, d M Y') }} </span>
                <small>/</small>
                <span class="tzcategory"><i class="icofont-ui-tag"></i><a
                    href="/blog-berita/kategori/{{$news_show->kategori_id}}"
                    rel="category tag">{{ $news_show->kategori->nama_kategori }}</a></span>
              </div>
              <div class="single-blog-post-img">
                @foreach (json_decode($news_show->image_urls) as $imageUrl)
                <img class="img-fluid" src="{{ asset($imageUrl) }}" alt="">
                @endforeach
              </div>
              <div class="blog-single-des mt-4">
                {!! $news_show->deskripsi !!}
              </div>
            </div>
          </div>

          <div class="blog-single-tag">
            <div class="blog-single-tag-wrap">
              <div class="blog-single-tag-icon">
                <i class="icofont-tag"></i>
              </div>
              <div class="blog-single-tag-list">
                <p>
                  <strong>TAG LISTS:</strong>
                  @php
                  $tagsArray = json_decode($news_show->tags);
                  @endphp

                  @if (is_array($tagsArray))
                  @foreach ($tagsArray as $tag)
                  <span>{{ $tag }}</span>@if (!$loop->last), @endif
                  @endforeach
                  @endif
                </p>
              </div>
            </div>
          </div>

          <!-- previous-next post -->
          <div class="blog-single-prevnxt">
            <div class="blog-single-prevnxt-wrap">
              <div class="blog-single-prevnxt-icon">
                <i class="icofont-ui-previous"></i>
              </div>
              <div class="blog-single-related-post">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-4">
                    @if($previousPost)
                    <div class="post-previous">
                      <span>Previous Post</span>
                      <h6><a href="/blog-berita/previousPost/{{$previousPost->id}}" data-toggle="tooltip"
                          data-placement="top"
                          title="View previous post"><strong>{{ $previousPost->title }}</strong></a></h6>
                    </div>
                    @endif
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    @if($nextPost)
                    <div class="post-next">
                      <span>Next Post</span>
                      <h6><a href="/blog-berita/nextPost/{{$nextPost->id}}" data-toggle="tooltip" data-placement="top"
                          title="View next post"><strong>{{ $nextPost->title }}</strong></a></h6>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- post comment -->
          <div class="blog-single-comment">
            <div class="blog-single-comment-wrap">
              <div class="blog-single-comment-icon">
                <i class="icofont-comment"></i>
              </div>
              <div class="blog-single-comment-des">
                <h4 class="title">Comments ({{ $comments->total() }})</h4>
                <div class="commet-list-content">
                  <ul class="commentlist">
                    @foreach ($comments as $comment)
                    <li class="comment @if ($comment->parent_comment_id) reply @endif">
                      <div class="comment-body clearfix">
                        <div class="comment-text">
                          <div class="author">
                            <span>
                              <a href="#">{{ $comment->nama }}</a>
                            </span>
                            <p>{{ $comment->created_at->format('F d, Y \a\t H:i a') }}
                              <a href="javascript:void(0);" class="reply-btn" data-comment-id="{{ $comment->id }}">
                                <i class="icofont-reply-all"></i> Reply
                              </a>
                              @if ($comment->parent_comment_id)
                              <span class="replied-to" style="display: inline; margin-left: 10px;">Replied to
                                {{ $comment->parentComment->nama }}</span>
                              @endif
                            </p>
                          </div>
                          <p>{{ $comment->comment }}</p>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- blog pagination -->
                <div class="row wow fadeInUp mt-5">
                  <div class="col-12">
                    <div class="site-pagination">
                      <div class="navbar justify-content-center">
                        <ul class="pagination">
                          @if($comments->onFirstPage())
                          <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>
                          @else
                          <li class="page-item"><a class="page-link" href="{{ $comments->previousPageUrl() }}"
                              rel="prev" aria-label="Previous">&laquo;</a></li>
                          @endif

                          @foreach(range(1, $comments->lastPage()) as $page)
                          @if($page == $comments->currentPage())
                          <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                          @else
                          <li class="page-item"><a class="page-link" href="{{ $comments->url($page) }}">{{ $page }}</a>
                          </li>
                          @endif
                          @endforeach

                          @if($comments->hasMorePages())
                          <li class="page-item"><a class="page-link" href="{{ $comments->nextPageUrl() }}" rel="next"
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
                <!-- Form Reply -->
                <div id="reply-form" style="display: none;">
                  <h4 class="title">Reply to Comment</h4>
                  <form class="blog-comment-form contact-form" method="POST" action="/komentar/reply">
                    @csrf
                    @if(isset($comment))
                    <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="{{ $comment->id }}">
                    @endif
                    <input type="hidden" name="news_id" value="{{ $news_show->id }}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <span class="form-icon"><i class="icofont-user"></i> Name*</span>
                          <input type="text" class="form-control" name="nama" placeholder="Your Name" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <span class="form-icon"><i class="icofont-envelope"></i> Email*</span>
                          <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group form-message">
                      <textarea class="form-control" name="comment" rows="6" placeholder="Enter your reply"
                        required></textarea>
                      <label for="bmessage">Comment</label>
                    </div>
                    <div class="text-center wow fadeInUp">
                      <button type="submit" class="btn faq-btn"
                        style="background-color:#007f16; color:white">Reply</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- comment form -->
          <div class="blog-single-comment-form">
            <div class="blog-single-comment-form-wrap">
              <div class="blog-single-comment-form-icon">
                <i class="icofont-envelope"></i>
              </div>
              <div class="blog-single-comment-form-inner">
                <h4 class="title">Leave a Comment</h4>
                <form class="blog-comment-form contact-form" method="POST" action="/komentar/store">
                  @csrf
                  <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="">
                  <input type="hidden" name="news_id" value="{{ $news_show->id }}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-icon"><i class="icofont-user"></i> Name*</span>
                        <input type="text" class="form-control" name="nama" placeholder="Ravela Okta" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span class="form-icon"><i class="icofont-envelope"></i> Email*</span>
                        <input type="email" class="form-control" name="email" placeholder="example@xyz.com" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group form-message">
                    <textarea class="form-control" name="comment" rows="6" placeholder="Masukkan Komentar"
                      required></textarea>
                    <label for="bmessage">Komentar</label>
                  </div>
                  <div class="text-center wow fadeInUp">
                    <button type="submit" class="btn faq-btn"
                      style="background-color:#007f16; color:white">Kirim</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
              <h6 class="recTitle"><a href="/blog-berita/{id}">{{ $post->title }}</a></h6>
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
        </div>
        <!-- end col -->
      </div>
    </div>
</section>
<!-- END BLOG PAGE WELCOME SECTION -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var replyButtons = document.querySelectorAll(".reply-btn");
    var replyForm = document.getElementById("reply-form");

    replyButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var commentId = button.getAttribute("data-comment-id");
            showReplyForm(commentId);
        });
    });

    function showReplyForm(commentId) {
        var parentCommentIdInput = document.getElementById("parent_comment_id");
        parentCommentIdInput.value = commentId;
        replyForm.style.display = "block";
    }
});
</script>
@endsection