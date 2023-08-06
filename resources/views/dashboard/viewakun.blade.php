@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mb-2 border-bottom border-dark">
        <h2>Form User</h1>
    </div>

    <div class="border-bottom border-dark">
        <a class="btn btn-primary mb-2" href="/dashboard"><i class="bi bi-caret-left"></i> Kembali</a>
    </div>
    
            <div class="card mt-4 container-fluid border col-4 mb-4">
                <div class="card-header text-center">
                <i class="bi bi-file-earmark-person" style="font-size: 3.0rem;"></i>
                <h5>Akun Saya</h5>   
            </div>

            @foreach ($user as $item)
                <div class="card-body">
                    <table class="table rounded">
                        <tbody>
                            <tr>
                                <th scope="row">Username</th>
                                <td>: {{ $item->username }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>: {{ $item->email }}</td>
                            </tr>

                            @isset($item->nips_id)
                            <tr>
                                <th scope="row">Nama</th>
                                <td>: {{ $item->nips_id['nama_lengkap'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jabatan</th>
                                <td>: {{ $item->nips_id['jabatan'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tgl Lahir</th>
                                <td>: {{ $item->nips_id['tgl_lahir'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">No Telpon</th>
                                <td>: {{ $item->nips_id['telepon'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>: {{ $item->nips_id['alamat'] }}</td>
                            </tr>
                            @endisset
                        
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>

    @endsection