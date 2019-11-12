@extends('layouts.admin.mainAdmin')

@section('tableA')
{{-- <div class="container"> --}}

    <div class="row">
        {{-- <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('data-pelanggan') }}" class="list-group-item list-group-item-action active">
                    Data User
                </a>
                <a href="{{ route('data-stok') }}" class="list-group-item list-group-item-action">Stok</a>
                <a href="{{ route('data-pesanan') }}" class="list-group-item list-group-item-action">Pesanan</a>

            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">Data User</div> --}}

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$u->nama}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->jenisKelamin}}</td>
                                <td>{{$u->alamat}}</td>
                                <td>{{$u->noHp}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('detail-data', $u->id) }}" style=" color: white;">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="float: right;">
                        {{$user->links()}}
                    </div>

                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
