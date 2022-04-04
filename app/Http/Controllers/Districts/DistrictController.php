<?php

namespace App\Http\Controllers\Districts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\District as Districts;
use \App\Mail\Mails\SendDistrictNotification as SDN;
use Illuminate\Support\Facades\Mail;

class DistrictController extends Controller
{
    public function index()
    {
        try {
            // return ['status' => true, 'message' => 'Districts Loaded Successfully.', 'data' => Districts::all()];
            return view('Districts.index');
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function fetch_districts(){
        try{
            return ['status' => true, 'message' => 'Districts Loaded Successfully.', 'data' => Districts::all()];
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function add()
    {
        try {
            $district = new Districts;
            $district->name = 'Papum Pare';
            $district->state_id = '1';
            $district->created_by = '1';
            $district->save();

            return ['status' => true, 'message' => 'District added successfully.', 'last_inserted_id' => $district->id];
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

            $district = new Districts;
            $district->where('district_id', '1');
            $district->update($upd_data);

            return ['status' => true, 'message' => 'District updated successfully.'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            Districts::where('district_id', '1')->delete();
            return ['status' => true, 'message' => 'District deleted successfully'];
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function send_admission_notification(){
        try{
            $to = 'alokdas4all@gmail.com';
            Mail::to($to)->send(new SDN);
            echo 'Send Email Notification..';
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }


    public function template(){
        return view('Mails.Default-mail-template');
    }

}
