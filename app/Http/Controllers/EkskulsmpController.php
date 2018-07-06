<?php

namespace App\Http\Controllers;

use App\ekskulsmp;
use Illuminate\Http\Request;

class EkskulsmpController extends Controller
 {
    public function index()
    {
         $eskuls =ekskulsmp::all();
        return view('eskull.index',compact('eskuls')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eskull.create');     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nama' => 'required|max:255',
             'poto' => 'required|min:2',
             'content' => 'required|min:2',
           
        ]);

        $eskuls = new ekskulsmp;
        $eskuls->nama = $request->nama;
        $eskuls->poto = $request->poto;
        $eskuls->content = $request->content;
        $eskuls->save();
        return redirect()->route('eskuls.index');     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eskuls = ekskulsmp::findOrFail($id);
        return view('eskull.show',compact('eskuls'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eskuls = ekskulsmp::findOrFail($id);
        return view('eskull.edit',compact('eskuls'));     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
             'nama' => 'required|max:255',
            'poto' => 'required|min:2',
             'content' => 'required|min:2',
            
        ]);

        $eskuls = ekskulsmp::findOrFail($id);
        $eskuls->nama = $request->nama;
        $eskuls->poto = $request->poto;
        $eskuls->content= $request->content;
        $eskuls->save();
        return redirect()->route('eskuls.index');       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $eskuls = ekskulsmp::findOrFail($id);
        $eskuls->delete();
        return redirect()->route('eskuls.index');    }
}