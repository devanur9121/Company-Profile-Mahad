@extends('Dashboard.index')

@section('content')
<!-- page-content-wrapper -->
<div class="page-content-wrapper">
  <div class="page-content">
    <!-- breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Table</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="/beranda"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Staff Pendidik</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end breadcrumb -->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">DATA STAFF MA'HAD
            <button class="btn btn-sm float-end" style="background-color: #b7d5ac" data-toggle="modal"
              data-target="#addModal">
              <i class="bx bx-plus"></i> Tambah Staff
            </button>
          </h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width: 100% ">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Nama Lengkap</th>
                <th>Keasramaan</th>
                <th>Jabatan</th>
                <th class="no-export">Foto</th>
                <th class="no-export">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($staff as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>{{ $data->jenis_mahad }}</td>
                <td>{{ $data->bidang_kerja }}</td>
                <td class="no-export">
                  <img src="{{ asset('storage/staff/' . $data->foto) }}" alt="Foto Staff" width="100" height="120">
                </td>
                <td class="no-export">
                  <button data-toggle="modal" data-target="#myModalEdit{{$data->id}}"
                    data-nama_lengkap="{{ $data->nama_lengkap}}" data-jenis_mahad="{{$data->jenis_mahad}}"
                    data-bidang_kerja="{{$data->bidang_kerja}}" data-foto="{{$data->foto}}" class="btn btn-warning"><i
                      class="bx bx-edit"></i></button>
                  <button data-toggle="modal" data-target="#myModalDelete{{$data->id}}" class="btn btn-danger"><i
                      class='bx bxs-trash'></i></button>
                </td>
              </tr>
              <!-- Modal Edit -->
              <div id="myModalEdit{{$data->id}}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">EDIT DATA STAFF</h4>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-staff/update/{{$data->id}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="container-fluid">
                          <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                          <div class="form-group mb-2">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text"
                              class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                              placeholder="Masukkan Nama Lengkap" value="{{$data->nama_lengkap}}">
                          </div>
                          <div class="form-group mb-2">
                            <label for="jenis_mahad">Keasramaan</label>
                            <select name="jenis_mahad" class="form-control @error('jenis_mahad') is-invalid @enderror"
                              id="jenis_mahad">
                              <option value="">--- Pilih Jenis Keasramaan ---</option>
                              <option value="Mahad Putra" @if($data->jenis_mahad == 'Mahad Putra') selected
                                @endif>Ma'had Putra</option>
                              <option value="Mahad Putri" @if($data->jenis_mahad == 'Mahad Putri') selected
                                @endif>Ma'had Putri</option>
                            </select>
                          </div>
                          <div class="form-group mb-2">
                            <label for="bidang_kerja">Jabatan</label>
                            <input name="bidang_kerja" type="text"
                              class="form-control @error('bidang_kerja') is-invalid @enderror" id="bidang_kerja"
                              placeholder="Masukkan Ahli Bidang" value="{{$data->bidang_kerja}}">
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label for="current_foto">Foto Saat Ini</label>
                                <div class="rounded-border">
                                  <img src="{{ asset('storage/staff/' . $data->foto) }}" alt="Foto Staff" width="150"
                                    height="150">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label for="foto">Ubah Foto</label>
                                <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                  id="foto" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal Edit -->

              <!-- Modal Delete -->
              <div id="myModalDelete{{$data->id}}" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">HAPUS DATA STAFF</h4><button type="button" class="btn-close"
                        data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-staff/delete/{{$data->id}}">
                      @csrf
                      @method('DELETE')
                      <div class="container-fluid">
                        <h1 style="color:#C91D22; text-align:center;">Delete Data</h1>
                        <p style="color:red; text-align:center;">Anda yakin ingin menghapus data yang telah tersimpan?
                        </p>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal Delete -->
              @endforeach
            </tbody>
          </table>
          <!-- Modal Tambah Admin -->
          <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">TAMBAH DATA STAFF</h4>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" action="/data-staff">
                  @csrf
                  <div class="modal-body">
                    <div class="container-fluid">
                      <input type="hidden" name="id" class="form-control" value="">
                      <div class="form-group mb-2">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text"
                          class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                          placeholder="Masukkan Nama Lengkap" value="" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="jenis_mahad">Keasramaan</label>
                        <select name="jenis_mahad" class="form-control @error('jenis_mahad') is-invalid @enderror"
                          id="jenis_mahad">
                          <option value="">--- Pilih Jenis Keasramaan ---</option>
                          <option value="Mahad Putra">Ma'had Putra</option>
                          <option value="Mahad Putri">Ma'had Putri</option>
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <label for="bidang_kerja">Ahli Bidang Ajar</label>
                        <input name="bidang_kerja" type="text"
                          class="form-control @error('bidang_kerja') is-invalid @enderror" id="bidang_kerja"
                          placeholder="Masukkan Ahli Bidang" value="" required>
                      </div>
                      <div class="form-group mb-2">
                        <label for="foto">Foto</label>
                        <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                          id="foto" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Tambah Admin -->
        </div>
      </div>
    </div>
    <!-- End Row -->
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection