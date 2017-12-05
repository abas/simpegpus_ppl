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
}
