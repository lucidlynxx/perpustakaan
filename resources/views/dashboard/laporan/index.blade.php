@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Laporan Perustakaan</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">CETAK DATA LAPORAN</h5>

                          <div class="mb-3 row">
                            <label for="pilihData" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Pilih Data</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" id="pilihData" name="pilihData" required> 
                                    <option value="#" selected>-- Pilih Data --</option>
                                    <option value="siswa">Data Siswa</option>
                                    <option value="administrator">Data Administrator</option>
                                    <option value="buku">Data Buku</option>
                                    <option value="rak">Data Rak</option>
                                    <option value="peminjaman">Data Peminjaman</option>
                                    <option value="pinjam">Data Pengembalian (Status pinjam)</option>
                                    <option value="kembali">Data Pengembalian (Status kembali)</option>
                                </select>

                              <div class="col-lg-offset-2 col-lg-10">
                                  <a id="submit" class="btn btn-primary">Cetak</a>
                                  <a href="/dashboard/data-laporan" class="btn btn-danger">Batal</a>
                              </div>
                            </div>
                          </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push('slug')
    <script>
        const pilihData = document.querySelector('#pilihData');
        const submit = document.querySelector('#submit');
        let redirectTo = ''

        const handleChange = (event) => {
        const { value } = event.target
        redirectTo = `/dashboard/print/${value}`
        }

        const handleSubmit = (_event) => {
        window.open(redirectTo);
        }

        pilihData.addEventListener('change', handleChange);
        submit.addEventListener('click', handleSubmit);
    </script>
@endpush