<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ElectiveChoice;
use App\Exports\FullReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $porEletiva = ElectiveChoice::select('elective_id', 'priority', DB::raw('count(*) as total'))
            ->groupBy('elective_id', 'priority')
            ->with('elective:id,name')
            ->get()
            ->groupBy('elective.name');

        $porTurma = ElectiveChoice::with('student.class', 'elective')
            ->get()
            ->groupBy(fn($c) => $c->student->class->name);

        return view('admin.reports.index', compact('porEletiva', 'porTurma'));
    }

    public function export()
    {
        return Excel::download(new FullReportExport, 'relatorio_eletivas.xlsx');
    }
}