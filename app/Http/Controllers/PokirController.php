<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pokir;
use Barryvdh\DomPDF\Facade\Pdf;


class PokirController extends Controller
{
    public function Pokir(){
        $data = Pokir::all();
        return view('Admin/MainMenu/Pembangunan/Pokir/index', compact('data')); 
    }

    public function inputPokir(){
        return view('Admin.CRUD.input.inputPokir');
    }

    public function postPokir(Request $request){
        //dd($request->all());
        Pokir::create($request->all());
        return redirect()->route('Pokir')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editPokir($id){
        $data = Pokir::find($id);
        return view('Admin.CRUD.edit.editPokir', compact('data'));
    }

    public function updatePokir(Request $request, $id ){
        $data = Pokir::find($id);
        $data->update($request->all());
        return redirect()->route('Pokir')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusPokir($id){
        $data = Pokir::find($id);
        $data->delete();
        return redirect()->route('Pokir')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportPokir(){
        $data = Pokir::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportPokir', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Dengan Pokir.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
