<?php

namespace App\Exports;

use App\Sisya;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SisyaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sisya::all();
    }

    public function map($sisya): array
    {
        return [
            $sisya->id,
            $sisya->nik_bapak,
            $sisya->nama_bapak,
            $sisya->pekerjaan_bapak,
            $sisya->nohp_bapak,
            $sisya->nik_ibu,
            $sisya->nama_ibu,
            $sisya->pekerjaan_ibu,
            $sisya->nohp_ibu,
            $sisya->alamat,
            $sisya->kabupaten,
            $sisya->provinsi,
            $sisya->tingkat,
            $sisya->status
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIK Bapak',
            'Nama Bapak',
            'Pekerjaan Bapak',
            'No HP Bapak',
            'NIK Ibu',
            'Nama Ibu',
            'Pekerjaan Ibu',
            'No HP Ibu',
            'Alamat',
            'Kabupaten',
            'Provinsi',
            'Tingkat',
            'Status',          
        ];
    }   
}
