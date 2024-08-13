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
            <li class="breadcrumb-item active" aria-current="page">Data Informasi</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end breadcrumb -->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">DATA INFORMASI MA'HAD
            <button class="btn btn-sm float-end" style="background-color: #b7d5ac" data-toggle="modal"
              data-target="#addModal">
              <i class="bx bx-plus"></i> Tambah Informasi
            </button>
          </h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example3" class="table table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Foto</th>
                {{-- <th>Judul</th> --}}
                <th>Kategori Informasi</th>
                <th>Tanggal Diupload</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($news as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>
                  @if (!empty($data->image_urls))
                  @foreach (json_decode($data->image_urls) as $imageUrl)
                  <img src="{{ $imageUrl }}" alt="Uploaded Photo" width="100">
                  @endforeach
                  @endif
                  {{-- <img src="{{ asset('storage/informasi/' . $data->foto) }}" alt="Foto Galeri Kegiatan"
                  width="100"> --}}
                </td>
                {{-- <td>{{ $data->title }}</td> --}}
                <td>{{ $data->kategori->nama_kategori }}</td>
                <td>{{ $data->tanggal->format('d-m-Y') }}</td>
                <td>
                  <button data-toggle="modal" data-target="#myModalEdit{{$data->id}}"
                    data-kategori_id="{{ $data->kategori_id}}" data-user_id="{{$data->user_id}}"
                    data-title="{{$data->title}}" data-deskripsi="{{$data->deskripsi}}" data-tags="{{$data->tags}}"
                    data-tanggal="{{$data->tanggal}}" data-foto="{{$data->foto}}" class="btn btn-warning"><i
                      class="bx bx-edit"></i></button>
                  <button data-toggle="modal" data-target="#myModalDelete{{$data->id}}" class="btn btn-danger">
                    <i class='bx bxs-trash'></i>
                  </button>
                </td>
              </tr>
              <!-- Modal Delete -->
              <div id="myModalDelete{{$data->id}}" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">HAPUS DATA GALERI KEGIATAN</h4><button type="button" class="btn-close"
                        data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-informasi/delete/{{$data->id}}">
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
              <!-- Modal Edit -->
              <div id="myModalEdit{{$data->id}}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">EDIT DATA INFORMASI MA'HAD</h4>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/data-informasi/update/{{$data->id}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="container-fluid">
                          <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                          <input type="hidden" name="user_id" class="form-control" value="{{$data->user_id}}">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="kategori_id">Jenis Kategori</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <select type="text" class="form-control @error('kategori_id') is-invalid @enderror"
                                  id="kategori_id" name="kategori_id">
                                  <option value="" selected="" disabled="">-Pilih Jenis
                                    Kategori-</option>
                                  @foreach($kategori as $role)
                                  @if($role->id == $data->kategori_id)
                                  <option value="{{ $role->id }}" selected>
                                    {{ $role->nama_kategori }}
                                  </option>
                                  @else
                                  <option value="{{ $role->id }}">{{ $role->nama_kategori }}</option>
                                  @endif
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="title">Judul Informasi</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <input name="title" type="text"
                                  class="form-control @error('title') is-invalid @enderror" id="title"
                                  placeholder="Masukkan Judul Informasi" value="{{$data->title}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="deskripsi">Deskripsi Informasi</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <textarea name="deskripsi" type="text"
                                  class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                  placeholder="Masukkan Deskripsi Informasi">{{$data->deskripsi}}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="tanggal">Tanggal Berita</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <input name="tanggal" type="date"
                                  class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                  placeholder="Masukkan Tanggal Berita" value="{{ $data->tanggal->format('Y-m-d') }}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group mb-2">
                                <label for="tags">Tag</label>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group mb-2">
                                <input name="tags" type="text" class="form-control @error('tags') is-invalid @enderror"
                                  id="tags" placeholder="Masukkan Tag (Pisahkan dengan koma)"
                                  value="{{ implode(',', json_decode($data->tags)) }}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="current_foto">Foto Saat Ini</label>
                              <div class="rounded-border">
                                @if (!empty($data->image_urls))
                                @foreach (json_decode($data->image_urls) as $imageUrl)
                                <img src="{{ $imageUrl }}" alt="Uploaded Photo" width="100">
                                @endforeach
                                @else
                                <p>Tidak ada gambar saat ini.</p>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group mb-2">
                                <label for="foto">Ubah Foto</label>
                                <input name="image_urls[]" type="file"
                                  class="form-control @error('image_urls') is-invalid @enderror" id="image_urls"
                                  accept="image/*" multiple>
                              </div>
                            </div>
                          </div><br>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal Edit -->
              @endforeach
            </tbody>
          </table>
          <!-- Modal Tambah Admin -->
          <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">TAMBAH DATA INFORMASI</h4>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" action="/data-informasi">
                  @csrf
                  <div class="modal-body">
                    <div class="container-fluid">
                      <input type="hidden" name="id" class="form-control" value="">
                      <input type="hidden" name="user_id" class="form-control" value="{{auth()->user()->id}}">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="kategori_id">Jenis Kategori</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <select type="text" class="form-control @error('kategori_id') is-invalid @enderror"
                              id="kategori_id" name="kategori_id">
                              <option value="" selected="" disabled="">-Pilih Jenis
                                Kategori-</option>
                              @foreach($kategori as $role)
                              @if($role->kategori_id == $role->id)
                              <option value="{{ $role->id }}" selected>
                                {{ $role->nama_kategori }}
                              </option>
                              @else
                              <option value="{{ $role->id }}">{{ $role->nama_kategori }}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="title">Judul Informasi</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                              id="title" placeholder="Masukkan Judul Informasi" value="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="deskripsi">Deskripsi Informasi</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <textarea name="deskripsi" type="text"
                              class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                              placeholder="Masukkan Deskripsi Informasi" value=""></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="tanggal">Tanggal Berita</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <input name="tanggal" type="date"
                              class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                              placeholder="Masukkan Tanggal Berita" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group mb-2">
                            <label for="tags">Tag</label>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group mb-2">
                            <input name="tags" type="text" class="form-control @error('tags') is-invalid @enderror"
                              id="tags" placeholder="Masukkan Tag (Pisahkan dengan koma)" value="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group mb-2">
                              <label for="foto">Foto</label>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group mb-2">
                              <input type="file" class="form-control @error('image_urls') is-invalid @enderror"
                                name="image_urls[]" multiple>
                            </div>
                          </div>
                        </div>
                      </div><br>
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