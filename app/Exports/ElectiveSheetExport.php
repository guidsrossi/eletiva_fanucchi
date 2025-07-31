<?php

namespace App\Exports;

use App\Models\ElectiveChoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ElectiveSheetExport implements FromCollection, WithHeadings, WithTitle
{
    protected $electiveName;
    protected $choices;

    public function __construct($electiveName, $choices)
    {
        $this->electiveName = $electiveName;
        $this->choices = $choices;
    }

    public function collection()
    {
        return collect($this->choices)->map(function ($choice) {
            return [
                'Aluno' => $choice->student->full_name,
                'Turma' => $choice->student->class->name,
                'Projeto de vida' => $choice->student->life_project, // <- campo correto
                'Prioridade' => $choice->priority,
            ];
        });
    }

    public function headings(): array
    {
        return ['Aluno', 'Turma', 'Projeto de vida', 'Prioridade'];
    }

    public function title(): string
    {
        $clean = preg_replace('/[\\\\\\/*\\?\\[\\]:]/', '-', $this->electiveName);
        return mb_substr($clean, 0, 31);
    }
}