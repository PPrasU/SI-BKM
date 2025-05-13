<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\PokirController;
use App\Http\Controllers\PemkotController;
use App\Http\Controllers\SimpanController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\AbdimasController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\AbdimasLPPMController;
use App\Http\Controllers\DinasTerkaitController;
use App\Http\Controllers\PenguatanSDMController;
use App\Http\Controllers\SimpanPinjamController;
use App\Http\Controllers\LembagaNegeriController;
use App\Http\Controllers\LembagaSwastaController;
use App\Http\Controllers\PenguatanUMKMController;
use App\Http\Controllers\RencanaPembangunanController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('Admin/Dashboard/dashboard');
// });

Route::get('/login', function () {
    return view('login');
});

//-------------- ADMIN ------------------------
//======= View Biasa =======================
Route::get('/Admin/Pinjam', [SimpanPinjamController::class, 'SimpanPinjam'])->name('SimpanPinjam');

Route::get('/Admin/Simpan', [SimpanController::class, 'Simpan'])->name('Simpan');

Route::get('/Admin/Aspirasi-Rembuk-Warga', [AspirasiController::class, 'Aspirasi'])->name('Aspirasi');

Route::get('/Admin/Rencana-Pembangunan', [RencanaPembangunanController::class, 'RencanaPembangunan'])->name('RencanaPembangunan');

Route::get('/Admin/Pembangunan/Pemkot', [PemkotController::class, 'Pemkot'])->name('Pemkot');

Route::get('/Admin/Pembangunan/Pokir', [PokirController::class, 'Pokir'])->name('Pokir');

Route::get('/Admin/Pembangunan/Dinas-Terkait', [DinasTerkaitController::class, 'DinasTerkait'])->name('DinasTerkait');

Route::get('/Admin/Pembangunan/Lembaga-Negeri', [LembagaNegeriController::class, 'LembagaNegeri'])->name('LembagaNegeri');

Route::get('/Admin/Pembangunan/Lembaga-Swasta', [LembagaSwastaController::class, 'LembagaSwasta'])->name('LembagaSwasta');

Route::get('/Admin/Abdimas-Fisik-NonFisik', [AbdimasController::class, 'Abdimas'])->name('Abdimas');

Route::get('/Admin/Perawatan', [PerawatanController::class, 'Perawatan'])->name('Perawatan');

Route::get('/Admin/Penguatan-SDM', [PenguatanSDMController::class, 'PenguatanSDM'])->name('PenguatanSDM');

Route::get('/Admin/Penguatan-UMKM', [PenguatanUMKMController::class, 'PenguatanUMKM'])->name('PenguatanUMKM');

Route::get('/Admin/Abdimas-LPPM', [AbdimasLPPMController::class, 'AbdimasLPPM'])->name('AbdimasLPPM');

Route::get('/Admin/Wisata', [WisataController::class, 'Wisata'])->name('Wisata');

Route::get('/Admin/MOU/Daftar-LPPM-Kampus', function () {
    return view('Admin/MainMenu/MOU/ListKampus/index');
});

Route::get('/Admin/MOU-Negeri', function () {
    return view('Admin/MainMenu/MOU/MOUNegeri/index');
});

Route::get('/Admin/MOU-Kampus', function () {
    return view('Admin/MainMenu/MOU/MOUKampus/index');
});


//======= Input CRUD =======================
Route::get('/Admin/Pinjam/Input-Data', [SimpanPinjamController::class, 'inputSimpanPinjam'])->name('inputSimpanPinjam');

Route::get('/Admin/Simpan/Input-Data', [SimpanController::class, 'inputSimpan'])->name('inputSimpan');

Route::get('/Admin/Aspirasi-Rembuk-Warga/Input-Data', [AspirasiController::class, 'inputAspirasi'])->name('inputAspirasi');

Route::get('/Admin/Rencana-Pembangunan/Input-Data', [RencanaPembangunanController::class, 'inputRencanaPembangunan'])->name('inputRencanaPembangunan');

Route::get('/Admin/Pembangunan/Pemkot/Input-Data', [PemkotController::class, 'inputPemkot'])->name('inputPemkot');

Route::get('/Admin/Pembangunan/Pokir/Input-Data', [PokirController::class, 'inputPokir'])->name('inputPokir');

Route::get('/Admin/Pembangunan/Dinas-Terkait/Input-Data', [DinasTerkaitController::class, 'inputDinasTerkait'])->name('inputDinasTerkait');

Route::get('/Admin/Pembangunan/Lembaga-Negeri/Input-Data', [LembagaNegeriController::class, 'inputLembagaNegeri'])->name('inputLembagaNegeri');

