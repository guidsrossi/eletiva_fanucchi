<?php

namespace App\Http\Controllers;

use App\Models\Elective;
use App\Models\ElectiveChoice;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'user' => auth()->user(),
        ]);
    }

    public function clearElective(Elective $elective)
    {
        ElectiveChoice::where('elective_id', $elective->id)->delete();

        return redirect()->back()->with('success', 'Inscrições da eletiva "' . $elective->name . '" removidas com sucesso.');
    }

    public function clearAll()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ElectiveChoice::truncate();
        Student::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->back()->with('success', 'Todas as inscrições foram removidas com sucesso.');
    }
}