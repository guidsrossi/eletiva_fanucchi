<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'user' => Auth::user(),
        ]);
    }
}