<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    protected $table = "paket";
    protected $primaryKey = 'id';
    protected $fillable = ['paket','harga'];

    //public function transaksi()
    //{
    //    return $this->belongsToMany(transaksi::class);
    //} 

}
