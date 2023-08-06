@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Data Siswa</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">Detail Data Siswa</h5>
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="/dashboard/data-siswa" class="btn btn-success mb-3">Kembali</a>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th class="d-none d-xl-table-cell">{{ $detailsiswa->nisn }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailsiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailsiswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td class="d-none d-xl-table-cell">{{ date('d M Y', strtotime($detailsiswa->tglLahir)) }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailsiswa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailsiswa->jenisKelamin }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection