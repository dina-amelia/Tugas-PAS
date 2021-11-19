@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Konfirmasi</h1>
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
                <div class="card-header"> Data Konfirmasi</div>
                <div class="card-body">
                    <form action="{{route('konfirmasi.update', $konfirmasi->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Donatur :</label>
                            <input type="text" name="nama_donatur" class="form-control @error('nama_donatur') is-invalid @enderror" value="{{ $konfirmasi->nama_donatur }}">
                            @error('nama_donatur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal :</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ $konfirmasi->tanggal }}">
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nominal :</label>
                            <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror" value="{{ $konfirmasi->nominal }}">
                            @error('nominal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Pemilik Rekening :</label>
                            <input type="text" name="pemilik_rekening" class="form-control @error('pemilik_rekening') is-invalid @enderror" value="{{ $konfirmasi->pemilik_rekening }}">
                            @error('pemilik_rekening')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon :</label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"value="{{ $konfirmasi->telepon }}">
                            @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan :</label>
                            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ $konfirmasi->keterangan }}">

                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <a href="{{ route("konfirmasi.index") }}" class="btn btn-outline-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


