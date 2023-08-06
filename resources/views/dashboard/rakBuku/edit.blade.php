@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Ubah Data Rak</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">UBAH DATA RAK</h5>
                        <form action="/dashboard/data-rak/{{ $detailrak->slug }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                          <div class="mb-3 row">
                            <label for="namaRak" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama Rak</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('namaRak')
                                  is-invalid
                              @enderror mb-3" id="namaRak" name="namaRak" placeholder="Masukkan Nama Rak" value="{{ old('namaRak', $detailrak->namaRak) }}" required>
                              @error('namaRak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror

                              <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug', $detailrak->slug) }}" required>

                              <div class="col-lg-offset-2 col-lg-10">
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                  <a href="/dashboard/data-rak" class="btn btn-danger">Batal</a>
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
  const namaRak = document.querySelector('#namaRak');
  const slug = document.querySelector('#slug');
  
  namaRak.addEventListener('keyup', () => {
    fetch('/dashboard/data-rak/buatSlug2?namaRak=' + namaRak.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endpush