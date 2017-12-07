<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function get_user()
    {
        $user = User::All();
        return $user; 
    }

    public function get_user_info($id)
    {
        $user = User::find($id);
        return $user; 
    }

    public function isAdmin($id)
    {
        $user = array('isAdmin'=>"false");
        if(User::find($id)->user_type == 'admin'){
            $user['isAdmin']="true";
        }
        return $user;
    }
}
