<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\Kelas;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswas=siswa::all();
        return view('siswa.index', compact('siswas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $siswas = new siswa;
        $siswas->nama_siswa=$request->nama_siswa;
        $siswas->id_kelas=$request->id_kelas;
        $siswas->save();
        return redirect('/admin/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
        $siswas = siswa::all();
        return view('siswa.detail', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswas = siswa::findOrfail($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswas','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $siswas = siswa::findOrfail($id);
        $siswas->nama_siswa = $request->nama_siswa;
        $siswas->id_kelas = $request->id_kelas;
        $siswas->save();
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        {
        //
         $siswas = siswa::findOrFail($id);
         $siswas->delete();
         return redirect()->route('siswa.index');
    }
}
    }
