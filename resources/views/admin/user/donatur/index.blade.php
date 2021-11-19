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
        <div class="col-md-25">
            <div class="card">
                <div class="card-header">
                    Donatur
                    <a href="{{route('donatur.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Id Konfirmasi</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                            </tr>
                            @foreach($donatur as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->konfirmasi_id}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->username}}</td>
                                    <td>{{$data->password}}</td>
                                    <td>{{$data->telepon}}</td>
                                    <td>
                                        <form action="{{route('donatur.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('donatur.edit', $data->id)}}" class="btn btn-outline-info">Edit</a>
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
