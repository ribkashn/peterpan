<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.utama');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function transaksi()
    {
        $data_trans = transaksi::all();
        return view('admin.transaksi',compact('data_trans'));
    }
    public function simpan(Request $request)
    {

        transaksi::create($request->all());
        return redirect('/transaksi')->with('toast_success', 'Data Berhasil Disimpan');
    }
   
    public function input_motor_reg()
    {
        return view('admin.form_motor_reg');
    }
        // form input motor premium
    public function input_motor_pre()
    {
        return view('admin.form_motor_pre');
    }
    //-------------- Mobil
    
    public function input_mobil_reg()
    {
        return view('admin.form_mobil_reg');
    }
        // form input motor premium
    public function input_mobil_pre()
    {
        return view('admin.form_mobil_pre');
    }
    public function edit($id_trans){
        $data_trans = transaksi::findorfail($id_trans);
        return view('admin.edit_trans',compact('data_trans'));
    }

    public function update(Request $request, $id_trans)
    {
        $data_trans = transaksi::findorfail($id_trans);
        $data_trans->update($request->all());
        return redirect('/transaksi')->with('toast_success', 'Data Berhasil Diubah');
    }

    public function delete($id_trans)
    {
        $data_trans = transaksi::findorfail($id_trans);
        $data_trans->delete();
        return redirect('/transaksi')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
