<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PengaduansExport implements FromCollection, WithHeadings, WithProperties, WithTitle, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pengaduan::all();
    }

    public function headings(): array
    {
        return [
            'Id Users',
            'Tanggal Pengaduan',
            'Judul',
            'NIK User',
            'Pengaduan User',
            'Foto',
            'Status Pengaduan',
            'Dibuat',
            'Diperbarui',
        ];
    }

    // public function sheets(): array
    // {
    //     $sheets = [];
    //     $sheets["Pengaduan 1"] = new PengaduansExport;
    //     $sheets["Pengaduan 2"] = new PengaduansExport;
    //     for ($month = 1; $month <= 12; $month++) {
    //          $sheets[] = new InvoicesPerMonthSheet($this->year, $month);
    //     }
    //     return $sheets;
    // }

    public function properties(): array
    {
        return [
            'creator'        => 'Ulala',
            'lastModifiedBy' => auth()->user()->name,
            'title'          => 'Pengaduan',
        ];
    }

    public function title(): string
    {
        return 'Pengaduan Masyarakat';
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
