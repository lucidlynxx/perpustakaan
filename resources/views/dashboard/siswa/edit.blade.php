@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Ubah Data Siswa</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">UBAH DATA SISWA</h5>
                        <form action="/dashboard/data-siswa/{{ $detailsiswa->slug }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                          <div class="mb-3 row">
                            <label for="nisn" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">NISN</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control @error('nisn')
                                  is-invalid
                              @enderror" id="nisn" name="nisn" placeholder="Masukkan NISN" value="{{ old('nisn', $detailsiswa->nisn) }}" required>
                              @error('nisn')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('nama')
                                  is-invalid
                              @enderror" id="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama', $detailsiswa->nama) }}" name="nama" required>
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>

                          <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug', $detailsiswa->slug) }}" required>
    
                          <div class="mb-3 row">
                            <label for="kelas" class="col-sm-2 col-form-label text-end fw-semibold text-secondary @error('kelas')
                                is-invalid
                            @enderror">Kelas</label>
                            <div class="col-sm-10">
                              <select class="form-select" id="kelas" name="kelas" required> 
                                <option value="{{ old('kelas', $detailsiswa->kelas) }}" selected>{{ old('kelas', $detailsiswa->kelas) }}</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                              </select>
                              @error('kelas')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="tglLahir" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tanggal Lahir</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control @error('tglLahir')
                                  is-invalid
                              @enderror" id="tglLahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tglLahir', $detailsiswa->tglLahir) }}" name="tglLahir" required>
                              @error('tglLahir')
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
                              @enderror" id="alamat" placeholder="Masukkan Alamat Lengkap" name="alamat" required>{{ old('alamat', $detailsiswa->alamat) }}</textarea>
                              @error('alamat')
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
                                    <input class="form-check-input" type="radio" id="laki-laki" name="jenisKelamin" value="laki-laki" required @if (old('jenisKelamin', $detailsiswa->jenisKelamin) == 'laki-laki')
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="perempuan" name="jenisKelamin" value="perempuan" required @if (old('jenisKelamin', $detailsiswa->jenisKelamin) == 'perempuan')
                                    checked
                                    @endif>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                  </div>
                                  
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button type="submit" class="btn btn-primary">Ubah</button>
                                      <a href="/dashboard/data-siswa" class="btn btn-danger">Batal</a>
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

@push('slug')
<script>
  const nama = document.querySelector('#nama');
  const slug = document.querySelector('#slug');
  
  nama.addEventListener('change', () => {
    fetch('/dashboard/data-siswa/buatSlug?nama=' + nama.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endpush