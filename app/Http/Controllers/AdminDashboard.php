<?php

namespace App\Http\Controllers;

class AdminDashboard extends Controller
{
    public function __invoke()
    {
        abort_unless(auth()->user()?->is_admin, 403);
        return view('admin.dashboard', [
            'user' => auth()->user(),
        ]);
    }
}