@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Data Konfirmasi</h1>
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
                    Data Konfirmasi
                    <a href="{{route('konfirmasi.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Konfirmasi</a>
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
                                <th>Nama Donatur</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Pemilik Rekening</th>
                                <th>Telepon</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($konfirmasi as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_donatur}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>@currency($data->nominal)</td>
                                    <td>{{$data->pemilik_rekening}}</td>
                                    <td>{{$data->telepon}}</td>
                                    <td>{{$data->keterangan}}</td>

                                    <td>
                                        <a href="{{route('konfirmasi.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('konfirmasi.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $konfirmasi->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
