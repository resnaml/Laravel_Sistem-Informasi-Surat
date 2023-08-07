@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex pt-3 pb-2 mb-4 border-bottom border-dark">
        <h2>Halaman Sifat Surat</h2>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    <div class="card col-5 container-fluid text-center border">
        <div class="container">
            <form action="/sifatsurat" class="mt-3 mb-3" method="POST">
                @csrf
                <div class="container-fluid mb-3 col-lg-8">
                    <label for="namesifat" class="mb-2 "><b> Nama Sifat Surat</b></label>
                    <input type="text" class="text-center form-control @error('namesifat') is-invalid @enderror" name="namesifat" required value="{{ old('namesifat') }}">
                    @error('namesifat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-2 mb-3">
                        <button type="submit" class="btn btn-primary me-2"><i class="bi bi-plus-square"></i> Buat Sifat</button>
                </div>
                </form>   
        </div>
                <table class="table table-bordered table-striped table-sm table-primary">
                    <thead>
                        <tr>
                        <th scope="col">Sifat</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach ($sifat as $s)
                    <tbody>
                        <tr>
                            <td>{{ $s->namesifat }}</td>
                            <td>
                            <form action="/sifatsurat/{{ $s->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin untuk hapus Data Sifat !!!')"><i class="bi bi-trash"></i></i></button>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
    </div>

    @endsection