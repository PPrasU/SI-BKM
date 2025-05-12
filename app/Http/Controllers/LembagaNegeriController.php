<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LembagaNegeri;
use Barryvdh\DomPDF\Facade\Pdf;


class LembagaNegeriController extends Controller
{
    public function LembagaNegeri(){
        $data = LembagaNegeri::all();
        return view('Admin/MainMenu/Pembangunan/LembagaNegeri/index', compact('data')); 
    }

    public function inputLembagaNegeri(){
        return view('Admin.CRUD.input.inputLembagaNegeri');
    }

    public function postLembagaNegeri(Request $request){
        //dd($request->all());
        LembagaNegeri::create($request->all());
        return redirect()->route('LembagaNegeri')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editLembagaNegeri($id){
        $data = LembagaNegeri::find($id);
        return view('Admin.CRUD.edit.editLembagaNegeri', compact('data'));
    }

    public function updateLembagaNegeri(Request $request, $id ){
        $data = LembagaNegeri::find($id);
        $data->update($request->all());
        return redirect()->route('LembagaNegeri')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusLembagaNegeri($id){
        $data = LembagaNegeri::find($id);
        $data->delete();
        return redirect()->route('LembagaNegeri')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportLembagaNegeri(){
        $data = LembagaNegeri::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportLembagaNegeri', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Kelurahan Tanjungrejo Dengan Lembaga Negeri.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
