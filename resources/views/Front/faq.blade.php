@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Asked Question</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a> Faq's</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->

<!-- START FAQ PAGE SECTION -->
<section id="faq" class="section-padding">
  <div class="auto-container">
    <div class="row mb-5">
      <div class="col-lg-10 col-md-10 col-12 mx-auto">
        <div class="faq-lis-heading text-center">
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-list">
          <div class="panel-group faq-home-accor" id="accordion">
            <div class="panel panel-default mb-3">
              <div class="panel-heading">
                <h5 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1">
                    Apa sih Ma’had Bahrul Huda? <i class=" text-dark icofont icofont-minus"></i></a>
                </h5>
              </div>
              <div id="panel1" class="panel-collapse collapse show">
                <div class="panel-body text-dark">
                  <p>Ma'had Bahrul Huda merupakan Lembaga Pendidikan Islam yang berada di bawah
                    naungan Yayasan Bahrul Huda yang bertugas dalam melayani suatu pembinaan, pengembangan
                    akademik,
                    karakter santri dengan sistem pengelolaan asrama dengan berbasis pesantren atau biasa disebut
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
                    Berapa biaya pendidikan Ma’had Bahrul Huda? <i class=" text-dark icofont icofont-plus"></i></a>
                </h5>
              </div>
              <div id="panel2" class="panel-collapse collapse">
                <div class="panel-body text-dark">
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
                      class=" text-dark icofont icofont-plus"></i></a>
                </h5>
              </div>
              <div id="panel3" class="panel-collapse collapse">
                <div class="panel-body text-dark">
                  <p>Peraturan santri Ma’had Bahrul Huda dapat dilihat pada bagian <a href="/tata-tertib">Tata
                      Tertib</a>.</p>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h5 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel4">Apa saja
                    program yang diberikan Ma’had Bahrul Huda? <i class=" text-dark icofont icofont-plus"></i></a>
                </h5>
              </div>
              <div id="panel4" class="panel-collapse collapse">
                <div class="panel-body text-dark">
                  <p>Ma’had Bahrul Huda memiliki beberapa program unggulan antara lain, Madrasah Diniyyah, Menghafal
                    Al-Qur’an, Kajian Rutin, Ekstrakulikuler, dll. Untuk informasi lebih lanjutnya dapat di lihat pada
                    bagian <a href="/program">program</a>.</p>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h5 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel5">Bagaimana
                    cara mendaftar di Ma’had Bahrul Huda?<i class=" text-dark icofont icofont-plus"></i></a>
                </h5>
              </div>
              <div id="panel5" class="panel-collapse collapse">
                <div class="panel-body text-dark">
                  <p>Untuk mendaftar di Ma’had Bahrul Huda dapat melalui website PPDB <a
                      href="https://ppdb.smpbastuban.sch.id/#informasi-penting">SMP BAS Tuban</a> atau <a
                      href="https://ppdb.sma-alhuda.sch.id/">SMA AL HUDA <i>Boarding School</i></a>. Silakan
                    pilih sesuai jenjang yang diinginkan.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</section>
<!-- END FAQ PAGE SECTION -->
<!-- Tambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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