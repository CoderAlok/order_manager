<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use tbl_user1 as Users;

class UserController extends Controller
{
    //
    public function __construct()
    {}

    function list() {
        try {
            $users = Users::get();
            return response(['data' => $users], 200);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function add(Request $request)
    {
        try {
            // $validateData = $request->validate([
            //     'username' => 'required|max:20|min:5',
            //     'password' => 'required',
            //     'name' => 'required|min:10|max:30',
            //     'email' => 'required|email',
            //     'phone' => 'required',
            //     'role_based' => 'required',
            //     'created_by' => 'required',
            // ]);

            // if($validateData){
            // return response($request->all(), 201);
            // }
            // else{
            //     return response(['Errr'], 201);
            // }

            $users = new Users();
            $users->username = "alok98";
            $users->password = "123456789";
            $users->name = "Alok Das";
            $users->email = "alok77@mail.co.in";
            $users->phone = "8671025656";
            $users->role_based = 1;
            $users->created_by = 1;
            $users->save();

            $response_array = [
                'status' => true,
                'message' => 'User added successfully.',
                'last_inserted_id' => $users->id,
            ];

            return response($response_array, 201);

        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        try {

            $update_data = [
                "name" => "Jaiprakash",
            ];

            Users::where('id', $request->id)->update($update_data);
            return response(['status' => true, 'message' => 'User updated successfully.'], 200);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete(Request $request)
    {
        try {
            Users::where('id', $request->id)->delete();
            return response(['status' => true, 'message' => 'User deleted successfully.'], 200);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }
}
