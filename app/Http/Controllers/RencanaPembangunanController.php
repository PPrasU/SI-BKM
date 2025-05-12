<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RencanaPembangunan;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class RencanaPembangunanController extends Controller
{
    public function RencanaPembangunan(){
        $data = RencanaPembangunan::all();
        return view('Admin/MainMenu/RencanaPembangunan/index', compact('data')); 
    }

    public function inputRencanaPembangunan(){
        return view('Admin.CRUD.input.inputRencanaPembangunan');
    }

    public function postRencanaPembangunan(Request $request){
        //dd($request->all());
        RencanaPembangunan::create($request->all());
        return redirect()->route('RencanaPembangunan')->with('Success', 'Data Rencana Pembangunan Berhasil Ditambahkan');
    }

    public function editRencanaPembangunan($id){
        $data = RencanaPembangunan::find($id);
        return view('Admin.CRUD.edit.editRencanaPembangunan', compact('data'));
    }

    public function updateRencanaPembangunan(Request $request, $id ){
        $data = RencanaPembangunan::find($id);
        $data->update($request->all());
        return redirect()->route('RencanaPembangunan')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusRencanaPembangunan($id){
        $data = RencanaPembangunan::find($id);
        $data->delete();
        return redirect()->route('RencanaPembangunan')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportRencanaPembangunan(){
        $data = RencanaPembangunan::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportRencanaPembangunan', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Rencana Pembangunan Masyarakat Tanjungrejo.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
