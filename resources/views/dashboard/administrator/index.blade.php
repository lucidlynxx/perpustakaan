@extends('dashboard.layouts.main')

@section('container')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Data Administrator</strong></h1>

            <div class="row">
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100 p-3">
                        <h5 class="card-title mb-3">Daftar Administrator</h5>
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="/dashboard/data-administrator/create" class="btn btn-primary mb-3">Tambah Administrator</a>
                        </div>
                        <table class="table table-hover my-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Gender</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administrators as $administrator)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $administrator->name }}</td>
                                    <td>{{ $administrator->username }}</td>
                                    <td>{{ $administrator->alamat }}</td>
                                    <td>{{ $administrator->noTelepon }}</td>
                                    <td>{{ $administrator->jenisKelamin }}</td>
                                    <td>
                                        @livewire('administrator-alert', ['administratorId' => $administrator->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Gender</th>
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