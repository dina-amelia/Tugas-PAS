@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Anak Asuh</h1>
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
                <div class="card-header">Data Anak Asuh</div>
                <div class="card-body">
                    <form action="{{route('anakpanti.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Anak :</label>
                        <input type="text" name="nama_anak" class="form-control @error('nama_anak') is-invalid @enderror" value="{{ old("nama_anak") }}">
                        @error('nama_anak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir :</label>
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old("tempat_lahir") }}">
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir :</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old("tgl_lahir") }}">
                        @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenjang Pendidikan :</label>
                        <input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" value="{{ old("pendidikan") }}">
                        @error('pendidikan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Status Anak :</label>
                        <select name="status"  class="form-control @error('status') is-invalid @enderror">
                            <option value="">Pilih Status</option>
                            <option value="Yatim">Yatim</option>
                            <option value="Piatu">Piatu</option>
                            <option value="Yatim Piatu">Yatim Piatu</option>
                            <option value="Dhuafa">Dhuafa</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama Orangtua Wali :</label>
                        <input type="text" name="nama_orangtua_wali" class="form-control @error('nama_orangtua_wali') is-invalid @enderror" value="{{ old("nama_orangtua_wali") }}">
                        @error('nama_orangtua_wali')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Tinggal :</label>
                        <input type="text" name="alamat_tinggal" class="form-control @error('alamat_tinggal') is-invalid @enderror" value="{{ old("alamat_tinggal") }}">

                        @error('alamat_tinggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        <a href="{{ route("anakpanti.index") }}" class="btn btn-outline-info">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
