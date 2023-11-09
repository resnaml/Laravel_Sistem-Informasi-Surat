@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="d-flex">
        <div class=" mb-2">
            <form action="/kelolaakun">
            <div class="d-flex mr-3">
                <input class="form-control" name="search" type="search" placeholder="Cari User...">

                <button class="btn btn-outline-primary ml-2" type="submit">Search</button>
            </div>
            </form>
        </div>
        <div class="mb-1">
            <a class="btn btn-primary mb-2" href="/kelolaakun/nip"><i class="bi bi-people-fill"></i></i> Daftar Pegawai</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Daftar User</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Sync</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($user as $akun)
                    <tbody>
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $akun['username'] }}</td>
                        <td>{{ $akun['email'] }}</td>
                        <td>{{ $akun['nip'] }}</td>
                        @if ( $akun['nip_id'] == true)
                            <td class="btn btn-success mt-2">Acc</td>
                        @else
                            <td class="btn btn-danger mt-2">Belum</td>
                        @endif
                        <td>
                            <a href="/kelolaakun/{{ $akun['id'] }}" class="btn btn-warning">Edit</a>
                            <form action="/kelolaakun/{{ $akun['id'] }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah kamu yakin untuk hapus data ??')">Hapus</button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection