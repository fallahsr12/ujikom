<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran_guru;
use App\Mapel;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;
use App\Guru;

class KGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswas=Kehadiran_guru::with('guru')->get();
        return view('kguru.index', compact('siswas','guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $guru = Guru::all();
        return view('kguru.create', compact('guru')); 
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
        $siswas = new Kehadiran_guru;
        $siswas->id_guru=$request->id_guru;
        $siswas->keterangan =$request->keterangan;
        
        $siswas->save();
        return redirect('/admin/kguru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran_guru $Kehadiran_guru)
    {
        //
        $siswas = Kehadiran_guru::all();
        return view('kguru.detail', compact('siswas'));
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
        $guru=guru::all();
        $siswas = Kehadiran_guru::findOrfail($id);
        return view('kguru.edit', compact('siswas','guru'));
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
        $siswas = Kehadiran_guru::findOrfail($id);
        $siswas->id_guru = $request->id_guru;
        $siswas->keterangan = $request->keterangan;
        $siswas->save();
        return redirect()->route('kguru.index');
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
         $siswas = Kehadiran_guru::findOrFail($id);
         $siswas->delete();
         return redirect()->route('kguru.index');
    }
}
