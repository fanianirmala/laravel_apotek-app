<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class SuratExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter::all();
    }
    public function headings(): array
    {
        return [
            "Id", "Nomor Surat", "Perihal", "Tanggal Keluar", "Penerima Surat", "Notulis"
        ];
    }
    public function map($let): array
    {
        return [
            $let->id,
            $let->letter_code,
            $let->letter_type,
            $let->created_at,
            $let->recipients,
            $let->notulis,
        ];
    }

    public function title(): string
    {
        return 'Data Surat';
    }

}
