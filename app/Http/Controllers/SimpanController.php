<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Simpan;
use Barryvdh\DomPDF\Facade\Pdf;


class SimpanController extends Controller
{
    public function Simpan(){
        $data = Simpan::all();
        return view('Admin/MainMenu/Simpan/index', compact('data')); 
    }

    public function inputSimpan(){
        return view('Admin.CRUD.input.inputSimpan');
    }

    public function postSimpan(Request $request){
        //dd($request->all());
        Simpan::create($request->all());
        return redirect()->route('Simpan')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editSimpan($id){
        $data = Simpan::find($id);
        return view('Admin.CRUD.edit.editSimpan', compact('data'));
    }

    public function updateSimpan(Request $request, $id ){
        $data = Simpan::find($id);
        $data->update($request->all());
        return redirect()->route('Simpan')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusSimpan($id){
        $data = Simpan::find($id);
        $data->delete();
        return redirect()->route('Simpan')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportSimpan() {
        $data = Simpan::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportSimpan', compact('data'));
    
        // Mendapatkan tanggal dan waktu saat ini dalam format yang diinginkan
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Simpan Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
    
}
