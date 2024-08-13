@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Jadwal Kegiatan</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a>Jadwal Kegiatan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->
<div class="auto-container text-center">
  <H2 style="margin-bottom: 15px"><strong>JADWAL KEGIATAN SANTRI</strong></H2>
  <div class="table-responsive" style="display: flex; justify-content: center; align-items: center;">
    <table id="example3" class="table table-striped table-bordered" style="width: 60%">
      <thead>
        <tr>
          <th width="5px">No</th>
          <th>Waktu</th>
          <th>Kegiatan</th>
        </tr>
      </thead>
      <tbody>
        @php $no = 1; @endphp
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">03.00 - 05.00 WIB</td>
          <td style="text-align: justify">Bangun Pagi, Sholat tahajjud, dan
            sholat shubuh berjama’ah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">05.00 - 06.00 WIB</td>
          <td style="text-align: justify">Dzikir pagi & Halaqah Tahfidz
            Alqur’an</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">06.00 - 06.45 WIB</td>
          <td style="text-align: justify">Sarapan, Piket kamar, dan
            persiapakan berangkat sekolah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">06.45 - 07.00 WIB</td>
          <td style="text-align: justify">Apel pagi dan shlat dhuha
            berjama’ah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">07.00 - 09.30 WIB</td>
          <td style="text-align: justify">Kegiatan belajar di kelas</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">09.30 - 10.30 WIB</td>
          <td style="text-align: justify">Istirahat</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">10.30 - 12.00 WIB</td>
          <td style="text-align: justify">Lanjutan kegiatan belajar</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">12.30 - 13.00 WIB</td>
          <td style="text-align: justify">Sholat dhuhur berjama’ah & Makan
            Siang</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">13.00 - 14.00 WIB</td>
          <td style="text-align: justify">Lanjutan kegiatan belajar</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">14.00 - 15.10 WIB</td>
          <td style="text-align: justify">Pulang sekolah & kegiatan mandiri</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">15.10 - 15.30 WIB</td>
          <td style="text-align: justify">Sholat ashar berjama’ah & persiapan
            madrasah diniyyah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">15.30 - 16.50 WIB</td>
          <td style="text-align: justify">Madrasah Diniyyah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">16.50 - 17.20 WIB</td>
          <td style="text-align: justify">Makan malam & persiapan sholat
            maghrib</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">17.20 - 18.15 WIB</td>
          <td style="text-align: justify">Sholat maghrib & dzikir</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">18.10 - 19.00 WIB</td>
          <td style="text-align: justify">Halaqah Tahfidz Alqur’an</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">19.00 – 19.30 WIB</td>
          <td style="text-align: justify">Sholat isya’ berjama’ah</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">19.30 – 20.00 WIB</td>
          <td style="text-align: justify">Persiapan belajar mandiri/bimbingan
            belajar</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">20.00 – 22.00 WIB</td>
          <td style="text-align: justify">Belajar mandiri</td>
        </tr>
        <tr>
          <td>{{$no++}}</td>
          <td style="text-align: justify">22.00 – 03.00 WIB</td>
          <td style="text-align: justify">Tidur</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection