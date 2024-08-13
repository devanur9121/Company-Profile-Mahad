@extends('Front.index')

@section('content')
<!-- START PAGEBREDCUMS -->
<div class="page-banner page-banner-overlay" data-background="{{asset('Front/img/bg/banner-bg.jpg')}}">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="page-banner-content text-center">
          <h2 class="page-banner-title">Dokumen</h2>
          <div class="page-banner-breadcrumb">
            <p><a href="/home">Home</a>Surat-surat</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-banner-shape"></div>
</div>
<!-- END PAGEBREDCUMS -->
<div class="auto-container text-center">
  <h3 style="margin-bottom: 15px"><strong>DOKUMEN PERIZINAN</strong></h3>
  <div class="table-responsive" style="display: flex; justify-content: center; align-items: center;">
    <table id="example3" class="table table-striped table-bordered" style="width: 60%">
      <thead>
        <tr>
          <th width="5px">No</th>
          <th>Judul</th>
          <th>Download</th>
        </tr>
      </thead>
      <tbody>
        @php $no = 1; @endphp
        @foreach($download as $document)
        <tr>
          <td>{{ $no++ }}</td>
          <td style="text-align: justify">{{ $document->nama_file }}</td>
          <td><a href="{{ asset('storage/dokumen/' . $document->file) }}" target="_blank">
              <i class="icofont-cloud-download" style="font-size: 25px"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection