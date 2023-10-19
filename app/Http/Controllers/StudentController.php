<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Batch;
use App\Models\Program;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $programs = Program::all();
        $batches = Batch::all();
        return view('students.index',compact('students','programs','batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        $batches = Batch::all();
        return view('students.create',compact('programs','batches'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = new Student();
        if($request->has('id')){
            $student->id = $request->id;
        }
        $student->program_id = $request->programid;
        $student->batch_id = $request->batchid;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->guardianname = $request->guardianname;
        $student->dob = $request->dob;
        $student->emergencyphone1 = $request->emergencyphone1;
        $student->emergencyphone2 = $request->emergencyphone2;
        $student->schoolemergencyphone = $request->schoolemergencyphone;
        if($request->has('studentprofilepicture')){
            $newfilename = uniqid().".".$request->file('studentprofilepicture')->extension();
            Storage::disk('public')->put('studentimages/'.$newfilename,$request->file('studentprofilepicture')->get());
            $student->studentprofilepicture = 'studentimages/'.$newfilename;

        }
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
