<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user && method_exists($user, 'hasRole')) {
            if ($user->hasRole('super-admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('it-staff')) {
                return redirect()->route('it-staff.dashboard');
            } elseif ($user->hasRole('student')) {
                return redirect()->route('student.dashboard');
            }
        }
        
        return view('dashboard');
    }
}
