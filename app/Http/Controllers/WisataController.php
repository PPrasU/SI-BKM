<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Barryvdh\DomPDF\Facade\Pdf;


class WisataController extends Controller
{
    public function Wisata(){
        $data = Wisata::all();
        return view('Admin/MainMenu/WisataStudiBanding/index', compact('data')); 
    }

    public function inputWisata(){
        return view('Admin.CRUD.input.inputWisata');
    }

    public function postWisata(Request $request){
        //dd($request->all());
        Wisata::create($request->all());
        return redirect()->route('Wisata')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editWisata($id){
        $data = Wisata::find($id);
        return view('Admin.CRUD.edit.editWisata', compact('data'));
    }

    public function updateWisata(Request $request, $id ){
        $data = Wisata::find($id);
        $data->update($request->all());
        return redirect()->route('Wisata')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusWisata($id){
        $data = Wisata::find($id);
        $data->delete();
        return redirect()->route('Wisata')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportWisata(){
        $data = Wisata::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportWisata', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Wisata & Kelurahan Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
