@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2 class="container">Form User</h1>
    </div>

    <div class="border-bottom border-dark">
        <a class="btn btn-primary mb-2" href="/dashboard"><i class="bi bi-caret-left"></i> Kembali</a>
    </div>
    
            <div class="card mt-4 container-fluid col-6">
                <div class="card-header text-center">
                <i class="bi bi-file-earmark-person" style="font-size: 4.0rem;"></i>
                
                <h3>Akun Saya</h3>
                <a class="container btn btn-info col-5">Role User</a>    
            </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{ $name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td colspan="2">{{ $username }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td colspan="2">{{ $email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan</th>
                            <td colspan="2">{{ $jabatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td colspan="2">{{ $alamat }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tgl Lahir</th>
                            <td colspan="2">{{ $tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No Telpon</th>
                            <td colspan="2">{{ $telepon }}</td>
                        </tr>

                        </tbody>
                        
                    </table>
                </div>
            </div>

    @endsection