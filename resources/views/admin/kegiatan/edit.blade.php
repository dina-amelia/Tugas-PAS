@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Kegiatan</h1>
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
                <div class="card-header">Data Kegiatan</div>
                <div class="card-body">
                    <form action="{{route('kegiatan.update', $kegiatan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="form-group">
                        <label for="">Judul :</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $kegiatan->judul}}">
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar :</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror mb-3 " accept="image/*">
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <img src="{{ asset("storage/media/kegiatan/". $kegiatan->gambar) }}" width="100px" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">Isi :</label>
                        <input type="text" name="isi" class="form-control @error('isi') is-invalid @enderror" value="{{ $kegiatan->isi }}">

                        @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <a href="{{ route("kegiatan.index") }}" class="btn btn-outline-info">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
