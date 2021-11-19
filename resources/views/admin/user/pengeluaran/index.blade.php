@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Pengeluaran</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-25">
            <div class="card">
                <div class="card-header">
                    Laporan Keuangan
                    <a href="{{route('pengeluaran.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Id Pengeluaran</th>
                                <th>Keperluan</th>
                                <th>Jumlah</th>
                                <th>Gambar</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                            @foreach($pengeluaran as $data)
                                <tr>
                                    <td>{{$data->idPengeluaran}}</td>
                                    <td>{{$data->keperluan}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td>{{$data->gambar}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->Keterangan}}</td>
                                    <td>
                                        <form action="{{route('pengeluaran.destroy', $data->idPengeluaran)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('pengeluaran.edit', $data->idPengeluaran)}}" class="btn btn-outline-info">Edit</a>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
