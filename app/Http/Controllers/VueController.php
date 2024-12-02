<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class VueController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
