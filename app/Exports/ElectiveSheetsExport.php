<?php

namespace App\Exports;

use App\Models\Elective;
use App\Models\ElectiveChoice;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ElectiveSheetsExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

        $electives = Elective::with(['choices.student.class'])->get();

        foreach ($electives as $elective) {
            $sheets[] = new ElectiveSheetExport($elective->name, $elective->choices);
        }

        return $sheets;
    }
}