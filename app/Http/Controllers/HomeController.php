<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $company = Auth::user()->company;
        $jobs = $company->jobs;
        return view('home', ['company' => $company, 'jobs' => $jobs]);
    }
}
