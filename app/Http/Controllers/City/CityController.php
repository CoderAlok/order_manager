<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use \App\Models\City as Cities;

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
            $city->name = 'Papum Pare';
            $city->state_id = '1';
            $city->created_by = '1';
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
}
