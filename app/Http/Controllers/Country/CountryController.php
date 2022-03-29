<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use \App\Models\Country as Countries;

class CountryController extends Controller
{
    public function index()
    {
        try {
            return ['status' => true, 'message' => 'Country Loaded Successfully.', 'data' => Countries::all()];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $country = new Countries;
            $country->name = 'Austria';
            $country->created_by = '1';
            $country->save();

            return ['status' => true, 'message' => 'Country added successfully.', 'last_inserted_id' => $country->id];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function edit()
    {
        try {
            $upd_data = [
                'name' => 'Armenia',
                'updated_by' => 1,
            ];

            $country = new Countries;
            $country->where('country_id', '1');
            $country->update($upd_data);

            return ['status' => true, 'message' => 'Country updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            Countries::where('country_id', '1')->delete();
            return ['status' => true, 'message' => 'Country deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

}
