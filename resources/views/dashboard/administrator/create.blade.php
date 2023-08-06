@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Tambah Data Administrator</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">TAMBAH DATA ADMINISTRATOR</h5>
                        <form action="/dashboard/data-administrator" method="post" enctype="multipart/form-data">
                        @csrf

                          <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('name')
                                  is-invalid
                              @enderror" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" required>
                              @error('name')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('username')
                                  is-invalid
                              @enderror" id="username" placeholder="Masukkan Username" value="{{ old('username') }}" name="username" required>
                              @error('username')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control @error('password')
                                  is-invalid
                              @enderror" id="password" placeholder="Masukkan Password" name="password" required>
                              @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Alamat Lengkap</label>
                            <div class="col-sm-10">
                              <textarea rows="3" class="form-control @error('alamat')
                                  is-invalid
                              @enderror" id="alamat" placeholder="Masukkan Alamat Lengkap" name="alamat" required>{{ old('alamat') }}</textarea>
                              @error('alamat')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="noTelepon" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">No. Telepon</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control @error('noTelepon')
                                  is-invalid
                              @enderror" id="noTelepon" placeholder="Masukkan No. Telepon" value="{{ old('noTelepon') }}" name="noTelepon" required>
                              @error('noTelepon')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
                          
                          <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Jenis Kelamin</label>
                            @error('jenisKelamin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="laki-laki" name="jenisKelamin" value="Laki-laki" required @if (old('jenisKelamin') == 'laki-laki')
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="perempuan" name="jenisKelamin" value="Perempuan" required @if (old('jenisKelamin') == 'perempuan')
                                    checked
                                    @endif>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                  </div>
                                  
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button type="submit" href="#" class="btn btn-primary">Tambah</button>
                                      <a href="/dashboard/data-administrator" class="btn btn-danger">Batal</a>
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