<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user && method_exists($user, 'hasRole')) {
            if ($user->hasRole('super-admin') && Route::has('admin.dashboard')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('it-staff') && Route::has('it-staff.dashboard')) {
                return redirect()->route('it-staff.dashboard');
            } elseif ($user->hasRole('student') && Route::has('student.dashboard')) {
                return redirect()->route('student.dashboard');
            }
        }
        
        return view('dashboard');
    }
}
