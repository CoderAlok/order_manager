<?php

namespace App\Http\Controllers\Tester;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use tbl_user1;

class TesterController extends Controller
{
    //Users functions
    public function userlist()
    {
        try {
            return response(tbl_user1::get(), 200);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    // Roles function
    public function roleslist()
    {
        try {
            echo 'Roles list';
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    // Menu Functions
    public function menulist()
    {
        try {
            echo 'menu list';
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    // Assigned menus
    public function assigned_menu_list()
    {
        try {
            echo 'Assigned menu list';
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    // assign_menu
    public function assign_menu()
    {
        try {
            return view('menu.assign_menu');
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function get__user1(Request $request)
    {
        try {
            $username = 'alok89';
            $type = ($request->input('type') == 5 ? 0 : 1);

            $upd_data = [
                'email' => 'rolebased@gmail.com',
                'phone' => '8451222000',
                'updated_at' => NOW(),
            ];

            $ins_data = [
                'username' => 'ashok89',
                'password' => '123456',
                'name' => 'Ashok Das',
                'email' => 'ashok@gmail.com',
                'phone' => '88995566223',
                'created_by' => Auth::user()->id,
            ];

            // Gets user data
            $tbl_user1 = tbl_user1::where('username', $username)->get();

            if ($tbl_user1->isEmpty()) {
                $data = tbl_user1::insertGetId($ins_data);
                return response(['status' => 201, 'msg' => 'user created successfully.'], 201);
            } else {

                $id = tbl_user1::select('id')->where(['username' => $username, 'role_based' => $type])->first();
                $b = tbl_user1::updateOrCreate(
                    ['id' => $id->id, 'username' => $username, 'role_based' => $type],
                    // ['phone' => '8967770232', 'updated_at' => NOW()]
                    $upd_data
                );
                // return response(['data'=>$tbl_user1, 'kk'=>$tbl_user1->isEmpty()], 200);
                return response(['elsepart' => $b], 200);
            }

        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function get___user1(Request $request)
    {
        try {
            $id = $request->input('id');
            $access_type = $request->input('access_type');

            $_where = [
                'id' => $id,
                'role_based' => $access_type,
            ];
            $data = tbl_user1::where($_where)->first();
            return response(['access_type' => $access_type, 'data' => $data], 200);
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function check_role(Request $request){
        try{
            return response([$request->input('option')], 200);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

}
