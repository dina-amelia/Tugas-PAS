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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan Pengeluaran</div>
                <div class="card-body">
                    <form action="{{route('pengeluaran.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Id Pengeluaran:</label>
                        <input type="text" name="idPengeluaran" class="form-control @error('idPengeluaran') is-invalid @enderror">
                        @error('idPengeluaran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Keperluan :</label>
                        <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror">
                        @error('keperluan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah :</label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar :</label>
                        <input type="text" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal:</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan :</label>
                        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
