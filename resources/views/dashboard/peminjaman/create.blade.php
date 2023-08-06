@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Tambah Data Peminjaman</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">TAMBAH DATA PEMINJAMAN</h5>
                        <form action="/dashboard/data-peminjaman" method="post" enctype="multipart/form-data">
                          @csrf
                          
                          <div class="mb-3 row">
                            <label for="buku_id" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Judul</label>
                            <div class="col-sm-10">
                              <select class="form-select @error('buku_id')
                                  is-invalid
                              @enderror" id="buku_id" name="buku_id" required>
                                  <option value="#">-- Pilih Buku --</option>
                              @foreach ($bukus as $buku)
                                @if (old('buku_id') == $buku->id)
                                  <option value="{{ $buku->id }}" selected>{{ $buku->judul }}</option>
                                @else
                                  <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                @endif
                              @endforeach 
                              </select>
                              @error('buku_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="siswa_id" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama</label>
                            <div class="col-sm-10">
                              <select class="form-select @error('siswa_id')
                                  is-invalid
                              @enderror" id="siswa_id" name="siswa_id" required>
                                  <option value="#">-- Pilih Siswa --</option>
                              @foreach ($siswas as $siswa)
                                @if (old('siswa_id') == $siswa->id)
                                  <option value="{{ $siswa->id }}" selected>{{ $siswa->nama }}</option>
                                @else
                                  <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endif
                              @endforeach 
                              </select>
                              @error('siswa_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>

                          <div class="mb-3 row">
                            <label for="tglPinjam" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tanggal Pinjam</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext @error('tglPinjam')
                                  is-invalid
                              @enderror" id="tglPinjam" value="{{ $current->format('Y-m-d') }}" name="tglPinjam" required>
                              @error('tglPinjam')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
    
                          <div class="mb-3 row">
                            <label for="tglKembali" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tanggal Kembali</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext @error('tglKembali')
                                  is-invalid
                              @enderror" id="tglKembali" value="{{ $current->addDays(5)->format('Y-m-d') }}" name="tglKembali" required>
                              @error('tglKembali')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Status</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext @error('status')
                                  is-invalid
                              @enderror" id="status" placeholder="Masukkan Status" value="pinjam" name="status" required>
                              @error('status')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="terlambat" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Terlambat</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext @error('terlambat')
                                  is-invalid
                              @enderror mb-3" id="terlambat" placeholder="Masukkan Keterlambatan" value="0 hari" name="terlambat" required>
                              @error('terlambat')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror

                              <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/dashboard/data-peminjaman" class="btn btn-danger">Batal</a>
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
  const siswa_id = document.querySelector('#siswa_id');
  const slug = document.querySelector('#slug');
  const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

  function generateString(length) {
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
  }
  
  siswa_id.addEventListener('change', () => {
    let preslug = siswa_id.length;
    preslug = generateString(preslug);
    slug.value = preslug;
  });
</script>
@endpush