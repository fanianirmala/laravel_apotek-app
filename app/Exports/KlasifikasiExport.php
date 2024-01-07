<?php

namespace App\Exports;

use App\Models\LetterType;
use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class KlasifikasiExport implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LetterType::all();
    }
    public function headings(): array
    {
        return [
            "ID", "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }
    public function map($let): array
    {
        return [
            $let->id,
            $let->letter_code,
            $let->name_type,
            Letter::where('letter_type_id', $let->id)->count()
        ];
    }

    public function title(): string
    {
        return 'Klasifikasi Surat';
    }

}
