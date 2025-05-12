<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SimpanPinjam;
use Barryvdh\DomPDF\Facade\Pdf;


class SimpanPinjamController extends Controller
{
    public function SimpanPinjam(){
        $data = SimpanPinjam::all();
        return view('Admin/MainMenu/SimpanPinjam/index', compact('data')); 
    }

    public function inputSimpanPinjam(){
        return view('Admin.CRUD.input.inputSimpanPinjam');
    }

    public function postSimpanPinjam(Request $request){
        //dd($request->all());
        SimpanPinjam::create($request->all());
        return redirect()->route('SimpanPinjam')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editSimpanPinjam($id){
        $data = SimpanPinjam::find($id);
        return view('Admin.CRUD.edit.editSimpanPinjam', compact('data'));
    }

    public function updateSimpanPinjam(Request $request, $id ){
        $data = SimpanPinjam::find($id);
        $data->update($request->all());
        return redirect()->route('SimpanPinjam')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusSimpanPinjam($id){
        $data = SimpanPinjam::find($id);
        $data->delete();
        return redirect()->route('SimpanPinjam')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportSimpanPinjam() {
        $data = SimpanPinjam::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportSimpanPinjam', compact('data'));
    
        // Mendapatkan tanggal dan waktu saat ini dalam format yang diinginkan
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Simpan Pinjam Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
    
}
