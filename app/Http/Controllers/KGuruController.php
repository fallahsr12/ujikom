<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran_guru;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class KGuruController extends Controller
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
            $siswas = Kehadiran_guru::select(['id','nama','keterangan']);
            return Datatables::of($siswas)
            ->addColumn('action', function($siswas){
                return view('datatable._action', [
                    'model' => $siswas,
                    'form_url' => route('kguru.destroy', $siswas->id),
                    'edit_url' => route('kguru.edit', $siswas->id),
                    'confirm_message' => 'Yakin Mau Menghapus ' . $siswas->nama.'?']);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
        ->addColumn(['data'=>'keterangan','name'=>'keterangan','title'=>'keterangan'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action','orderable'=>false, 'searchable'=>false]);
        return view('kguru.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kguru.create');
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
        $siswas->nama=$request->nama;
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
        $siswas = Kehadiran_guru::findOrfail($id);
        return view('kguru.edit', compact('siswas'));
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
        $siswas->nama = $request->nama;
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
