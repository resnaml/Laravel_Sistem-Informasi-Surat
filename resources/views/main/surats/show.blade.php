@extends('main.layout.index')

@section('container')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Surat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($surat as $item)
                    {{ $item }}
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection