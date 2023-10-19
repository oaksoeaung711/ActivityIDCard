<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index',compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }
    
    public function store(StoreProgramRequest $request)
    {
        Program::create([
            'name' => $request->name
        ]);

        return redirect()->route('programs.index');
    }

    public function edit(Program $program)
    {
        return view('programs.edit',compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update([
            'name' => $request->name,
        ]);

        return redirect()->route('programs.index');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('programs.index');
    }
}
