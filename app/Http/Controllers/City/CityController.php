<?php
declare (strict_types = 1);

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use \App\Models\City as Cities;
use Auth;

class CityController extends Controller
{
    public function index()
    {
        try {
            return ['status' => true, 'message' => 'City Loaded Successfully.', 'data' => Cities::all()];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $city = new Cities;
            $city->name = 'Digha';
            $city->state_id = '2';
            $city->created_by = Auth::user()->id;
            $city->save();

            return ['status' => true, 'message' => 'City added successfully.', 'last_inserted_id' => $city->id];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function edit()
    {
        try {
            $upd_data = [
                'name' => 'Itanager',
                'updated_by' => 1,
            ];

            $district = new Districts;
            $district->where('city_id', '1');
            $district->update($upd_data);

            return ['status' => true, 'message' => 'City updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            Districts::where('city_id', '1')->delete();
            return ['status' => true, 'message' => 'City deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function getDetails()
    {
        try {
            return Cities::get()->toArray();
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function checkPhp()
    {
        try {
            pr($arr);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function getAge(int $age)
    {
        echo $age;
    }
}
