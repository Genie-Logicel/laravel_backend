<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    function login() {
        return Redirect::route('liste_competence');
    }
}
