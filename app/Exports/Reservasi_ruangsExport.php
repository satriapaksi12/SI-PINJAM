<?php

namespace App\Exports;

use App\Models\Reservasi_ruang;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_ruangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reservasi_ruangs = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'reservasi_ruang', 'sesi', 'jenis_acara', 'periode')->get();

        $data = $reservasi_ruangs->map(function ($reservasi_ruang) {
            return [
                $reservasi_ruang->id,
                $reservasi_ruang->no_reservasi,
                $reservasi_ruang->kelas,
                $reservasi_ruang->penanggung_jawab,
                $reservasi_ruang->no_telepon,
                $reservasi_ruang->unit->nama_unit,
                $reservasi_ruang->kegiatan,
                $reservasi_ruang->tanggal_mulai,
                $reservasi_ruang->tanggal_selesai,
                $reservasi_ruang->status,
                $reservasi_ruang->alasan,
                $reservasi_ruang->ruang->nama_ruang,
                $reservasi_ruang->ruang->kapasitas,
                $reservasi_ruang->ruang->fasilitas,
                $reservasi_ruang->ruang->gedung->nama_gedung,
                $reservasi_ruang->ruang->gedung->lokasi->nama_lokasi,
                $reservasi_ruang->jenis_acara->nama_jenis_acara,
                $reservasi_ruang->periode->tahun_periode,
                $reservasi_ruang->periode->semester,
                $reservasi_ruang->sesi->sesi,
                $reservasi_ruang->sesi->hari,
                $reservasi_ruang->sesi->jam_mulai,
                $reservasi_ruang->sesi->jam_selesai,
                $reservasi_ruang->created_at,
                $reservasi_ruang->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'No Reservasi',
            'Kelas',
            'Penanggung Jawab',
            'No Telepon Penanggung Jawab',
            'Unit Penanggung Jawab',
            'Kegiatan',
            'tanggal_mulai',
            'tanggal_selesai',
            'Status',
            'Alasan',
            'Nama Ruangan',
            'Kapasitas',
            'Fasilitas',
            'Nama Gedung',
            'Lokasi Kampus',
            'Jenis Acara',
            'Tahun Periode',
            'Semester',
            'Nama Sesi',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
