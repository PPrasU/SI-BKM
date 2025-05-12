<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LembagaSwasta;
use Barryvdh\DomPDF\Facade\Pdf;


class LembagaSwastaController extends Controller
{
    public function LembagaSwasta(){
        $data = LembagaSwasta::all();
        return view('Admin/MainMenu/Pembangunan/LembagaSwasta/index', compact('data')); 
    }

    public function inputLembagaSwasta(){
        return view('Admin.CRUD.input.inputLembagaSwasta');
    }

    public function postLembagaSwasta(Request $request){
        //dd($request->all());
        LembagaSwasta::create($request->all());
        return redirect()->route('LembagaSwasta')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editLembagaSwasta($id){
        $data = LembagaSwasta::find($id);
        return view('Admin.CRUD.edit.editLembagaSwasta', compact('data'));
    }

    public function updateLembagaSwasta(Request $request, $id ){
        $data = LembagaSwasta::find($id);
        $data->update($request->all());
        return redirect()->route('LembagaSwasta')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusLembagaSwasta($id){
        $data = LembagaSwasta::find($id);
        $data->delete();
        return redirect()->route('LembagaSwasta')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportLembagaSwasta(){
        $data = LembagaSwasta::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportLembagaSwasta', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Kelurahan Tanjungrejo Dengan Lembaga Swasta.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
