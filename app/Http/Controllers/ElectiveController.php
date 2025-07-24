<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elective;

class ElectiveController extends Controller
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
        return view('admin.electives.index', [
            'electives' => Elective::orderBy('name')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.electives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|unique:electives,name',
            'seats' => 'required|integer|min:1',
        ]);
        Elective::create($request->only('name', 'seats'));
        return redirect()->route('electives.index');
    }

    public function edit(Elective $elective)
    {
        return view('admin.electives.edit', compact('elective'));
    }

    public function update(Request $request, Elective $elective)
    {
        $request->validate([
            'name'  => 'required|string|unique:electives,name,' . $elective->id,
            'seats' => 'required|integer|min:1',
        ]);
        $elective->update($request->only('name', 'seats'));
        return redirect()->route('electives.index');
    }

    public function destroy(Elective $elective)
    {
        $elective->delete();
        return redirect()->route('electives.index');
    }
}