<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // Show the login view
    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated(); // Validate the incoming request
        if (auth()->attempt($data)) {
            $user = auth()->user();
            // Flash success message to session
            Flasher::addSuccess('You have successfully logged in.');
            if ($user->role === 'admin') {
                return view('admin.dashboard');
            }
            else{
                return view('tickets');
            }
        } else {
            Flasher::addError('Email or Password is Incorrect');
            /*return redirect()->back()->withErrors([
                'error' => 'Email or password is incorrect.'
            ]);*/
        }
    }
}
