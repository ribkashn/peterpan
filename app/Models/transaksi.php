<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class transaksi extends Model
{
    /*public function allData(){
        return DB::table('transaksi')
            ->leftJoin('petugas', 'petugas.id_petugas', '=', 'transaksi.id_petugas')
            ->get();
    }*/
    protected $table = "transaksi";
    protected $primaryKey = 'id_trans';
    protected $fillable = ['plat_nomor','nama_pelanggan','datepicker','rating','id_paket','bukti_image','harga','tips','status_cuci','id_petugas'];

     /*public function petugas()
    {
        return $this->belongsTo(petugas::class);
        //aman
    }

    public function paket()
    {
        return $this->belongsTo(paket::class);
        //aman
    }

    public function user()
    {
        return $this->belongsTo(User::class);
        //aman
    } */
}
