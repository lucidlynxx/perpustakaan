@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Tambah Data Buku</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">TAMBAH DATA BUKU</h5>
                        <form action="/dashboard/data-buku" method="post" enctype="multipart/form-data">
                        @csrf

                          <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Judul</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('judul')
                                  is-invalid
                              @enderror" id="judul" name="judul" placeholder="Masukkan Judul" value="{{ old('judul') }}" required>
                              @error('judul')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="penulis" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Penulis</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('penulis')
                                  is-invalid
                              @enderror" id="penulis" placeholder="Masukkan Penulis" value="{{ old('penulis') }}" name="penulis" required>
                              @error('penulis')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="penerbit" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Penerbit</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('penerbit')
                                  is-invalid
                              @enderror" id="penerbit" placeholder="Masukkan Penerbit" value="{{ old('penerbit') }}" name="penerbit" required>
                              @error('penerbit')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="tahun" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tahun</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control @error('tahun')
                                  is-invalid
                              @enderror" id="tahun" placeholder="Masukkan Tahun" value="{{ old('tahun') }}" name="tahun" required>
                              @error('tahun')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="isbn" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">ISBN</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control @error('isbn')
                                  is-invalid
                              @enderror" id="isbn" placeholder="Masukkan ISBN" value="{{ old('isbn') }}" name="isbn" required>
                              @error('isbn')
                                  {{ $message }}
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="jumlah" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Jumlah</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control @error('jumlah')
                                  is-invalid
                              @enderror" id="jumlah" placeholder="Masukkan Jumlah" value="{{ old('jumlah') }}" name="jumlah" required>
                              @error('jumlah')
                                  {{ $message }}
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="rak_id" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Lokasi</label>
                            <div class="col-sm-10">
                              <select class="form-select mb-3 @error('rak_id')
                                  is-invalid
                              @enderror" id="rak_id" name="rak_id" required>
                                  <option value="#">-- Pilih Rak --</option>
                              @foreach ($raks as $rak)
                                @if (old('rak_id') == $rak->id)
                                  <option value="{{ $rak->id }}" selected>{{ $rak->namaRak }}</option>
                                @else
                                  <option value="{{ $rak->id }}">{{ $rak->namaRak }}</option>
                                @endif
                              @endforeach 
                              </select>
                              @error('rak_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror

                              <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/dashboard/data-buku" class="btn btn-danger">Batal</a>
                            </div>
                            </div>
                          </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
