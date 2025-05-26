<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;


class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subjects::all();
        return view('subject.index', compact('subject'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:subjects,name',
            'subject_code' => 'required|unique:subjects,subject_code',
            'description' => 'required',
        ]);

        Subjects::create($validated);
        return redirect()->route('subject.index')->with('success', 'Subject created successfully');
    }

    public function show(string $id)
    {
        $subject = Subjects::findOrFail($id);
        return view('subject.view', compact('subject'));
    }

    public function edit(string $id)
    {
        $subject= Subjects::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => "required|unique:subjects,name,$id,id_subject",
            'subject_code' => "required|unique:subjects,subject_code,$id,id_subject",
            'description' => 'required',
        ]);

        $subject = Subjects::findOrFail($id);
        $subject->update($validated);

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    }

    public function destroy(string $id)
    {
        $subject = Subjects::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully');
    }
}
