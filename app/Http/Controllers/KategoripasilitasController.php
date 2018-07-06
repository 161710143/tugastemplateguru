<?php

namespace App\Http\Controllers;

use App\kategori_pasilitas;
use Illuminate\Http\Request;

class KategoripasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoripasilitas = kategori_pasilitas::all();
        return view('kategori_pasilitas.index',compact('kategoripasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori_pasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pasilitas' => 'required|'
        ]);
        $kategoripasilitas = new kategori_pasilitas;
        $kategoripasilitas->nama_pasilitas = $request->nama_pasilitas;
        $kategoripasilitas->save();
        return redirect()->route('kategoripasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategoripasilitas  $kategoripasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(kategoripasilitas $kategoripasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategoripasilitas  $kategoripasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(kategoripasilitas $kategoripasilitas)
    {
        $kategoripasilitas = kategori_pasilitas::findOrFail($id);
        return view('kategori_pasilitas.edit',compact('kategoripasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategoripasilitas  $kategoripasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategoripasilitas $kategoripasilitas)
    {
         $this->validate($request,[
            'nama_pasilitas' => 'required|'
        ]);
        $kategoripasilitas = kategori_pasilitas::findOrFail($id);
        $kategoripasilitas->nama_pasilitas = $request->nama_pasilitas;
        $kategoripasilitas->save();
        return redirect()->route('kategoripasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategoripasilitas  $kategoripasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategoripasilitas $kategoripasilitas)
    {
        $kategoripasilitas = kategori_pasilitas::findOrFail($id);
        $kategoripasilitas->delete();
        return redirect()->route('kategoripasilitas.index');
    }
}
