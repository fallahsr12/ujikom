<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran_siswa;
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
    public function index(Request $request,Builder $htmlBuilder)
    {
        //
        if ($request->ajax()){
            $siswas = Kehadiran_siswa::select(['id','nama','kelas','keterangan']);
            return Datatables::of($siswas)
            ->addColumn('action', function($siswas){
                return view('datatable._action', [
                    'model' => $siswas,
                    'form_url' => route('ksiswa.destroy', $siswas->id),
                    'edit_url' => route('ksiswa.edit', $siswas->id),
                    'confirm_message' => 'Yakin Mau Menghapus ' . $siswas->nama.'?']);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
        ->addColumn(['data'=>'kelas','name'=>'kelas','title'=>'kelas'])
        ->addColumn(['data'=>'keterangan','name'=>'keterangan','title'=>'keterangan'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action','orderable'=>false, 'searchable'=>false]);
        return view('ksiswa.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ksiswa.create');
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
        $siswas->nama=$request->nama;
        $siswas->kelas=$request->kelas;
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
