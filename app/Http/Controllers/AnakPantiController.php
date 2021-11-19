<?php

namespace App\Http\Controllers;

use App\Models\AnakPanti;
use Illuminate\Http\Request;

class AnakPantiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anakpanti = AnakPanti::orderbyDesc("created_at")->paginate(10);
        return view('admin.anakpanti.index', compact('anakpanti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anakpanti.create');
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
            'nama_anak'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'pendidikan'=>'required',
            'status'=>'required',
            'nama_orangtua_wali'=>'required',
            'alamat_tinggal'=>'required',
        ]);

        $anakpanti = new AnakPanti;
        $anakpanti->nama_anak = $request->nama_anak;
        $anakpanti->tempat_lahir = $request->tempat_lahir;
        $anakpanti->tgl_lahir = $request->tgl_lahir;
        $anakpanti->jenis_kelamin = $request->jenis_kelamin;
        $anakpanti->pendidikan = $request->pendidikan;
        $anakpanti->status = $request->status;
        $anakpanti->nama_orangtua_wali = $request->nama_orangtua_wali;
        $anakpanti->alamat_tinggal = $request->alamat_tinggal;
        $anakpanti->save();
        return redirect()->route('anakpanti.index')->with('status', 'Data Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnakPanti  $anakPanti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anakpanti = AnakPanti::findOrFail($id);
        return view('admin.anakpanti.show', compact('anakpanti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnakPanti  $anakPanti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anakpanti = AnakPanti::findOrFail($id);
        return view('admin.anakpanti.edit', compact('anakpanti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnakPanti  $anakPanti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_anak'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'pendidikan'=>'required',
            'status'=>'required',
            'nama_orangtua_wali'=>'required',
            'alamat_tinggal'=>'required',
        ]);

        $anakpanti = AnakPanti::findOrFail($id);
        if($anakpanti){
            $anakpanti->nama_anak = $request->nama_anak;
            $anakpanti->tempat_lahir = $request->tempat_lahir;
            $anakpanti->tgl_lahir = $request->tgl_lahir;
            $anakpanti->jenis_kelamin = $request->jenis_kelamin;
            $anakpanti->pendidikan = $request->pendidikan;
            $anakpanti->status = $request->status;
            $anakpanti->nama_orangtua_wali = $request->nama_orangtua_wali;
            $anakpanti->alamat_tinggal = $request->alamat_tinggal;
            $anakpanti->save();
        }
        return redirect()->route('anakpanti.index')->with('status', 'Data Berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnakPanti  $anakPanti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anakpanti = AnakPanti::findOrFail($id);
        if($anakpanti){
            $anakpanti->delete();

        }
        return redirect()->route('anakpanti.index')->with('status', 'Data Berhasil dihapus!');
    }
}