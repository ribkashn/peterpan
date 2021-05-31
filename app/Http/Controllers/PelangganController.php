<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\User;
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
        $data_trans = transaksi::all();
        return view('pesanan',compact('data_trans',));
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

        transaksi::create($request->all());
        return redirect('/pesanan')->with('toast_success', 'Data Berhasil Disimpan');
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


}
