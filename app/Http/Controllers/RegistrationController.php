<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Elective;
use App\Models\ElectiveChoice;
use App\Models\ClassModel;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('form', [
            'classes' => ClassModel::orderBy('name')->get(),
            'electives' => Elective::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'life_project' => 'required|string',
            'electives' => 'required|array|min:1|max:4',
            'electives.*' => 'nullable|exists:electives,id',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $student = Student::create([
                    'full_name' => $request->full_name,
                    'life_project' => $request->life_project,
                    'class_id' => $request->class_id,
                ]);

                foreach ($request->electives as $idx => $electiveId) {
                    if (!$electiveId)
                        continue;

                    $elective = Elective::lockForUpdate()->find($electiveId);

                    if (!$elective) {
                        throw new \Exception("Eletiva ID $electiveId não encontrada");
                    }

                    $accepted = $elective->seatsLeft() > 0;

                    ElectiveChoice::create([
                        'student_id' => $student->id,
                        'elective_id' => $electiveId,
                        'priority' => $idx + 1,
                        'accepted' => $accepted,
                    ]);
                }

                if (!$student->choices()->where('accepted', true)->exists()) {
                    $student->choices()->orderBy('priority')->first()?->update(['accepted' => true]);
                }
            });

            return redirect()->route('form')->with('success', 'Inscrição enviada!');
        } catch (\Throwable $e) {
            dd('ERRO: ' . $e->getMessage());
        }
    }
}