@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Data Peminjaman</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">Daftar Data Peminjaman</h5>
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="/dashboard/data-peminjaman/create" class="btn btn-primary mb-3">Tambah Peminjaman</a>
                        </div>
                        <table class="table table-hover my-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <th>Total Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamen as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->siswa->nama }}</td>
                                    <td>{{ $peminjaman->buku->judul }}</td>
                                    <td>{{ date('d M Y', strtotime($peminjaman->tglPinjam)); }}</td>
                                    <td>{{ date('d M Y', strtotime($peminjaman->tglKembali)); }}</td>

                                    @if ($peminjaman->status == 'kembali')
                                        <td><span class="badge bg-info">{{ $peminjaman->status }}</span></td>
                                    @else
                                        <td><span class="badge bg-secondary">{{ $peminjaman->status }}</span></td>
                                    @endif

                                    @if ($current->format('Y-m-d') > $peminjaman->tglKembali && $peminjaman->status == 'pinjam')
                                        <td>{{ $peminjaman->tglKembali->diffInDays(); }} hari</td>
                                    @else
                                        <td>0 hari</td>
                                    @endif

                                    @if ($peminjaman->status == 'pinjam')
                                        <td>Rp. {{ $peminjaman->tglKembali->diffInDays() * 2000 }},-</td>
                                    @else
                                        <td>Tidak ada Denda</td>
                                    @endif

                                    <td>
                                    @if ($peminjaman->status == 'pinjam')
                                        <div class="btn-group-sm d-grid gap-1">
                                            <a href="/dashboard/data-peminjaman/{{ $peminjaman->slug }}" class="btn btn-primary">Menyerahkan</a>
                                            <a href="/dashboard/data-peminjaman/{{ $peminjaman->slug }}/perpanjang" class="btn btn-success">Perpanjang</a>
                                        </div>
                                    @else
                                        @livewire('peminjaman-alert', ['peminjamanId' => $peminjaman->id])
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <th>Total Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
