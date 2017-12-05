<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function ganti_user(Request $request, $id, $type)
    {
        $user = User::find($id);
        $user->user_type = $request->$type;
        $user->update();
        return $user;
    }
}