Route::get('/Admin/Pembangunan/Lembaga-Swasta/Input-Data', [LembagaSwastaController::class, 'inputLembagaSwasta'])->name('inputLembagaSwasta');

Route::get('/Admin/Abdimas-Fisik-NonFisik/Input-Data', [AbdimasController::class, 'inputAbdimas'])->name('inputAbdimas');

Route::get('/Admin/Perawatan/Input-Data', [PerawatanController::class, 'inputPerawatan'])->name('inputPerawatan');

Route::get('/Admin/Penguatan-SDM/Input-Data', [PenguatanSDMController::class, 'inputPenguatanSDM'])->name('inputPenguatanSDM');

Route::get('/Admin/Penguatan-UMKM/Input-Data', [PenguatanUMKMController::class, 'inputPenguatanUMKM'])->name('inputPenguatanUMKM');

Route::get('/Admin/Abdimas-LPPM/Input-Data', [AbdimasLPPMController::class, 'inputAbdimasLPPM'])->name('inputAbdimasLPPM');

Route::get('/Admin/Wisata/Input-Data', [WisataController::class, 'inputWisata'])->name('inputWisata');


//======= Post CRUD ========================
Route::post('/Admin/Pinjam/Post-Data', [SimpanPinjamController::class, 'postSimpanPinjam'])->name('postSimpanPinjam');

Route::post('/Admin/Simpan/Post-Data', [SimpanController::class, 'postSimpan'])->name('postSimpan');

Route::post('/Admin/Aspirasi-Rembuk-Warga/Post-Data', [AspirasiController::class, 'postAspirasi'])->name('postAspirasi');

Route::post('/Admin/Rencana-Pembangunan/Post-Data', [RencanaPembangunanController::class, 'postRencanaPembangunan'])->name('postRencanaPembangunan');

Route::post('/Admin/Pembangunan/Pemkot/Post-Data', [PemkotController::class, 'postPemkot'])->name('postPemkot');

Route::post('/Admin/Pembangunan/Pokir/Post-Data', [PokirController::class, 'postPokir'])->name('postPokir');

Route::post('/Admin/Pembangunan/Dinas-Terkait/Post-Data', [DinasTerkaitController::class, 'postDinasTerkait'])->name('postDinasTerkait');

Route::post('/Admin/Pembangunan/Lembaga-Negeri/Post-Data', [LembagaNegeriController::class, 'postLembagaNegeri'])->name('postLembagaNegeri');

Route::post('/Admin/Pembangunan/Lembaga-Swasta/Post-Data', [LembagaSwastaController::class, 'postLembagaSwasta'])->name('postLembagaSwasta');

Route::post('/Admin/Abdimas-Fisik-NonFisik/Post-Data', [AbdimasController::class, 'postAbdimas'])->name('postAbdimas');

Route::post('/Admin/Perawatan/Post-Data', [PerawatanController::class, 'postPerawatan'])->name('postPerawatan');

Route::post('/Admin/Penguatan-SDM/Post-Data', [PenguatanSDMController::class, 'postPenguatanSDM'])->name('postPenguatanSDM');

Route::post('/Admin/Penguatan-UMKM/Post-Data', [PenguatanUMKMController::class, 'postPenguatanUMKM'])->name('postPenguatanUMKM');

Route::post('/Admin/Abdimas-LPPM/Post-Data', [AbdimasLPPMController::class, 'postAbdimasLPPM'])->name('postAbdimasLPPM');

Route::post('/Admin/Wisata/Post-Data', [WisataController::class, 'postWisata'])->name('postWisata');

//======= Edit CRUD ========================
Route::get('/Admin/Pinjam/Edit-Data/{id}', [SimpanPinjamController::class, 'editSimpanPinjam'])->name('editSimpanPinjam');

Route::get('/Admin/Simpan/Edit-Data/{id}', [SimpanController::class, 'editSimpan'])->name('editSimpan');

Route::get('/Admin/Aspirasi-Rembuk-Warga/Edit-Data/{id}', [AspirasiController::class, 'editAspirasi'])->name('editAspirasi');

Route::get('/Admin/Rencana-Pembangunan/Edit-Data/{id}', [RencanaPembangunanController::class, 'editRencanaPembangunan'])->name('editRencanaPembangunan');

Route::get('/Admin/Pembangunan/Pemkot/Edit-Data/{id}', [PemkotController::class, 'editPemkot'])->name('editPemkot');

Route::get('/Admin/Pembangunan/Pokir/Edit-Data/{id}', [PokirController::class, 'editPokir'])->name('editPokir');

Route::get('/Admin/Pembangunan/Dinas-Terkait/Edit-Data/{id}', [DinasTerkaitController::class, 'editDinasTerkait'])->name('editDinasTerkait');

Route::get('/Admin/Pembangunan/Lembaga-Negeri/Edit-Data/{id}', [LembagaNegeriController::class, 'editLembagaNegeri'])->name('editLembagaNegeri');

Route::get('/Admin/Pembangunan/Lembaga-Swasta/Edit-Data/{id}', [LembagaSwastaController::class, 'editLembagaSwasta'])->name('editLembagaSwasta');

Route::get('/Admin/Abdimas-Fisik-NonFisik/Edit-Data/{id}', [AbdimasController::class, 'editAbdimas'])->name('editAbdimas');

Route::get('/Admin/Perawatan/Edit-Data/{id}', [PerawatanController::class, 'editPerawatan'])->name('editPerawatan');

Route::get('/Admin/Penguatan-SDM/Edit-Data/{id}', [PenguatanSDMController::class, 'editPenguatanSDM'])->name('editPenguatanSDM');

Route::get('/Admin/Penguatan-UMKM/Edit-Data/{id}', [PenguatanUMKMController::class, 'editPenguatanUMKM'])->name('editPenguatanUMKM');

Route::get('/Admin/Abdimas-LPPM/Edit-Data/{id}', [AbdimasLPPMController::class, 'editAbdimasLPPM'])->name('editAbdimasLPPM');

Route::get('/Admin/Wisata/Edit-Data/{id}', [WisataController::class, 'editWisata'])->name('editWisata');


//======= Update CRUD ======================
Route::post('/Admin/Pinjam/Update-Data/{id}', [SimpanPinjamController::class, 'updateSimpanPinjam'])->name('updateSimpanPinjam');

Route::post('/Admin/Simpan/Update-Data/{id}', [SimpanController::class, 'updateSimpan'])->name('updateSimpan');

Route::post('/Admin/Aspirasi-Rembuk-Warga/Update-Data/{id}', [AspirasiController::class, 'updateAspirasi'])->name('updateAspirasi');

Route::post('/Admin/Rencana-Pembangunan/Update-Data/{id}', [RencanaPembangunanController::class, 'updateRencanaPembangunan'])->name('updateRencanaPembangunan');

Route::post('/Admin/Pemkot/Update-Data/{id}', [PemkotController::class, 'updatePemkot'])->name('updatePemkot');

Route::post('/Admin/Pokir/Update-Data/{id}', [PokirController::class, 'updatePokir'])->name('updatePokir');

Route::post('/Admin/Dinas-Terkait/Update-Data/{id}', [DinasTerkaitController::class, 'updateDinasTerkait'])->name('updateDinasTerkait');

Route::post('/Admin/Lembaga-Negeri/Update-Data/{id}', [LembagaNegeriController::class, 'updateLembagaNegeri'])->name('updateLembagaNegeri');

Route::post('/Admin/Lembaga-Swasta/Update-Data/{id}', [LembagaSwastaController::class, 'updateLembagaSwasta'])->name('updateLembagaSwasta');

Route::post('/Admin/Abdimas-Fisik-NonFisik/Update-Data/{id}', [AbdimasController::class, 'updateAbdimas'])->name('updateAbdimas');

Route::post('/Admin/Perawatan/Update-Data/{id}', [PerawatanController::class, 'updatePerawatan'])->name('updatePerawatan');

Route::post('/Admin/Penguatan-SDM/Update-Data/{id}', [PenguatanSDMController::class, 'updatePenguatanSDM'])->name('updatePenguatanSDM');

Route::post('/Admin/Penguatan-UMKM/Update-Data/{id}', [PenguatanUMKMController::class, 'updatePenguatanUMKM'])->name('updatePenguatanUMKM');

Route::post('/Admin/Abdimas-LPPM/Update-Data/{id}', [AbdimasLPPMController::class, 'updateAbdimasLPPM'])->name('updateAbdimasLPPM');

Route::post('/Admin/Wisata/Update-Data/{id}', [WisataController::class, 'updateWisata'])->name('updateWisata');

//======= Hapus CRUD =======================
Route::get('/Admin/Pinjam/Hapus-Data/{id}', [SimpanPinjamController::class, 'hapusSimpanPinjam'])->name('hapusSimpanPinjam');

Route::get('/Admin/Simpan/Hapus-Data/{id}', [SimpanController::class, 'hapusSimpan'])->name('hapusSimpan');

Route::get('/Admin/Aspirasi-Rembuk-Warga/Hapus-Data/{id}', [AspirasiController::class, 'hapusAspirasi'])->name('hapusAspirasi');

Route::get('/Admin/Rencana-Pembangunan/Hapus-Data/{id}', [RencanaPembangunanController::class, 'hapusRencanaPembangunan'])->name('hapusRencanaPembangunan');

Route::get('/Admin/Pemkot/Hapus-Data/{id}', [PemkotController::class, 'hapusPemkot'])->name('hapusPemkot');

Route::get('/Admin/Pokir/Hapus-Data/{id}', [PokirController::class, 'hapusPokir'])->name('hapusPokir');

Route::get('/Admin/Dinas-Terkait/Hapus-Data/{id}', [DinasTerkaitController::class, 'hapusDinasTerkait'])->name('hapusDinasTerkait');

Route::get('/Admin/Lembaga-Negeri/Hapus-Data/{id}', [LembagaNegeriController::class, 'hapusLembagaNegeri'])->name('hapusLembagaNegeri');

Route::get('/Admin/Lembaga-Swasta/Hapus-Data/{id}', [LembagaSwastaController::class, 'hapusLembagaSwasta'])->name('hapusLembagaSwasta');

Route::get('/Admin/Abdimas-Fisik-NonFisik/Hapus-Data/{id}', [AbdimasController::class, 'hapusAbdimas'])->name('hapusAbdimas');

Route::get('/Admin/Perawatan/Hapus-Data/{id}', [PerawatanController::class, 'hapusPerawatan'])->name('hapusPerawatan');

Route::get('/Admin/Penguatan-SDM/Hapus-Data/{id}', [PenguatanSDMController::class, 'hapusPenguatanSDM'])->name('hapusPenguatanSDM');

Route::get('/Admin/Penguatan-UMKM/Hapus-Data/{id}', [PenguatanUMKMController::class, 'hapusPenguatanUMKM'])->name('hapusPenguatanUMKM');

Route::get('/Admin/Abdimas-LPPM/Hapus-Data/{id}', [AbdimasLPPMController::class, 'hapusAbdimasLPPM'])->name('hapusAbdimasLPPM');

Route::get('/Admin/Wisata/Hapus-Data/{id}', [WisataController::class, 'hapusWisata'])->name('hapusWisata');

//======= Cetak PDF ========================
Route::get('/Admin/Pinjam/Export-Data/{id}', [SimpanPinjamController::class, 'exportSimpanPinjam'])->name('exportSimpanPinjam');

Route::get('/Admin/Simpan/Export-Data/{id}', [SimpanController::class, 'exportSimpan'])->name('exportSimpan');

Route::get('/Admin/Aspirasi-Rembuk-Warga/Export-Data/{id}', [AspirasiController::class, 'exportAspirasi'])->name('exportAspirasi');

Route::get('/Admin/Rencana-Pembangunan/Export-Data/{id}', [RencanaPembangunanController::class, 'exportRencanaPembangunan'])->name('exportRencanaPembangunan');

Route::get('/Admin/Pemkot/Export-Data/{id}', [PemkotController::class, 'exportPemkot'])->name('exportPemkot');

Route::get('/Admin/Pokir/Export-Data/{id}', [PokirController::class, 'exportPokir'])->name('exportPokir');

Route::get('/Admin/Dinas-Terkait/Export-Data/{id}', [DinasTerkaitController::class, 'exportDinasTerkait'])->name('exportDinasTerkait');

Route::get('/Admin/Lembaga-Negeri/Export-Data/{id}', [LembagaNegeriController::class, 'exportLembagaNegeri'])->name('exportLembagaNegeri');

Route::get('/Admin/Lembaga-Swasta/Export-Data/{id}', [LembagaSwastaController::class, 'exportLembagaSwasta'])->name('exportLembagaSwasta');

Route::get('/Admin/Abdimas-Fisik-NonFisik/Export-Data/{id}', [AbdimasController::class, 'exportAbdimas'])->name('exportAbdimas');

Route::get('/Admin/Perawatan/Export-Data/{id}', [PerawatanController::class, 'exportPerawatan'])->name('exportPerawatan');

Route::get('/Admin/Penguatan-SDM/Export-Data/{id}', [PenguatanSDMController::class, 'exportPenguatanSDM'])->name('exportPenguatanSDM');

Route::get('/Admin/Penguatan-UMKM/Export-Data/{id}', [PenguatanUMKMController::class, 'exportPenguatanUMKM'])->name('exportPenguatanUMKM');

Route::get('/Admin/Abdimas-LPPM/Export-Data/{id}', [AbdimasLPPMController::class, 'exportAbdimasLPPM'])->name('exportAbdimasLPPM');

Route::get('/Admin/Wisata/Export-Data/{id}', [WisataController::class, 'exportWisata'])->name('exportWisata');

//======== User =======================


//======= Login ======================

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');