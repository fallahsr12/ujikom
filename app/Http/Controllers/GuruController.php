<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
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
        $siswas=Guru::all();
        return view('guru.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('guru.create');
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
        $siswas->nama_guru=$request->nama_guru;
        $siswas->mapel =$request->mapel;
        
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
        return view('guru.edit', compact('siswas'));
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
        $siswas->mapel = $request->mapel;
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
