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
            <li class="breadcrumb-item active" aria-current="page">Data Struktur Organisasi</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end breadcrumb -->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">DATA STRUKTUR MA'HAD
            <button class="btn btn-sm float-end" style="background-color: #b7d5ac" data-toggle="modal"
              data-target="#addModal">
              <i class="bx bx-plus"></i> Tambah Pengurus
            </button>
          </h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width: 100% ">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Jabatan</th>
                <th>Nama Koordinator</th>
                <th>Anggota 1</th>
                <th>Anggota 2</th>
                <th class="no-export">Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($struktur as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->anggota1 }}</td>
                <td>{{ $data->anggota2 }}</td>
                <td class="no-export">
                  <button data-toggle="modal" data-target="#myModalEdit{{$data->id}}" data-jabatan="{{ $data->jabatan}}"
                    data-jabatan="{{$data->jabatan}}" data-anggota1="{{$data->anggota1}}"
                    data-anggota2="{{$data->anggota2}}" class="btn btn-warning"><i class="bx bx-edit"></i></button>
                  <button data-toggle="modal" data-target="#myModalDelete{{$data->id}}" class="btn btn-danger"><i
                      class='bx bxs-trash'></i></button>
                </td>
              </tr>
              <!-- Modal Edit -->
              <div id="myModalEdit{{$data->id}}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">EDIT DATA PENGURUS</h4>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-struktur/update/{{$data->id}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="container-fluid">
                          <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                          <div class="form-group mb-2">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                              id="jabatan">
                              <option value="">--- Pilih Jenis Jabatan ---</option>
                              <option value="Ketua" @if($data->jabatan == 'Ketua') selected
                                @endif>Ketua</option>
                              <option value="Wakil Ketua" @if($data->jabatan == 'Wakil Ketua') selected
                                @endif>Wakil Ketua</option>
                              <option value="Sekretaris" @if($data->jabatan == 'Sekretaris') selected
                                @endif>Sekretaris</option>
                              <option value="Bendahara" @if($data->jabatan == 'Bendahara') selected
                                @endif>Bendahara</option>
                              <option value="Bagian Keamanan" @if($data->jabatan == 'Bagian Keamanan') selected
                                @endif>Bagian Keamanan</option>
                              <option value="Bagian Bahasa" @if($data->jabatan == 'Bagian Bahasa') selected
                                @endif>Bagian Bahasa</option>
                              <option value="Bagian Kesenian" @if($data->jabatan == 'Bagian Kesenian') selected
                                @endif>Bagian Kesenian</option>
                              <option value="Bagian Acara" @if($data->jabatan == 'Bagian Acara') selected
                                @endif>Bagian Acara</option>
                              <option value="Bagian Informasi" @if($data->jabatan == 'Bagian Informasi') selected
                                @endif>Bagian Informasi</option>
                              <option value="Bagian Pengajaran" @if($data->jabatan == 'Bagian Pengajaran') selected
                                @endif>Bagian Pengajaran</option>
                              <option value="Bagian Kesehatan" @if($data->jabatan == 'Bagian Kesehatan') selected
                                @endif>Bagian Kesehatan</option>
                              <option value="Bagian Kebersihan" @if($data->jabatan == 'Bagian Kebersihan') selected
                                @endif>Bagian Kebersihan</option>
                              <option value="Bagian Dokumentasi" @if($data->jabatan == 'Bagian Dokumentasi') selected
                                @endif>Bagian Dokumentasi</option>
                            </select>
                          </div>
                          <div class="form-group mb-2">
                            <label for="koordinator">Nama Koordinator</label>
                            <input name="koordinator" type="text"
                              class="form-control @error('koordinator') is-invalid @enderror" id="koordinator"
                              placeholder="Masukkan Nama Lengkap" value="{{$data->koordinator}}">
                          </div>
                          <div class="form-group mb-2">
                            <label for="anggota1">Anggota 1</label>
                            <input name="anggota1" type="text"
                              class="form-control @error('anggota1') is-invalid @enderror" id="anggota1"
                              placeholder="Tidak Wajib Diisi" value="{{$data->anggota1}}">
                          </div>
                          <div class="form-group mb-2">
                            <label for="anggota2">Anggota 2</label>
                            <input name="anggota2" type="text"
                              class="form-control @error('anggota2') is-invalid @enderror" id="anggota1"
                              placeholder="Tidak Wajib Diisi" value="{{$data->anggota2}}">
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
                      <h4 class="modal-title">HAPUS DATA PENGURUS</h4><button type="button" class="btn-close"
                        data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-struktur/delete/{{$data->id}}">
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
                  <h4 class="modal-title">TAMBAH DATA PENGURUS</h4>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" action="/data-struktur">
                  @csrf
                  <div class="modal-body">
                    <div class="container-fluid">
                      <input type="hidden" name="id" class="form-control" value="">
                      <div class="form-group mb-2">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan">
                          <option value="">--- Pilih Jenis Jabatan ---</option>
                          <option value="Ketua">Ketua</option>
                          <option value="Wakil Ketua">Wakil Ketua</option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Bagian Keamanan">Bagian Keamanan</option>
                          <option value="Bagian Bahasa">Bagian Bahasa</option>
                          <option value="Bagian Kesenian">Bagian Kesenian</option>
                          <option value="Bagian Acara">Bagian Acara</option>
                          <option value="Bagian Informasi">Bagian Informasi</option>
                          <option value="Bagian Pengajaran">Bagian Pengajaran</option>
                          <option value="Bagian Kesehatan">Bagian Kesehatan</option>
                          <option value="Bagian Kebersihan">Bagian Kebersihan</option>
                          <option value="Bagian Dokumentasi">Bagian Dokumentasi</option>
                        </select>
                      </div>
                      <div class="form-group mb-2">
                        <label for="koordinator">Nama Koordinator</label>
                        <input name="koordinator" type="text"
                          class="form-control @error('koordinator') is-invalid @enderror" id="koordinator"
                          placeholder="Masukkan Nama Koordinator" value="">
                      </div>
                      <div class="form-group mb-2">
                        <label for="anggota1">Anggota 1</label>
                        <input name="anggota1" type="text" class="form-control @error('anggota1') is-invalid @enderror"
                          id="anggota1" placeholder="Tidak Wajib Diisi" value="">
                      </div>
                      <div class="form-group mb-2">
                        <label for="anggota2">Anggota 2</label>
                        <input name="anggota2" type="text" class="form-control @error('anggota2') is-invalid @enderror"
                          id="anggota1" placeholder="Tidak Wajib Diisi" value="">
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