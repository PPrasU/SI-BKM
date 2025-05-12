<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemkot;
use Barryvdh\DomPDF\Facade\Pdf;


class PemkotController extends Controller
{
    public function Pemkot(){
        $data = Pemkot::all();
        return view('Admin/MainMenu/Pembangunan/Pemkot/index', compact('data')); 
    }

    public function inputPemkot(){
        return view('Admin.CRUD.input.inputPemkot');
    }

    public function postPemkot(Request $request){
        //dd($request->all());
        Pemkot::create($request->all());
        return redirect()->route('Pemkot')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editPemkot($id){
        $data = Pemkot::find($id);
        return view('Admin.CRUD.edit.editPemkot', compact('data'));
    }

    public function updatePemkot(Request $request, $id ){
        $data = Pemkot::find($id);
        $data->update($request->all());
        return redirect()->route('Pemkot')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusPemkot($id){
        $data = Pemkot::find($id);
        $data->delete();
        return redirect()->route('Pemkot')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportPemkot(){
        $data = Pemkot::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportPemkot', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Kelurahan Tanjungrejo Dengan Pemkot.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
