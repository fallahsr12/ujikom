<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mapel=Mapel::all();
        $siswas=Guru::all();
        return view('guru.index', compact('siswas','mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mapel=Mapel::all();
        return view('guru.create',compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $siswas = new Guru;
        $siswas->nik=$request->nik;
        $siswas->nama_guru=$request->nama_guru;
        $siswas->id_mapel =$request->id_mapel;
        
        $siswas->save();
        return redirect('/admin/guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $siswas = Guru::all();
        return view('guru.detail', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswas = Guru::findOrfail($id);
        $mapel = Mapel::all();
        return view('guru.edit', compact('siswas','mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $siswas = Guru::findOrfail($id);
        $siswas->nama_guru = $request->nama_guru;
        $siswas->id_mapel = $request->id_mapel;
        $siswas->save();
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $siswas = Guru::findOrFail($id);
         $siswas->delete();
         return redirect()->route('siswa.index');
    }
}
