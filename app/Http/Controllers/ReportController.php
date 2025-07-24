<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ElectiveChoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = ElectiveChoice::select('elective_id', 'priority', DB::raw('count(*) as total'))
            ->groupBy('elective_id', 'priority')
            ->with('elective:id,name')
            ->get();

        $byClass = ElectiveChoice::with('student.class', 'elective')
            ->get()
            ->groupBy(fn($c) => $c->student->class->name);

        return view('admin.reports.index', compact('data', 'byClass'));
    }
}