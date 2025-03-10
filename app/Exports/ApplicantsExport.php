<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ApplicantsExport implements FromView, WithStyles
{
    protected $data;

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:L1')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '24B14D'],
            ],
        ]);

        $sheet->getStyle('A1:L1')->getFont()->setColor(new Color(Color::COLOR_WHITE)); // White font color

        $sheet->getStyle('A1:L' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A1:L' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('export.resume', [
            'items' => $this->data,
        ]);
    }
}
