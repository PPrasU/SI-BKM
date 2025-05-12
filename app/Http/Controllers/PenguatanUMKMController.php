<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PenguatanUMKM;
use Barryvdh\DomPDF\Facade\Pdf;


class PenguatanUMKMController extends Controller
{
    public function PenguatanUMKM(){
        $data = PenguatanUMKM::all();
        return view('Admin/MainMenu/PenguatanUMKM/index', compact('data')); 
    }

    public function inputPenguatanUMKM(){
        return view('Admin.CRUD.input.inputPenguatanUMKM');
    }

    public function postPenguatanUMKM(Request $request){
        //dd($request->all());
        PenguatanUMKM::create($request->all());
        return redirect()->route('PenguatanUMKM')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editPenguatanUMKM($id){
        $data = PenguatanUMKM::find($id);
        return view('Admin.CRUD.edit.editPenguatanUMKM', compact('data'));
    }

    public function updatePenguatanUMKM(Request $request, $id ){
        $data = PenguatanUMKM::find($id);
        $data->update($request->all());
        return redirect()->route('PenguatanUMKM')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusPenguatanUMKM($id){
        $data = PenguatanUMKM::find($id);
        $data->delete();
        return redirect()->route('PenguatanUMKM')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportPenguatanUMKM(){
        $data = PenguatanUMKM::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportPenguatanUMKM', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Penguatan UMKM Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
