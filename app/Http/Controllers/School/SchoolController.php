<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\School as Schools;

class SchoolController extends Controller
{
    public function index()
    {
        try {
            return ['status' => true, 'message' => 'Schools Loaded Successfully.', 'data' => Schools::all()];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $school = new Schools;
            $school->code = '1';
            $school->name = 'MVM School';
            $school->address1 = 'village ; jeoldanga';
            $school->address2 = '';
            $school->city_id = '1';
            $school->district_id = '1';
            $school->state_id = '1';
            $school->country_id = '1';
            $school->created_by = '1';
            $school->save();

            return ['status' => true, 'message' => 'School added successfully.', 'last_inserted_id' => $school->id];
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

            $school = new Schools;
            $school->where('school_id', '1');
            $school->update($upd_data);

            return ['status' => true, 'message' => 'School updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            Schools::where('school_id', '1')->delete();
            return ['status' => true, 'message' => 'School deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

}
