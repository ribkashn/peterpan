<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "transaksi";
    protected $primaryKey = 'id_trans';
    protected $fillable = ['plat_nomor','nama_pelanggan','datepicker','rating','paket','bukti_bayar','harga'];

    
}
