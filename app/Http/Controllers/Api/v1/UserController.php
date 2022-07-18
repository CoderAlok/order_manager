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
            $users = Users::orderBy('id', 'DESC')->get();

            if (count($users) > 0) {
                $response_array['status'] = true;
                $response_array['message'] = 'Users loaded successfully.';
                $response_array['data'] = $users;
                return response($response_array, 200);
            } else {
                $response_array['status'] = false;
                $response_array['message'] = 'Sorry, no users data.';
                return response($response_array, 200);
            }
        } catch (\Exception$e) {
            $response_array['status'] = false;
            $response_array['message'] = 'Internal server error.';
            $response_array['error_message'] = $e->getMessage();
            return response($response_array, 500);
        }
    }

    public function add(Request $request)
    {
        try {
            $validateData = $request->validate([
                'username' => 'required|max:20|min:5',
                'password' => 'required',
                'name' => 'required|min:10|max:30',
                'email' => 'required|email',
                'phone' => 'required',
                'role_based' => 'required',
                'created_by' => 'required',
            ]);

            if ($validateData) {
                // Check the email address exist
                $chk_user = Users::where('email', $request->email)->get();
                if (count($chk_user) == 0) {
                    $users = new Users();
                    $users->username = $request->username;
                    $users->password = $request->password;
                    $users->name = $request->name;
                    $users->email = $request->email;
                    $users->phone = $request->phone;
                    $users->role_based = $request->role_based;
                    $users->created_by = $request->created_by;
                    $users->save();

                    $response_array = [
                        'status' => true,
                        'message' => 'User added successfully.',
                        'last_inserted_id' => $users->id,
                    ];
                    return response($response_array, 201);
                } else {
                    $response_array = [
                        'status' => false,
                        'message' => 'User already exists',
                        'data' => $chk_user,
                    ];
                    return response($response_array, 200);
                }

            } else {
                $response_array = [
                    'status' => false,
                    'message' => $validator->messages()->toJson(),
                ];
                return response($response_array, );
            }

        } catch (\Exception$e) {
            $response_array = [
                'status' => false,
                'message' => 'Internal server error',
                'data' => $e->getMessage(),
            ];
            return response($response_array, 500);
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
            if (count(Users::where('id', $request->id)->get()->toArray()) > 0) {
                // Delete thot perticular user
                Users::where('id', $request->id)->delete();

                $response_array['status'] = true;
                $response_array['message'] = 'User deleted successfully.';
                return response($response_array, 200);
            } else {
                $response_array['status'] = false;
                $response_array['message'] = 'Sorry, data does not exists.';
                return response($response_array, 204);
            }

        } catch (\Exception$e) {
            $response_array['status'] = false;
            $response_array['message'] = 'Internal server error.';
            return response($response_array, 500);
        }
    }
}
