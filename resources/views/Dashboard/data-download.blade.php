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
            <li class="breadcrumb-item active" aria-current="page">Data Downloads</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end breadcrumb -->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">DATA DOWNLOAD
            <button class="btn btn-sm float-end" style="background-color: #b7d5ac" data-toggle="modal"
              data-target="#addModal">
              <i class="bx bx-plus"></i> Tambah Data
            </button>
          </h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example3" class="table table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Nama File</th>
                <th>File</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($download as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{ $data->nama_file }}</td>
                <td>
                  <button class="btn btn-primary"
                    onclick="openPDF('{{ asset('storage/dokumen/' . $data->file) }}')">View PDF</button>
                </td>
                <td>
                  <button data-toggle="modal" data-target="#myModalEdit{{$data->id}}"
                    data-nama_file="{{ $data->nama_file}}" data-file="{{$data->file}}" class="btn btn-warning"><i
                      class="bx bx-edit"></i></button>
                  <button data-toggle="modal" data-target="#myModalDelete{{$data->id}}" class="btn btn-danger"><i
                      class='bx bxs-trash'></i></button>
                </td>
              </tr>
              <!-- Modal Edit -->
              <div id="myModalEdit{{$data->id}}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">EDIT DATA DOWNLOAD</h4>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-download/update/{{$data->id}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="container-fluid">
                          <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="nama_file">Nama File</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <input name="nama_file" type="text"
                                  class="form-control @error('nama_file') is-invalid @enderror" id="nama_file"
                                  placeholder="Masukkan Nama Kegiatan" value="{{$data->nama_file}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="current_file">File saat ini</label>
                              <div class="rounded-border">
                                <embed src="{{ asset('storage/dokumen/' . $data->file) }}" type="application/pdf"
                                  width="100%" height="400px">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label for="file">Ubah File</label>
                                <input name="file" type="file" class="form-control @error('file') is-invalid @enderror"
                                  id="file" value="">
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
                      <h4 class="modal-title">HAPUS DATA DOWNLOAD</h4><button type="button" class="btn-close"
                        data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-download/delete/{{$data->id}}">
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
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">TAMBAH DATA DOWNLOAD</h4>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" action="/data-download">
                  @csrf
                  <div class="modal-body">
                    <div class="container-fluid">
                      <input type="hidden" name="id" class="form-control" value="">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="nama_file">Nama File</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <input name="nama_file" type="text"
                              class="form-control @error('nama_file') is-invalid @enderror" id="nama_file"
                              placeholder="Masukkan Nama Kegiatan" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="file">File</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <input name="file" type="file" class="form-control @error('file') is-invalid @enderror"
                              id="file" value="" required>
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

<script>
  function openPDF(pdfPath) {
  window.open(pdfPath, '_blank');
  }
</script>
@endsection