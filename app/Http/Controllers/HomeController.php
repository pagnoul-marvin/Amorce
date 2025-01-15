<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = $user?->getTasksForTheDay();
        $actual_detente = '';
        return view('home', compact('user', 'tasks', 'actual_detente'));
    }
}
