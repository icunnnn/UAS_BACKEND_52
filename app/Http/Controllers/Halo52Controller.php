<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Agama52;


class Halo52Controller extends Controller
{
    public function halo52()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama52::all();

        return view('welcome', ['data' => $user, 'agama' => $agama]);
    }


}
