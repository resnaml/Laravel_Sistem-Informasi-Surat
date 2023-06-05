@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2 class="container">Akun Saya</h1>
    </div>
    <div class="d-flex border-bottom border-dark mb-3">
        <a class="btn btn-primary border-bottom" href="/dashboard/kelolaakun"><i class="bi bi-caret-left"></i> Kembali</a>
    </div>
    

            <div class="card mt-3 container-fluid mb-4 col-4">
                <div class="card-header border text-center">
                    <i class="bi bi-file-earmark-person" style="font-size: 3.0rem;"></i>
                <h5>Detail User</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">NIP</th>
                            <td>: {{ $user->nip }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>: {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td colspan="2">: {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan</th>
                            <td colspan="2">: {{ $user->jabatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No Telpon</th>
                            <td colspan="2">: {{ $user->telepon }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Lahir</th>
                            <td colspan="2">: {{ $user->tgl_lahir }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Is Admin</th>
                            @if ($user->is_admin == 1)
                            <td colspan="2"> :
                                <i class="bi bi-shield-check" style="font-size: 1.5rem;"></i>
                            @else
                                <td colspan="2">: <i class="bi bi-shield-fill-x" style="font-size: 1.5rem;"></i></td>
                            @endif    
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td colspan="2">: {{ $user->alamat }}</td>
                        </tr>
                        </tbody>        
                    </table>
                </div>
            </div>

    @endsection