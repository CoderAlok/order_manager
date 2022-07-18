<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * @param State data
     * @return true/false
     */
    public function create(Request $request)
    {
        try {
            return response(['daa' => 'sasa'], 200);
        } catch (\Exception$error) {
            $data['message'] = 'Internal server error!';
            $data['error'] = $error->getMessage();
            return response($data, 500);
        }
    }

    /**
     * @param Takes an id
     * @return state list
     */
    function list(Request $request) {
        try {
            return response(['list' => 'assas'], 200);
        } catch (\Exception$error) {
            $data['message'] = 'Internal server error!';
            $data['error'] = $error->getMessage();
            return response($data, 500);
        }
    }
}
