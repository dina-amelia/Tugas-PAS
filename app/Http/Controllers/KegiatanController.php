<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderbyDesc("created_at")->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'=>'required',
            'gambar'=>'required|image|max:3048',
            'isi'=>'required',
        ]);
        if($request->hasFile("gambar")){
            $file_name = Str::random(10);
            $extension = $request->gambar->extension();
            $file = Str::lower($file_name).'.'.$extension;
            $upload_path = public_path("storage/media/kegiatan/");
            $request->gambar->move($upload_path, $file);
        }
        $kegiatan = new Kegiatan();
        $kegiatan->judul = $request->judul;
        $kegiatan->gambar = $file;
        $kegiatan->isi = $request->isi;
        $kegiatan->save();
        if($kegiatan){
            return redirect()->route("kegiatan.index")->with("status", "Data berhasil ditambah!!");
        }else{
            return redirect()->route("kegiatan.index")->with("status", "OOPS ADA KESALAHAN!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'=>'required',
            'gambar'=>'image|max:3048',
            'isi'=>'required',
        ]);
        $kegiatan =  Kegiatan::findOrFail($id);

        // Kalau ada gambar hapus file gambarnya di folder public/storage
        if ($kegiatan->gambar) {
            File::delete(
                public_path("storage/media/kegiatan/{$kegiatan->gambar}")
            );
        }
        // End

        if($request->hasFile("gambar")){
            $file_name = Str::random(10);
            $extension = $request->gambar->extension();
            $file = Str::lower($file_name).'.'.$extension;
            $upload_path = public_path("storage/media/kegiatan/");
            $request->gambar->move($upload_path, $file);
        }
        $kegiatan->judul = $request->judul;
        $kegiatan->gambar = $file;
        $kegiatan->isi = $request->isi;
        $kegiatan->save();
        if($kegiatan){
            return redirect()->route("kegiatan.index")->with("status", "Data berhasil diupdate!!");
        }else{
            return redirect()->route("kegiatan.index")->with("status", "OOPS ADA KESALAHAN!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if($kegiatan){
            File::delete(
                public_path("storage/media/kegiatan/{$kegiatan->gambar}")
            );
            $kegiatan->delete();

        }
        return redirect()->route('kegiatan.index')->with('status', 'Data Berhasil dihapus!');
    }
}