<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DinasTerkait;
use Barryvdh\DomPDF\Facade\Pdf;


class DinasTerkaitController extends Controller
{
    public function DinasTerkait(){
        $data = DinasTerkait::all();
        return view('Admin/MainMenu/Pembangunan/DinasTerkait/index', compact('data')); 
    }

    public function inputDinasTerkait(){
        return view('Admin.CRUD.input.inputDinasTerkait');
    }

    public function postDinasTerkait(Request $request){
        //dd($request->all());
        DinasTerkait::create($request->all());
        return redirect()->route('DinasTerkait')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editDinasTerkait($id){
        $data = DinasTerkait::find($id);
        return view('Admin.CRUD.edit.editDinasTerkait', compact('data'));
    }

    public function updateDinasTerkait(Request $request, $id ){
        $data = DinasTerkait::find($id);
        $data->update($request->all());
        return redirect()->route('DinasTerkait')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusDinasTerkait($id){
        $data = DinasTerkait::find($id);
        $data->delete();
        return redirect()->route('DinasTerkait')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportDinasTerkait(){
        $data = DinasTerkait::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportDinasTerkait', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Kelurahan Tanjungrejo Dengan Dinas Terkait.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
