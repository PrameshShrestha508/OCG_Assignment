<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use DB;
use App\Http\Requests\StudentFormRequest;
class StudentController extends Controller
{
    public function index(){
        $students=Student::orderBY('dob','ASC')->get();
        $filterType = 'all';
        return view('students/student',compact("students",'filterType'));
    }
    public function create(){
        return view('students/studentcreate');
    }
    public function store(StudentFormRequest $request){

        // dd($request->all());
        $validatedData= $request->validated();
        $student=new Student;
        $student->name=$validatedData['name'];
        $student->email=$validatedData['email'];
        $student->address=$validatedData['address'];
        $student->dob=$validatedData['dob'];
        $student->save();

        return redirect('student')->with('message','Student Added Sucessfully');
    }

    public function destroy($id){
        $student= Student::where('id',$id)->first();
        $student->delete();
  
        return redirect('student')->with('message','Student Deleted Sucessfully');
    }

    
    public function filter(Request $request){
        $filterType = $request->input('status');
        $currentDate = Carbon::now();

        if ($filterType === 'upcoming') {
            // Users with upcoming birthdays (beyond 7 days)
            $students = Student::whereMonth('dob', '>', $currentDate->month)
                ->orWhere(function ($query) use ($currentDate) {
                    $query->whereMonth('dob', '=', $currentDate->month)
                        ->whereDay('dob', '>=', $currentDate->day);
                })
                ->get();
        } elseif ($filterType === 'upcoming_within_7_days') {
            // Users with upcoming birthdays within 7 days
            $students = Student::whereRaw('DAYOFYEAR(dob) >= DAYOFYEAR(CURRENT_DATE)')
            ->whereRaw('DAYOFYEAR(dob) <= DAYOFYEAR(DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY))')
            ->get();

        } elseif ($filterType === 'finished_last_7_days') {
            // Users with birthdays that occurred within the last 7 days
            $students = Student::whereRaw('DAYOFYEAR(dob) >= DAYOFYEAR(DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY))')
            ->whereRaw('DAYOFYEAR(dob) < DAYOFYEAR(CURRENT_DATE)')
            ->get();
        } else {
            // Invalid filter type, return all users
            $students = Student::all();
        }
    
        return view('students/student', compact('students','filterType'));
    }
    

    
}
