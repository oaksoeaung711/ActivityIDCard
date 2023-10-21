<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Batch;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $programs = Program::all();
        $batches = Batch::all();
        return view('students.index',compact('students','programs','batches'));
    }

    public function create()
    {
        $programs = Program::all();
        $batches = Batch::all();
        return view('students.create',compact('programs','batches'));
    }

    public function createnewmemberid($id)
    {
        $idcount = 6-strlen($id);
        $newid = "";
        for($i = 0; $i<$idcount;$i++){
            $newid.="0";
        }
        return "KBTC-".$newid.$id;
    }

    public function store(StoreStudentRequest $request)
    {
        // Image Upload
        if($request->has('studentprofilepicture')){
            $newfilename = uniqid().".".$request->file('studentprofilepicture')->extension();
            Storage::disk('public')->put('studentimages/'.$newfilename,$request->file('studentprofilepicture')->get());
            $studentprofilepicture = 'studentimages/'.$newfilename;
        }

        $student = Student::create([
            'id' => ($request->has('id')) ? $request->id : "",
            'program_id' => $request->programid,
            'batch_id' => $request->batchid,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'campus' => $request->campus,
            'guardianname' => $request->guardianname,
            'dob' => $request->dob,
            'emergencyphone1' => $request->emergencyphone1,
            'emergencyphone2' => $request->emergencyphone2,
            'schoolemergencyphone' => $request->schoolemergencyphone,
            'studentprofilepicture' => empty($studentprofilepicture) ? "" : $studentprofilepicture,
            'dateofissue' => $request->dateofissue,
        ]);

        // Create new member id
        $newmemberid = Student::findOrFail($student->id);
        $newmemberid->member_id = $this->createnewmemberid($newmemberid->id);
        $newmemberid->save();
        return redirect()->route('students.index');
    }

    public function masscreate()
    {
        return view('students.masscreate');
    }

    public function massstore(Request $request)
    {
        $reader = Reader::createFromPath($request->students, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $successemails = [];
        $erroremails = [];
        foreach($records as $offset => $record){
            $programid = Program::where('name',$record['Program'])->first() ? Program::where('name',$record['Program'])->first()->id : "";
            $batchid = Batch::where('name',$record['Batch'])->first() ? Batch::where('name',$record['Batch'])->first()->id : "";
            if(!empty($programid) && !empty($batchid)){
                if($record['MemberID'] == "") {
                    $student = Student::create([
                        'program_id' => $programid,
                        'batch_id' => $batchid,
                        'name' => $record['Name'],
                        'email' => $record['Email'],
                        'phone' => $record['Phone'],
                        'campus' => $record['Campus'],
                        'guardianname' => $record['Guardian Name'],
                        'dob' => $record['Date Of Birth'],
                        'emergencyphone1' => $record['Emergency Phone 1'],
                        'emergencyphone2' => $record['Emergency Phone 2'],
                        'schoolemergencyphone' => $record['School Emergency Phone'],
                        'dateofissue' => $record['Date Of Issue'],
                    ]);
                    $newmemberid = Student::findOrFail($student->id);
                    $newmemberid->member_id = $this->createnewmemberid($newmemberid->id);
                    $newmemberid->save();
                    $successemails[] = $record['Email'];
                }else{
                    $student = Student::create([
                        'id' => $record['MemberID'],
                        'program_id' => $programid,
                        'batch_id' => $batchid,
                        'name' => $record['Name'],
                        'email' => $record['Email'],
                        'phone' => $record['Phone'],
                        'campus' => $record['Campus'],
                        'guardianname' => $record['Guardian Name'],
                        'dob' => $record['Date Of Birth'],
                        'emergencyphone1' => $record['Emergency Phone 1'],
                        'emergencyphone2' => $record['Emergency Phone 2'],
                        'schoolemergencyphone' => $record['School Emergency Phone'],
                        'dateofissue' => $record['Date Of Issue'],
                    ]);

                    // Create new member id
                    $newmemberid = Student::findOrFail($student->id);
                    $newmemberid->member_id = $this->createnewmemberid($newmemberid->id);
                    $newmemberid->save();
                    $successemails[] = $record['Email'];
                }
            }else{
                $erroremails[] = $record['Email'];
            }
        }
        return view('students.verpose',compact('successemails','erroremails'));
    }

    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $programs = Program::all();
        $batches = Batch::all();
        return view('students.edit',compact('student','programs','batches'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        if($request->has('studentprofilepicture')){
            if(!empty($student->studentprofilepicture)){
                Storage::disk('public')->delete($student->studentprofilepicture);
            }
            $newfilename = uniqid().".".$request->file('studentprofilepicture')->extension();
            Storage::disk('public')->put('studentimages/'.$newfilename,$request->file('studentprofilepicture')->get());
            $studentprofilepicture = 'studentimages/'.$newfilename;
        }
        $student->update([
            'program_id' => $request->programid,
            'batch_id' => $request->batchid,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'campus' => $request->campus,
            'guardianname' => $request->guardianname,
            'dob' => $request->dob,
            'emergencyphone1' => $request->emergencyphone1,
            'emergencyphone2' => $request->emergencyphone2,
            'schoolemergencyphone' => $request->schoolemergencyphone,
            'studentprofilepicture' => empty($studentprofilepicture) ? "" : $studentprofilepicture,
            'dateofissue' => $request->dateofissue,
        ]);
        
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Storage::disk('public')->delete($student->studentprofilepicture);
        $student->delete();
        return redirect()->route('students.index');
    }
}
