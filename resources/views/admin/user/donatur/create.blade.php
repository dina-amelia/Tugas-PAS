@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Donatur</h1>
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
                <div class="card-header">Donatur</div>
                <div class="card-body">
                    <form action="{{route('donatur.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">ID :</label>
                        <input type="text" name="id" class="form-control @error('id') is-invalid @enderror">
                        @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    <div class="form-group">
                        <label for="">Id Konfirmasi:</label>
                        <input type="text" name="konfirmasi_id" class="form-control @error('konfirmasi_id') is-invalid @enderror">
                        @error('konfirmasi_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Username :</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Telepon:</label>
                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror">
                        @error('telepon')
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
