@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Data Buku</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">Detail Data Buku</h5>
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="/dashboard/data-buku" class="btn btn-success mb-3">Kembali</a>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th class="d-none d-xl-table-cell">{{ $detailbuku->judul }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Penulis</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->penulis }}</td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->penerbit }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->tahun }}</td>
                                </tr>
                                <tr>
                                    <td>ISBN</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->isbn }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->jumlah }}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailbuku->rak->namaRak }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection