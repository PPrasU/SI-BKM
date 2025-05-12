<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Abdimas;
use Barryvdh\DomPDF\Facade\Pdf;


class AbdimasController extends Controller
{
    public function Abdimas(){
        $data = Abdimas::all();
        return view('Admin/MainMenu/Abdimas/index', compact('data')); 
    }

    public function inputAbdimas(){
        return view('Admin.CRUD.input.inputAbdimas');
    }

    public function postAbdimas(Request $request){
        //dd($request->all());
        Abdimas::create($request->all());
        return redirect()->route('Abdimas')->with('Success', 'Data Berhasil Ditambahkan');
    }

    public function editAbdimas($id){
        $data = Abdimas::find($id);
        return view('Admin.CRUD.edit.editAbdimas', compact('data'));
    }

    public function updateAbdimas(Request $request, $id ){
        $data = Abdimas::find($id);
        $data->update($request->all());
        return redirect()->route('Abdimas')->with('Success', 'Data Berhasil Diperbarui');
    }

    public function hapusAbdimas($id){
        $data = Abdimas::find($id);
        $data->delete();
        return redirect()->route('Abdimas')->with('Success', 'Data Berhasil Dihapus');
    }

    public function exportAbdimas(){
        $data = Abdimas::all();
        $pdf = pdf::loadView('Admin.CRUD.pdf.exportAbdimas', compact('data'));
        $dateTime = date('d-m-Y_H:i:s');
    
        // Menyusun nama file PDF dengan format yang diinginkan
        $fileName = "{$dateTime}_Laporan Abdimas Fisik dan Non Fisik.pdf";
    
        // Mengunduh file PDF dengan nama yang telah disusun
        return $pdf->download($fileName);
    }
}
