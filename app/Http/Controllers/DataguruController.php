<?php

namespace App\Http\Controllers;

use App\dataguru;
use Illuminate\Http\Request;

class DataguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datagurus = dataguru::all();
        return view('dataguru.index',compact('datagurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dataguru.create');
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
             'jabatan' => 'required|',
             'poto' => 'required|'
        ]);
        $datagurus = new dataguru;
        $datagurus->nama = $request->nama;
        $datagurus->jabatan = $request->jabatan;
        $datagurus->poto = $request->poto;
        
        if ($request->hasFile('poto')){
            $file=$request->file('poto');
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces= $file->move($destinationPath,$filename);
            $datagurus->poto= $filename;
        }
        $datagurus->save();
        return redirect()->route('dataguru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dataguru  $dataguru
     * @return \Illuminate\Http\Response
     */
    public function show(dataguru $dataguru)
    {
         $datagurus = dataguru::findOrFail($id);
        return view('dataguru.show',compact('datagurus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dataguru  $dataguru
     * @return \Illuminate\Http\Response
     */
    public function edit(dataguru $dataguru)
    {
         $datagurus = dataguru::findOrFail($id);
        return view('dataguru.edit',compact('datagurus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dataguru  $dataguru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dataguru $dataguru)
    {
         $this->validate($request,[
            'nama' => 'required|'
        ]);
        $datagurus = dataguru::findOrFail($id);
        $datagurus->nama = $request->nama;
        $datagurus->save();
        return redirect()->route('dataguru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dataguru  $dataguru
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataguru $dataguru)
    {
        //
    }
}
