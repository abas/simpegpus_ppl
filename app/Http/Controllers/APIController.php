<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function get_user($id)
    {
        $user = User::find($id);
        return $user;
    }
}
