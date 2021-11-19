<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Konfirmasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasi = Donasi::with("konfirmasi")
        ->orderbyDesc("created_at")
        ->paginate(10);

        return view("admin.donasi.index", compact("donasi"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konfirmasi = Konfirmasi::select("id", "nama_donatur")->get();
        return view("admin.donasi.create", compact("konfirmasi"));
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
            'jumlah'=>'required',
            'konfirmasi_id'=>'required',
            'keterangan'=>'required',
        ]);

        $donasi = new Donasi;
        $donasi->nama_donatur = $request->nama_donatur;
        $donasi->tanggal = $request->tanggal;
        $donasi->jumlah = $request->jumlah;
        $donasi->konfirmasi_id = $request->konfirmasi_id;
        $donasi->keterangan = $request->keterangan;
        $donasi->save();
        return redirect()->route('donasi.index')->with('status', 'Data Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donasi = Donasi::findOrFail($id);
        $konfirmasi = Konfirmasi::select("id", "nama_donatur")->get();

        return view("admin.donasi.edit",compact("donasi","konfirmasi"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_donatur'=>'required',
            'tanggal'=>'required',
            'jumlah'=>'required',
            'konfirmasi_id'=>'required',
            'keterangan'=>'required',
        ]);

        $donasi = Donasi::findOrFail($id);
        $donasi->nama_donatur = $request->nama_donatur;
        $donasi->tanggal = $request->tanggal;
        $donasi->jumlah = $request->jumlah;
        $donasi->konfirmasi_id = $request->konfirmasi_id;
        $donasi->keterangan = $request->keterangan;
        $donasi->save();
        return redirect()->route('donasi.index')->with('status', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        if($donasi){
            $donasi->delete();
            return redirect()->route('donasi.index')->with('status', 'Data Berhasil dihapus!');
        }
    }
}