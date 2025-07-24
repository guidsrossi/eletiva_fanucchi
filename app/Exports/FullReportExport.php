<?php

namespace App\Exports;

use App\Models\ElectiveChoice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class FullReportExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return ElectiveChoice::query()
            ->with(['student.class', 'elective'])
            ->select('student_id', 'elective_id', 'priority', 'accepted');
    }

    public function headings(): array
    {
        return [
            'Aluno',
            'Turma',
            'Projeto de Vida',
            'Eletiva',
            'Prioridade',
            'Aceito?',
        ];
    }

    public function map($row): array
    {
        return [
            $row->student->full_name,
            $row->student->class->name,
            $row->student->life_project,
            $row->elective->name,
            $row->priority,
            $row->accepted ? 'Sim' : 'Não',
        ];
    }
}