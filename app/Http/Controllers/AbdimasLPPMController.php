<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AbdimasLPPM;
use Barryvdh\DomPDF\Facade\Pdf;


class AbdimasLPPMController extends Controller
{
    public function AbdimasLPPM(){
        $data = AbdimasLPPM::all();
        return view('Admin/MainMenu/AbdimasLPPM/index', compact('data')); 
    }

    public function inputAbdimasLPPM(){
        return view('Admin.CRUD.input.inputAbdimasLPPM');
    }

    public function postAbdimasLPPM(Request $request){
        //dd($request->all());
        AbdimasLPPM::create($request->all());
        return redirect()->route('AbdimasLPPM')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editAbdimasLPPM($id){
        $data = AbdimasLPPM::find($id);
        return view('Admin.CRUD.edit.editAbdimasLPPM', compact('data'));
    }

    public function updateAbdimasLPPM(Request $request, $id ){
        $data = AbdimasLPPM::find($id);
        $data->update($request->all());
        return redirect()->route('AbdimasLPPM')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusAbdimasLPPM($id){
        $data = AbdimasLPPM::find($id);
        $data->delete();
        return redirect()->route('AbdimasLPPM')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportAbdimasLPPM(){
        $data = AbdimasLPPM::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportAbdimasLPPM', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Abdimas LPPM.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
