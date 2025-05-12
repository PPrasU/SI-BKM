<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Barryvdh\DomPDF\Facade\Pdf;


class AspirasiController extends Controller
{
    public function Aspirasi(){
        $data = Aspirasi::all();
        return view('Admin/MainMenu/Aspirasi/index', compact('data')); 
    }

    public function inputAspirasi(){
        return view('Admin.CRUD.input.inputAspirasi');
    }

    public function postAspirasi(Request $request){
        //dd($request->all());
        Aspirasi::create($request->all());
        return redirect()->route('Aspirasi')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editAspirasi($id){
        $data = Aspirasi::find($id);
        return view('Admin.CRUD.edit.editAspirasi', compact('data'));
    }

    public function updateAspirasi(Request $request, $id ){
        $data = Aspirasi::find($id);
        $data->update($request->all());
        return redirect()->route('Aspirasi')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusAspirasi($id){
        $data = Aspirasi::find($id);
        $data->delete();
        return redirect()->route('Aspirasi')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportAspirasi(){
        $data = Aspirasi::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportAspirasi', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Aspirasi Masyarakat Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
