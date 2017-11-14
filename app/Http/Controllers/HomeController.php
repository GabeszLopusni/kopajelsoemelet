<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function editProfile(Request $request)
     {
       $data = User::find($request['userId']);
       $data->email = $request['email'];
       $data->date_of_birth = $request['birth'];
       $data->country = $request['country'];
       $data->update();

       return response()->json(['message' => 'Post edited'], 200);
     }
}
