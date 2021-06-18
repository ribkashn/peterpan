<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = "petugas";
    protected $primaryKey = 'id';
    protected $fillable = ['nama_petugas', 'uang_harian', 'pendapatan', 'bonus', 'gaji','tgl_tugas','tip'];
    public $timestamps = false;
    //public function transaksi()
    //{
    //    return $this->belongsToMany(transaksi::class);
    //}

}
