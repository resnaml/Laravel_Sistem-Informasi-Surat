@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="container">Akun Saya</h1>
    </div>

    <a class="btn btn-primary" href="/dashboard/kelolaakun"><i class="bi bi-caret-left"></i> Kembali</a>

            <div class="card mt-2 container-fluid col-6">
                <div class="card-header text-center">
                <h3>Detail User</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td colspan="2">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan</th>
                            <td colspan="2">{{ $user->jabatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No Telpon</th>
                            <td colspan="2">{{ $user->telepon }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td colspan="2">{{ $user->alamat }}</td>
                        </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>

    @endsection