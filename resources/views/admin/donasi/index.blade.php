@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Data Donasi</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Donasi
                    <a href="{{route('donasi.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Donasi</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Konfirmasi</th>
                                <th>Nama Donatur</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($donasi as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->konfirmasi ? $data->konfirmasi->nama_donatur : "" }}</td>
                                    <td>{{$data->nama_donatur}}</td>
                                    <td>@currency($data->jumlah)</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->keterangan}}</td>
                                    <td>
                                        <a href="{{route('donasi.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('donasi.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $donasi->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
