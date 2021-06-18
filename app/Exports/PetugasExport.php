<?php

namespace App\Exports;

use App\Models\petugas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PetugasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tgl_awal = request('tgl_awal');
        $tgl_akhir = request('tgl_akhir');

        return petugas:://join('transaksi', 'transaksi.id_petugas', '=', 'petugas.id_petugas')
            //->join('paket', 'paket.id_paket', '=', 'transaksi.id_paket')
            whereBetween('tgl_tugas', [ $tgl_awal, $tgl_akhir ] )
            ->get();
    }

    public function headings() : array {
        return [
            'Id Petugas',
            'Nama Petugas',
            'Uang Harian',
            'Pendapatan',
            'Persentase Pendapatan',
            'Bonus',
            'Gaji',
            'Tanggal Tugas',
        ] ;
    }
}
