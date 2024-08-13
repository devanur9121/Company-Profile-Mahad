@extends('Dashboard.index')

@section('content')
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card radius-15 overflow-hidden">
          <div class="card-body">
            <div class="d-flex">
              <div>
                <p class="mb-0 font-weight-bold">Staff Ma'had</p>
                <h2 class="mb-0">{{ $staff_count }}</h2>
              </div>
              <div class="ms-auto align-self-end">
                <p class="mb-0 text-warning" style="font-size:50px;">
                  <i class='bx bxs-user-check bx-flashing'></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card radius-15 overflow-hidden">
          <div class="card-body">
            <div class="d-flex">
              <div>
                <p class="mb-0 font-weight-bold">Galeri Kegiatan</p>
                <h2 class="mb-0">{{ $galeri }}</h2>
              </div>
              <div class="ms-auto align-self-end">
                <p class="mb-0 text-success" style="font-size:50px;">
                  <i class='bx bxs-camera bx-flashing'></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card radius-15 overflow-hidden">
          <div class="card-body">
            <div class="d-flex">
              <div>
                <p class="mb-0 font-weight-bold">Informasi Post</p>
                <h2 class="mb-0">{{ $news }}</h2>
              </div>
              <div class="ms-auto align-self-end">
                <p class="mb-0 text-default" style="font-size:50px;">
                  <i class='bx bx-layer bx-flashing'></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <!--end row-->
    <div class="card col-md-10 mx-auto">
      <div class="card-body" style="background-color:floralwhite">
        <div class="card-title">
          <h4 class="mb-0">INFORMASI STAFF MAHAD
            <a href="/data-staff" class="btn btn-sm float-end" style="background-color: #b7d5ac">
              <i class='bx bx-info-circle bx-tada'></i> View Staff
            </a>
          </h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example3" class="table table-striped table-bordered" style="width: 100%; text-align:center">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th width="15px">Nama Lengkap</th>
                <th>Keasramaan</th>
                {{-- <th>Jabatan</th> --}}
                <th>Foto</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($staff as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>{{ $data->jenis_mahad }}</td>
                {{-- <td>{{ $data->bidang_kerja }}</td> --}}
                <td>
                  <img src="{{ asset('storage/staff/' . $data->foto) }}" alt="Foto Staff" width="100" height="120">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection