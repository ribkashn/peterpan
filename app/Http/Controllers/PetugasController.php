<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\User;
use App\Models\paket;
use App\Models\petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('layout.utama');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporan(){
        $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
            ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
            ->whereBetween('datepicker', [request('tgl_awal'), request('tgl_akhir')])
            ->get();
       
        return view('petugas.laporan',compact('data_trans'));

    }
    public function daftar_cuci(){
        $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
        ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
        ->where('status_cuci','!=','0')
        ->latest()
        ->get();
        //$data_trans = transaksi::where('status_cuci','=','1')->get();
        return view('petugas.daftar_cuci',compact('data_trans')); //folder.file view
    }
    public function editCuci($id_trans){
        $data_trans = transaksi::findorfail($id_trans);
        return view('petugas.edit_cuci',compact('data_trans'));
    }
    public function updateCuci(Request $request, $id_trans)
    {
        $data_trans = transaksi::findorfail($id_trans);
        $data_trans->update($request->all());
        return redirect('/daftar_cuci')->with('status', 'Data Berhasil Diubah');
    }
    

    
    
}
