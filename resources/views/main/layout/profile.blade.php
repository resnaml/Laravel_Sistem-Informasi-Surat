@extends('main.layout.index')

@section('container')
<div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
    
            <div class="card-body text-center">
                <h4>Username : <b>{{ $user['username'] }}</b></h4>
                <h4>Email : <b>{{ $user['email'] }}</b></h4>
                <h4>Nip : <b>{{ $user['nip'] }}</b></h4>
                <h4>
                    {!! $user->is_admin == true ? '<span class="btn btn-success">Admin</span>' :   '<span class="btn btn-warning">Not Admin</span>'!!}
                </h4>
                <h4>
                    {!! $user->is_Kepala == true ? '<span class="btn btn-success">Kepala</span>' :   '<span class="btn btn-warning">Not Kepala</span>'!!}
                </h4>
            </div>
        </div>


</div>
@endsection