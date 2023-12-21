<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function show(Request $requete, $id)
    {
        $user = User::find($id);
        $finies = $user->terminees()->sum("nombre");
        $creees = Histoire::where('user_id', $id);
        return view('users.showUser', [ 'user' => $user, 'finies' => $finies, 'creees' => $creees]);
    }

    function profil()
    {
        $histoires = Histoire::all()->where('user_id', Auth::id())->sortBy('active');
        return view('profil', ['histoires' => $histoires]);
    }
}
