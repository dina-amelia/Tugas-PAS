@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Donasi</h1>
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
                <div class="card-header">Data Donasi</div>
                <div class="card-body">
                    <form action="{{route('donasi.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Donatur :</label>
                        <input type="text" name="nama_donatur" class="form-control @error('nama_donatur') is-invalid @enderror" value="{{ old("nama_donatur") }}">
                        @error('nama_donatur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal :</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old("tanggal") }}">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi :</label>
                        <select name="konfirmasi_id" class="form-control @error('konfirmasi_id') is-invalid @enderror">
                            <option value="">Pilih konfirmasi</option>
                            @foreach ($konfirmasi as $value )
                                <option value="{{ $value->id }}">{{ $value->nama_donatur }}</option>
                            @endforeach
                        </select>
                        @error('konfirmasi_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah :</label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old("jumlah") }}">
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan :</label>
                        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old("keterangan") }}">

                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <a href="{{ route("donasi.index") }}" class="btn btn-outline-info">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
