<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function ganti_user($id, $type)
    {
        $user = User::find($id);
        $user->user_type = $type;
        $user->update();
        return $user;
    }
}
