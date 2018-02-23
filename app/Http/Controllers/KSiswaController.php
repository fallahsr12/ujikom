<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran_siswa;
use App\siswa;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class KSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswas=Kehadiran_siswa::all();
        return view('ksiswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa=siswa::all();
        $kehadiran=Kehadiran_siswa::all();
        return view('ksiswa.create',compact('siswa','keadiran'));
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
        $siswas = new Kehadiran_siswa;
        $siswas->id_siswa= $request->id_siswa;
        $siswas->keterangan =$request->keterangan;
        
        $siswas->save();
        return redirect('/admin/ksiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran_siswa $Kehadiran_siswa)
    {
        //
        $siswas = Kehadiran_siswa::all();
        return view('ksiswa.detail', compact('siswas'));
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
        $siswas = Kehadiran_siswa::findOrfail($id);
        return view('ksiswa.edit', compact('siswas'));
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
        $siswas = Kehadiran_siswa::findOrfail($id);
        $siswas->nama = $request->nama;
        $siswas->kelas = $request->kelas;
        $siswas->keterangan = $request->keterangan;
        $siswas->save();
        return redirect()->route('ksiswa.index');
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
         $siswas = Kehadiran_siswa::findOrFail($id);
         $siswas->delete();
         return redirect()->route('ksiswa.index');
    }
}
