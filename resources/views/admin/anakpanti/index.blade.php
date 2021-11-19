@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Data Anak Asuh</h1>
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
                    Data Anak Asuh
                    <a href="{{route('anakpanti.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Anak Asuh</a>
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
                                <th>Nama Anak</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan</th>
                                <th>Status</th>
                                <th>Nama Orangtua Wali</th>
                                <th>Alamat Tinggal</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($anakpanti as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_anak}}</td>
                                    <td>{{$data->tempat_lahir}}</td>
                                    <td>{{$data->tgl_lahir}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>{{$data->pendidikan}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>{{$data->nama_orangtua_wali}}</td>
                                    <td>{{$data->alamat_tinggal}}</td>

                                    <td>
                                        <a href="{{route('anakpanti.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('anakpanti.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $anakpanti->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
