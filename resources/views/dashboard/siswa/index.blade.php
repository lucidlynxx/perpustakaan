@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Data Siswa</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">Daftar Siswa</h5>
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="/dashboard/data-siswa/create" class="btn btn-primary mb-3">Tambah Siswa</a>
                        </div>
                        <table class="table table-hover my-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tgl Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->kelas }}</td>
                                    <td>{{ date('d M Y', strtotime($siswa->tglLahir)); }}</td>
                                    <td>
                                        <a href="/dashboard/data-siswa/{{ $siswa->slug }}"><i data-feather="eye"></i></a>
                                        <a href="/dashboard/data-siswa/{{ $siswa->slug }}/edit"><i data-feather="edit-2"></i></a>
                                        @livewire('siswa-alert', ['siswaId' => $siswa->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tgl Lahir</th>
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