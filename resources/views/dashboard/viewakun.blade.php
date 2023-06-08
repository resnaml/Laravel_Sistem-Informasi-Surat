@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2>Form User</h1>
    </div>

    <div class="border-bottom border-dark">
        <a class="btn btn-primary mb-2" href="/dashboard"><i class="bi bi-caret-left"></i> Kembali</a>
    </div>
    
            <div class="card mt-4 container-fluid border col-4 mb-5">
                <div class="card-header text-center">
                <i class="bi bi-file-earmark-person" style="font-size: 3.0rem;"></i>
                <h5>Akun Saya</h5>   
            </div>

                <div class="card-body">
                    <table class="table rounded">
                        <tbody>

                            <tr>
                                <th scope="row">Nama</th>
                                <td>: {{ $name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Username</th>
                                <td>: {{ $username }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>: {{ $email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jabatan</th>
                                <td>: {{ $jabatan }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tgl Lahir</th>
                                <td>: {{ $tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th scope="row">No Telpon</th>
                                <td>: {{ $telepon }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>: {{ $alamat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Is Admin</th>
                                @if ($admin == 1)
                                <td colspan="2"> :
                                    <i class="bi bi-shield-check" style="font-size: 1.5rem;"></i>
                                @else
                                    <td colspan="2">: <i class="bi bi-shield-fill-x" style="font-size: 1.5rem;"></i></td>
                                @endif    
                            </tr>

                        </tbody>
                        
                    </table>
                </div>
            </div>

    @endsection