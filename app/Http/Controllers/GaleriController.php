<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::orderbyDesc("created_at")->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
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
            'keterangan'=>'required',
        ]);
        if($request->hasFile("gambar")){
            $file_name = Str::random(10);
            $extension = $request->gambar->extension();
            $file = Str::lower($file_name).'.'.$extension;
            $upload_path = public_path("storage/media/galeri/");
            $request->gambar->move($upload_path, $file);
        }
        $galeri = new Galeri();
        $galeri->judul = $request->judul;
        $galeri->gambar = $file;
        $galeri->keterangan = $request->keterangan;
        $galeri->save();
        if($galeri){
            return redirect()->route("galeri.index")->with("status", "Data berhasil ditambah!!");
        }else{
            return redirect()->route("galeri.index")->with("status", "OOPS ADA KESALAHAN!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'judul'=>'required',
            'gambar'=>'image|max:3048',
            'keterangan'=>'required',
        ]);
        $galeri =  Galeri::findOrFail($id);

        // Kalau ada gambar hapus file gambarnya di folder public/storage
        if ($galeri->gambar) {
            File::delete(
                public_path("storage/media/galeri/{$galeri->gambar}")
            );
        }
        // End

        if($request->hasFile("gambar")){
            $file_name = Str::random(10);
            $extension = $request->gambar->extension();
            $file = Str::lower($file_name).'.'.$extension;
            $upload_path = public_path("storage/media/galeri/");
            $request->gambar->move($upload_path, $file);
        }
        $galeri->judul = $request->judul;
        $galeri->gambar = $file;
        $galeri->keterangan = $request->keterangan;
        $galeri->save();
        if($galeri){
            return redirect()->route("galeri.index")->with("status", "Data berhasil diupdate!!");
        }else{
            return redirect()->route("galeri.index")->with("status", "OOPS ADA KESALAHAN!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if($galeri){
            File::delete(
                public_path("storage/media/galeri/{$galeri->gambar}")
            );
            $galeri->delete();

        }
        return redirect()->route('galeri.index')->with('status', 'Data Berhasil dihapus!');
    }
}