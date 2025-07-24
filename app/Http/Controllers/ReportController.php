<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ElectiveChoice;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless(auth()->user()?->is_admin, 403);
            return $next($request);
        });
    }

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