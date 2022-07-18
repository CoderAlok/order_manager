<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Models\Employee as Employees;

class EmployeeController extends Controller
{
    //
    public function __construct()
    {}

    public function index()
    {
        try {
            return view('Employees.list');
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            // echo 'Employees add form ';
            return view('Employees.create');
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add_data(Request $request)
    {
        try {
            $employee = new Employees();
            $lastId = $employee->insertGetId([
                'emp_name' => $request->name,
                'age' => $request->age,
                'gender' => $request->gender,
                'dob' => Carbon::create($request->dob),
                'doj' => Carbon::create($request->doj),
                'dept' => $request->dept,
                'city' => 1, //$request->city,
                'state' => 1, //$request->state,
                'salary' => $request->salary,
                'created_by' => Auth::user()->id,
            ]);
            return response(['status' => true, 'msg' => 'Employee added successfully.', 'last_id' => $lastId], 201);

            return redirect()->back()->withInput();
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function employeeList(Request $request)
    {
        try {
            $employee = new Employees;
            $list = $employee
                ->with('get_city')
                ->with('get_state')
                ->take($request->take)
                ->get();

            $blank_arr = [];
            foreach ($list as $key => $value) {
                $blank_arr[$key]['emp_id'] = $value->emp_id;
                $blank_arr[$key]['emp_name'] = $value->emp_name;
                $blank_arr[$key]['age'] = $value->emp_id;
                $blank_arr[$key]['gender'] = $value->emp_id;
                $blank_arr[$key]['dob'] = $value->emp_id;
                $blank_arr[$key]['doj'] = $value->emp_id;
                $blank_arr[$key]['dept'] = $value->emp_id;
                $blank_arr[$key]['city'] = $value->get_city->name ?? 'N/A';
                $blank_arr[$key]['state'] = $value->get_state->name ?? 'N/A';
                $blank_arr[$key]['salary'] = $value->salary;
            }

            $data['totalCount'] = $employee->count();
            $data['data'] = $blank_arr;

            // pr($data, true);

            return response($data);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

}
