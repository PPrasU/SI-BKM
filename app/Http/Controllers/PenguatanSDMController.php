<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PenguatanSDM;
use Barryvdh\DomPDF\Facade\Pdf;


class PenguatanSDMController extends Controller
{
    public function PenguatanSDM(){
        $data = PenguatanSDM::all();
        return view('Admin/MainMenu/PenguatanSDM/index', compact('data')); 
    }

    public function inputPenguatanSDM(){
        return view('Admin.CRUD.input.inputPenguatanSDM');
    }

    public function postPenguatanSDM(Request $request){
        //dd($request->all());
        PenguatanSDM::create($request->all());
        return redirect()->route('PenguatanSDM')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editPenguatanSDM($id){
        $data = PenguatanSDM::find($id);
        return view('Admin.CRUD.edit.editPenguatanSDM', compact('data'));
    }

    public function updatePenguatanSDM(Request $request, $id ){
        $data = PenguatanSDM::find($id);
        $data->update($request->all());
        return redirect()->route('PenguatanSDM')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusPenguatanSDM($id){
        $data = PenguatanSDM::find($id);
        $data->delete();
        return redirect()->route('PenguatanSDM')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportPenguatanSDM(){
        $data = PenguatanSDM::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportPenguatanSDM', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Penguatan SDM Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
