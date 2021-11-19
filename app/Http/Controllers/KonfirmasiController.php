<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konfirmasi = Konfirmasi::orderbyDesc("created_at")->paginate(10);
        return view("admin.konfirmasi.index", compact("konfirmasi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.konfirmasi.create");
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
            'nama_donatur'=>'required',
            'tanggal'=>'required',
            'nominal'=>'required',
            'pemilik_rekening'=>'required',
            'telepon'=>'required',
            'keterangan'=>'required',
        ]);

        $konfirmasi = new Konfirmasi;
        $konfirmasi->nama_donatur = $request->nama_donatur;
        $konfirmasi->tanggal = $request->tanggal;
        $konfirmasi->nominal = $request->nominal;
        $konfirmasi->pemilik_rekening = $request->pemilik_rekening;
        $konfirmasi->telepon = $request->telepon;
        $konfirmasi->keterangan = $request->keterangan;
        $konfirmasi->save();
        return redirect()->route('konfirmasi.index')->with('status', 'Data Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfirmasi  $konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konfirmasi $konfirmasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfirmasi  $konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
        return view("admin.konfirmasi.edit", compact("konfirmasi"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konfirmasi  $konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_donatur'=>'required',
            'tanggal'=>'required',
            'nominal'=>'required',
            'pemilik_rekening'=>'required',
            'telepon'=>'required',
            'keterangan'=>'required',
        ]);

        $konfirmasi = Konfirmasi::findOrFail($id);
        $konfirmasi->nama_donatur = $request->nama_donatur;
        $konfirmasi->tanggal = $request->tanggal;
        $konfirmasi->nominal = $request->nominal;
        $konfirmasi->pemilik_rekening = $request->pemilik_rekening;
        $konfirmasi->telepon = $request->telepon;
        $konfirmasi->keterangan = $request->keterangan;
        $konfirmasi->save();
        return redirect()->route('konfirmasi.index')->with('status', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfirmasi  $konfirmasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
        if($konfirmasi){
            $konfirmasi->delete();
            return redirect()->route('konfirmasi.index')->with('status', 'Data Berhasil dihapus!');
        }
    }
}