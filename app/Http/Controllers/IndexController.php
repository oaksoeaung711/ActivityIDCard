<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function print($memberid)
    {
        $student = Student::with('program')->where('member_id',$memberid)->first();
        return view('students.print',compact('student'));
    }
}
