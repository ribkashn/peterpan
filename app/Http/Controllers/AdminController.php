<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\User;
use App\Models\paket;
use App\Models\petugas;
use App\Exports\TransaksiExport;
use App\Exports\PetugasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;


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
        
        
        $data_trans = transaksi::
        join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
        ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
        ->join('petugas', 'petugas.tip', '=', 'transaksi.tips')
        ->latest()
        ->get();
        //dd($data_trans);
        return view('admin.transaksi',compact('data_trans'));
    }
    public function simpan(Request $request)
    {

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
       if($request ->hasfile('bukti_image'))
       {
           $file = $request ->file('bukti_image');
           $extention = $file ->getClientOriginalName();
           $filename = time().'.'.$extention;
           $file ->move('uploads/bukti_bayar', $filename);
           $data_trans ->bukti_image =$filename;
       }
       $data_trans ->save();
        return redirect('/transaksi')->with('status','Pesanan Berhasil Disimpan');
    
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
        return redirect('/transaksi')->with('status', 'Data Berhasil Diubah');
    }

    public function delete($id_trans)
    {
        $data_trans = transaksi::findorfail($id_trans);
        $data_trans->delete();
        return redirect('/transaksi')->with('status', 'Data Berhasil Dihapus');
    }
    //------------------------------------- Data Petugas
    public function data_petugas()
    {
        //$ujian = ujian::where('dosen_id', '=', '0')->get()->toArray();
        $data_user = User::all();
        return view('admin.data_petugas',compact('data_user')); //folder.file view
    }
    public function input_petugas()
    {
        return view('admin.form_petugas');
    }
    public function simpan_petugas(Request $request)
    {
        User::create($request->all());
        return redirect('/data_petugas')->with('status', 'Data Berhasil Disimpan');
    }
    public function hapus($id)
    {
        $data_user = User::findorfail($id);
        $data_user->delete();
        return redirect('/data_petugas')->with('status', 'Data Berhasil Dihapus');
    }
//laporan transaksi
    public function laporan()
    {
       
            $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
            ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
            ->where('status_cuci','=','3')
            ->whereBetween('datepicker', [request('tgl_awal'), request('tgl_akhir')])
            ->get();
            return view('admin.laporan', compact('data_trans')); 
    }

    
    public function transaksiexport(request $request)
    {
        //dd($request->input('tgl_awal'));
    return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }
    public function laporanPetugas()
    {
        //ganti transaksi jdi petugas
        $data_petugas = petugas::join('transaksi', 'transaksi.id_petugas', '=', 'petugas.id')
        //->join('paket', 'paket.id_paket', '=', 'transaksi.id_paket')
        ->whereBetween('tgl_tugas', [request('tgl_awal'), request('tgl_akhir')])
        ->get(); 
        //$total_semua = petugas::(\DB::raw('uang_harian + pendapatan +bonus'))
            
            return view('admin.laporan_petugas', compact('data_petugas')); 
    }
    public function petugasexport(request $request)
    {
        return Excel::download(new PetugasExport, 'petugas_laporan.xlsx');
    }
    
    public function laporan_count()
    {
    
        $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
        ->join('paket', 'paket.id', '=', 'transaksi.id_paket')
        //->havingRaw('count(*) > 1')
        ->get();
        return view('admin.laporan_pelanggan', compact('data_trans')); 
        //$count = transaksi::count('id_trans');
        
        //->count();
        //dd($count);
       // $data_trans = transaksi::join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
        //->join('paket', 'paket.id', '=', 'transaksi.id_paket')
        //->whereIn('id', function ( $query ) {
            //$query->select('id')->from('users')->groupBy('ip')->havingRaw('count(*) > 1');})
         //   ->get();
        //dd($data_trans);
    }

    public function detailgaji()
    {
        $data_petugas = petugas::join('transaksi', 'transaksi.id_petugas', '=', 'petugas.id')
        ->get();
        //$total_gaji = petugas::count();
        //dd($data_petugas);

        return view('admin.detail_gaji', compact('data_petugas'));
        //dd($total_gaji);
    }
    //form gaji mirip edit
    public function editgaji($id)
    {
        $data_petugas = petugas::findorfail($id);
        return view('admin.penggajian', compact('data_petugas'));
    }
    
    public function updategaji(Request $request, $id)
    {
        $data_petugas = petugas::findorfail($id);
        $data_petugas->update($request->all());
        return redirect('/detail_gaji')->with('status', 'Data Berhasil Disimpan');
        //dd($data_petugas);
    }

    /////////////////////////
   






























    
    /*public function laporanPetugas(Request $request)
    {
        
        
        $data_trans = transaksi::join('petugas', 'petugas.id_petugas', '=', 'transaksi.id_petugas')
        ->join('paket', 'paket.id_paket', '=', 'transaksi.id_paket')
        //->whereBetween('datepicker', [$request->tgl_awal, $request->tgl_akhir]);
        //join('petugas', 'petugas.id_petugas', '=', 'transaksi.id_petugas')
        
        //->where('status_cuci','=','2')
       // ->where('datepicker',$request->tgl_awal)between
        //->where('datepicker','<=',$request->tgl_akhir)
        ->get();
        return view('admin.laporan_petugas',compact('data_trans'));
    }
    public function petugasexport()
    {
            return Excel::download(new PetugasExport, 'petugas_laporan.xlsx');
    }
    */
    public function countPelanggan(Request $request)
    {
        $data_pelanggan = transaksi::join('users', 'users.id', '=', 'transaksi.id_pelanggan')
        ->join('paket', 'paket.id_paket', '=', 'transaksi.id_paket')
        //->join('user', 'user.name', '=', 'transaksi.nama_pelanggan')
        //->count();
        ->where('id_petugas',$id_petugas)->count();
        //->get();

        return view('admin.laporan_pelanggan',compact('data_pelanggan'));
    }
    
}
