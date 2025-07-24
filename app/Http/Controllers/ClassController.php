<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.classes.index', [
            'classes' => ClassModel::orderBy('name')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:classes,name']);
        ClassModel::create($request->only('name'));
        return redirect()->route('classes.index');
    }

    public function edit(ClassModel $class)
    {
        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request, ClassModel $class)
    {
        $request->validate(['name' => 'required|string|unique:classes,name,' . $class->id]);
        $class->update($request->only('name'));
        return redirect()->route('classes.index');
    }

    public function destroy(ClassModel $class)
    {
        $class->delete();
        return redirect()->route('classes.index');
    }
}