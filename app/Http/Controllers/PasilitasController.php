<?php

namespace App\Http\Controllers;

use App\pasilitas;
use App\kategoripasilitas;
use Illuminate\Http\Request;

class PasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasilitas = pasilitas::with('kategoripasilitas')->get();
        return view('pasilitas.index',compact('pasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoripasilitas = pasilitas::all();
       return view('pasilitas.create',compact('kategoripasilitas','a'));
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
            'nama' => 'required|',
            'poto' => 'required|',
            'kategoripasilitas_id' => 'required|'
        ]);
        $pasilitas = new pasilitas;
        $pasilitas->nama = $request->nama;
        $pasilitas->poto = $request->poto;
        $pasilitas->kategoripasilitas_id = $request->kategoripasilitas_id;

       if ($request->hasFile('poto')){
            $file=$request->file('poto');
            $destinationPath=public_path().'assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $pasilitas->poto= $filename;
        }
        $pasilitas->save();
        return redirect()->route('pasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pasilitas  $pasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(pasilitas $pasilitas)
    {
        $pasilitas = pasilitas::findOrFail($id);
        return view('pasilitas.show',compact('pasilitas'));
    }

    /**
     *  
     *
     * Show the form for editing the specified resource.
     *
     * @param  \App\pasilitas  $pasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(pasilitas $pasilitas)
    {
         $pasilitas = pasilitas::findOrFail($id);
        $pasilitas = pasilitas::all();
        $selectedKategoripasilitas = Fasilitas::findOrFail($id)->kategorif_id;
        return view('pasilitas.edit',compact('pasilitas','kategori_pasilitas','selectedKategoripasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pasilitas  $pasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pasilitas $pasilitas)
    {
         $this->validate($request,[
            'nama' => 'required|',
            'poto' => 'required|',
            'kategoripasilitas_id' => 'required|'
        ]);
        $pasilitas = pasilitas::findOrFail($id);
        $pasilitas->nama = $request->nama;
        $pasilitas->poto = $request->poto;
        $pasilitas->kategoripasilitas_id = $request->kategoripasilitas_id;
        
        if ($request->hasFile('poto')) {
            $uploaded_foto = $request->file('poto');
            $extension = $uploaded_poto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_poto->move($destinationPath, $filename);
            $pasilitas->poto=$filename; 
        }
        $pasilitas->save();
        return redirect()->route('pasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pasilitas  $pasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(pasilitas $pasilitas)
    {
         $pasilitas = pasilitas::findOrFail($id);
       $pasilitas->delete();
        return redirect()->route('pasilitas.index');
    }
    
}
