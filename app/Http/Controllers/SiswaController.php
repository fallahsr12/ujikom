<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
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
    public function index(Request $request,Builder $htmlBuilder)
    {
        //
        if ($request->ajax()){
            $siswas = siswa::select(['id','nama','kelas']);
            return Datatables::of($siswas)
            ->addColumn('action', function($siswas){
                return view('datatable._action', [
                    'model' => $siswas,
                    'form_url' => route('siswa.destroy', $siswas->id),
                    'edit_url' => route('siswa.edit', $siswas->id),
                    'confirm_message' => 'Yakin Mau Menghapus ' . $siswas->nama.'?']);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
        ->addColumn(['data'=>'kelas','name'=>'kelas','title'=>'Kelas'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action','orderable'=>false, 'searchable'=>false]);
        return view('siswa.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa.create');
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
        $siswas = new siswa;
        $siswas->nama=$request->nama;
        $siswas->kelas =$request->kelas;
        
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
        return view('siswa.edit', compact('siswas'));
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
        $siswas->nama = $request->nama;
        $siswas->kelas = $request->kelas;
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
