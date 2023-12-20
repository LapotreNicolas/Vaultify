<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(Request $requete, $id)
    {
        $user = User::find($id);
        $finies = $user->terminees;
        $creees = Histoire::where('user_id', $id);
        return view('users.showUser', [ 'user' => $user, 'finies' => $finies, 'creees' => $creees]);
    }
}
