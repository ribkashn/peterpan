<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\petugas;
use App\Models\User;
use App\Models\paket;
class PelangganController extends Controller
{
    public function index()
    {
        return view('layout.utama');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function tentang()
    {
        return view('pelanggan.tentang');
    }
    public function pesanan()
    {
        $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
        ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
        ->latest()
        ->get();
        return view('pesanan',compact('data_trans'));
        //dd($data_trans);
    }
    //-------------- Motor
    public function motor()
    {
        
        return view('pelanggan.cuci_motor');
    }
    public function input_motor_reg()
    {
        return view('pelanggan.form_motor_reg');
    }
        // form input motor premium
    public function input_motor_pre()
    {
        return view('pelanggan.form_motor_pre');
    }
    public function simpan(Request $request)
    {
        //transaksi::create($request->all());
       
        $data_trans = new transaksi;
        $data_trans->id_trans = $request->input('id_trans');
        $data_trans->plat_nomor = $request->input('plat_nomor');
        $data_trans->nama_pelanggan = $request->input('nama_pelanggan');
        $data_trans->datepicker = $request->input('datepicker');
        $data_trans->rating = $request->input('rating');
        $data_trans->id_petugas = $request->input('id_petugas');
        //$data_trans->id_pelanggan = $request->input('id_pelanggan');
        $data_trans->id_paket = $request->input('id_paket');
        $data_trans->status_cuci = $request->input('status_cuci');
        $data_trans->bukti_image = $request->input('bukti_image');
        $data_trans->harga = $request->input('harga');
        $data_trans->tips = $request->input('tips');
       if($request ->hasfile('bukti_image'))
       {
           $file = $request ->file('bukti_image');
           $extention = $file ->getClientOriginalName();
           $filename = time().'.'.$extention;
           $file ->move('uploads/bukti_bayar', $filename);
           $data_trans ->bukti_image =$filename;
       }
       $data_trans ->save();
        return redirect('/pesanan')->with('status','Pesanan Berhasil Disimpan');
    }
    //-------------- Mobil
    public function mobil()
    {
        
        return view('pelanggan.cuci_mobil');
    }
    public function input_mobil_reg()
    {
        return view('pelanggan.form_mobil_reg');
    }
        // form input motor premium
    public function input_mobil_pre()
    {
        return view('pelanggan.form_mobil_pre');
    }
    public function editRating($id_trans){
        $data_trans = transaksi::findorfail($id_trans);
        return view('pelanggan.rating',compact('data_trans'));
    }

    public function updateRating(Request $request, $id_trans)
    {
        $data_trans = transaksi::findorfail($id_trans);
        $data_trans->update($request->all());
        return redirect('/pesanan')->with('status', 'Data Berhasil Diubah');
    }


}
