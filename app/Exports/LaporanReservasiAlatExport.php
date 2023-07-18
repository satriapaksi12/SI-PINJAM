<?php

namespace App\Exports;

use App\Models\Reservasi_alat;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanReservasiAlatExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        // Query data berdasarkan bulan dan tahun
        return Reservasi_alat::whereMonth('tanggal_mulai', $this->bulan)
            ->whereYear('tanggal_mulai', $this->tahun)
            ->get();
    }
    public function headings(): array
    {
        // Sesuaikan heading dengan struktur kolom di tabel database
        return [
            'ID',
            'Kegiatan',
            'Alasan',
            'Surat',
            'Penanggung Jawab',
            'Status',
            'No Reservasi',
            'No Telepon',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Jam Mulai',
            'Jam Selesai',
            'Created At',
            'Updated At',
            'User ID',
            'Unit ID',
            'Alat ID',
        ];
    }

}
