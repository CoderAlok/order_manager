<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Student as Students;

class StudentController extends Controller
{
    public function index()
    {
        try {
            return ['status' => true, 'message' => 'Students Loaded Successfully.', 'data' => Students::all()];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $student = new Students;
            $student->code = '89889';
            $student->name = 'Abhinav Kumar';
            $student->father_name = 'Shyam Kumar';
            $student->mother_name = 'Rama Ray';
            $student->school_id = '21';
            $student->from_school_id = '2';
            $student->dob = date('Y-m-d', strtotime('15-06-2002'));
            $student->doj = date('Y-m-d', strtotime('15-05-2021'));
            $student->address = 'some adrese';
            $student->city_id = '1';
            $student->state_id = '1';
            $student->district_id = '1';
            $student->country_id = '1';
            $student->status = '0';
            $student->created_by = '1';
            $student->save();

            return ['status' => true, 'message' => 'student added successfully.', 'last_inserted_id' => $student->id];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function edit()
    {
        try {
            $upd_data = [
                'name' => 'Arunachal Pradesh',
                'updated_by' => 1,
            ];

            $student = new Students;
            $student->where('student_id', '1');
            $student->update($upd_data);

            return ['status' => true, 'message' => 'Student updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            Students::where('student_id', '1')->delete();
            return ['status' => true, 'message' => 'Student deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

}
