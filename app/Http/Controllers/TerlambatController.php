<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa_terlambat;
use App\siswa;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use File;

class TerlambatController extends Controller
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
            $terlambat = Siswa_terlambat::select(['id','nama','kelas','jumlah_terlambat']);
            return Datatables::of($terlambat)
            ->addColumn('action', function($terlambat){
                return view('datatable._action', [
                    'model' => $terlambat,
                    'form_url' => route('siswa_terlambat.destroy', $terlambat->id),
                    'edit_url' => route('siswa_terlambat.edit', $terlambat->id),
                    'confirm_message' => 'Yakin Mau Menghapus ' . $terlambat->nama.'?']);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
        ->addColumn(['data'=>'kelas','name'=>'kelas','title'=>'Kelas'])
        ->addColumn(['data'=>'jumlah_terlambat','name'=>'jumlah_terlambat','title'=>'jumlah_terlambat'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action','orderable'=>false, 'searchable'=>false]);
        return view('siswa_terlambat.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa_terlambat.create');
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
        $siswas = new Siswa_terlambat;
        $siswas->nama=$request->nama;
        $siswas->kelas =$request->kelas;
        $siswas->jumlah_terlambat =$request->jumlah_terlambat;
        
        $siswas->save();
        return redirect('/admin/siswa_terlambat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa_terlambat $Siswa_terlambat)
    {
        //
        $siswas = Siswa_terlambat::all();
        return view('siswa_terlambat.detail', compact('siswas'));
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
        $siswas = Siswa_terlambat::findOrfail($id);
        return view('siswa_terlambat.edit', compact('siswas'));
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
        $siswas = Siswa_terlambat::findOrfail($id);
        $siswas->nama = $request->nama;
        $siswas->kelas = $request->kelas;
        $siswas->jumlah_terlambat = $request->jumlah_terlambat;
        $siswas->save();
        return redirect()->route('siswa_terlambat.index');
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
        $siswas = Siswa_terlambat::findOrFail($id);
         $siswas->delete();
         return redirect()->route('ksiswa.index');
    }
}
