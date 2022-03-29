<?php

namespace App\Http\Controllers\States;

use App\Http\Controllers\Controller;
use \App\Models\State as States;

class StateController extends Controller
{
    //
    public function index()
    {
        try {
            return ['status'=>true, 'message'=>'States Loaded Successfully.', 'data'=>States::all()];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $state = new States;
            $state->name = 'Arunachal Pradesh';
            $state->created_by = '1';
            $state->save();

            return ['status' => true, 'message' => 'State added successfully.', 'last_inserted_id' => $state->id];
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

            $state = new States;
            $state->where('state_id', '1');
            $state->update($upd_data);

            return ['status' => true, 'message' => 'State updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            States::where('state_id', '2')->delete();
            return ['status'=>true, 'message'=>'State deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

}
