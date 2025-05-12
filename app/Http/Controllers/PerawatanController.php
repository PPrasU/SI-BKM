<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perawatan;
use Barryvdh\DomPDF\Facade\Pdf;


class PerawatanController extends Controller
{
    public function Perawatan(){
        $data = Perawatan::all();
        return view('Admin/MainMenu/Perawatan/index', compact('data')); 
    }

    public function inputPerawatan(){
        return view('Admin.CRUD.input.inputPerawatan');
    }

    public function postPerawatan(Request $request){
        //dd($request->all());
        Perawatan::create($request->all());
        return redirect()->route('Perawatan')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editPerawatan($id){
        $data = Perawatan::find($id);
        return view('Admin.CRUD.edit.editPerawatan', compact('data'));
    }

    public function updatePerawatan(Request $request, $id ){
        $data = Perawatan::find($id);
        $data->update($request->all());
        return redirect()->route('Perawatan')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusPerawatan($id){
        $data = Perawatan::find($id);
        $data->delete();
        return redirect()->route('Perawatan')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportPerawatan(){
        $data = Perawatan::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportPerawatan', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Perawatan Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
