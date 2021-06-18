<?php

namespace App\Exports;

use App\Models\transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tgl_awal = request('tgl_awal');
        $tgl_akhir = request('tgl_akhir');

        return transaksi:://join('petugas', 'petugas.id', '=', 'transaksi.id_petugas')
            //->join('paket', 'paket.id', '=', 'transaksi.id_paket')
            whereBetween('datepicker', [ $tgl_awal, $tgl_akhir ] )
            ->where('status_cuci','=','3')
            ->where('id_petugas','!=','0')
            ->get();
        
    
           
    }
    public function headings() : array {
        return [
            'Id Transaksi',
            'Petugas',
            'Plat Kendaraan',
            'Pelanggan',
            'Tanggal Cuci',
            'Rating',
            'Paket',
            'Status Cuci',
            'Bukti Bayar',
            'Harga',
            'Created At',
            'Updated At',
        ] ;
    }
}
