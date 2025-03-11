<?php

namespace App\Exports;

use App\Models\Certificate;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CesExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize, WithDrawings
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        return Certificate::whereBetween('id', [$this->from, $this->to])
            ->orderByDesc('id')
            ->get();
    }

    public function map($certificate): array
    {
        $certificateId = is_numeric($certificate->certificate_id) ? intval($certificate->certificate_id) : $certificate->certificate_id;

        return [
            $certificate->certificate_id,
            '', // Certificate Image (Handled in drawings)
            $certificate->trainer_full_name,
            '', // Trainer Image (Handled in drawings)
            $certificate->valid_from,
            $certificate->valid_to,
        ];
    }


    public function headings(): array
    {
        return [
            'Certificate Code',
            'Certificate Image',
            'Trainer Full Name',
            'Trainer Image',
            'Valid From',
            'Valid To',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                foreach (range('A', 'F') as $col) {
                    $sheet->getColumnDimension($col)->setWidth(30);
                }
                foreach (range(2, $sheet->getHighestRow()) as $row) { // ابدأ من الصف الثاني
                    $sheet->getRowDimension($row)->setRowHeight(40); // ارتفاع الصف
                }

                $sheet->getStyle('B')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('D')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $certificates = Certificate::whereBetween('id', [$this->from, $this->to])->get();

        foreach ($certificates as $index => $certificate) {
            $row = $index + 2; // ابدأ من الصف الثاني

            // صورة الشهادة
            $certificateImagePath = storage_path('app/public/' . $certificate->certificate_img);
            if (file_exists($certificateImagePath)) {
                list($width, $height) = getimagesize($certificateImagePath); // أبعاد الصورة
                $aspectRatio = $width / $height; // نسبة العرض إلى الارتفاع

                $certificateImage = new Drawing();
                $certificateImage->setName('Certificate Image');
                $certificateImage->setDescription('Certificate Image');
                $certificateImage->setPath($certificateImagePath);
                $certificateImage->setHeight(50); // ارتفاع الصورة
                $certificateImage->setWidth(50 * $aspectRatio); // عرض الصورة بناءً على النسبة
                $certificateImage->setCoordinates('B' . $row); // موقع الصورة
                $drawings[] = $certificateImage;
            } else {
                Log::error('Certificate image not found at path: ' . $certificateImagePath);
            }

            // صورة المدرب
            $trainerImagePath = storage_path('app/public/' . $certificate->trainer_img);
            if (file_exists($trainerImagePath)) {
                list($width, $height) = getimagesize($trainerImagePath); // أبعاد الصورة
                $aspectRatio = $width / $height; // نسبة العرض إلى الارتفاع

                $trainerImage = new Drawing();
                $trainerImage->setName('Trainer Image');
                $trainerImage->setDescription('Trainer Image');
                $trainerImage->setPath($trainerImagePath);
                $trainerImage->setHeight(50); // ارتفاع الصورة
                $trainerImage->setWidth(50 * $aspectRatio); // عرض الصورة بناءً على النسبة
                $trainerImage->setCoordinates('D' . $row); // موقع الصورة
                $drawings[] = $trainerImage;
            } else {
                Log::error('Trainer image not found at path: ' . $trainerImagePath);
            }
        }

        return $drawings;
    }
}
