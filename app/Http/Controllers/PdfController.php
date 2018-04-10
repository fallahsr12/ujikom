<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran_guru;
use PDF;

class PdfController extends Controller
{
    //
    public function pdf()
    {
    	$kguru = Kehadiran_guru::all();
    	$pdf = PDF::loadview('pdf', ['kguru'=> $kguru]);
    	// dd($pdf);
    	return $pdf->download('kguru.pdf')->with(compact('kguru'));
    }

    public function pdfview(Request $request)
    {
    	$items = Kehadiran_guru::all();
        view()->share('items',$items);
         
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
    public function downloadPDF($id)
    {
    	$kguru = Kehadiran_guru::find($id);
    	$pdf = PDF::loadView('pdf', compact('kguru'));
    	return $pdf->download('kehadiran guru.pdf');
    }
}
