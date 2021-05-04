<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Users extends Controller
{
    public function store(request $request)
    {
        $b_name = $request->input('business_name');
        $f_name = $request->input('first_name');
        $l_name = $request->input('last_name');
        $c_number = $request->input('contact_number');
        $s_date = $request->input('start_date');
        $b_add = $request->input('business_add');
        $coun = $request->input('country');
        $stat = $request->input('state');
        $city = $request->input('city');
        $zcode = $request->input('zipcode');
        $b_email = $request->input('email');
        $password = $request->input('pass');

        $data = DB::table('customer')
        ->insert([
            'b_name'=> $b_name,
            'f_name'=> $f_name,
            'l_name'=> $l_name,
            'c_number'=> $c_number,
            's_date'=> $s_date,
            'b_add'=>  $b_add,
            'country'=> $coun,
            'state'=> $stat,
            'city'=> $city,
            'z_code'=> $zcode,
            'email'=> $b_email,
            'password'=> $password

        ]);

        
        
    }

    public function logs(request $request){

        $b_email = $request->input('email');
        $password = $request->input('password');

        $data = DB::table('customer')
        ->select('customer.id')
        ->where('customer.email',$b_email)
        ->where('customer.password',$password)
        ->get();

        if(count($data))
        {
            return redirect('/temp');
        }
        else{
            $abc = "enter the valid Username and Passwords";
        }
    }


}
