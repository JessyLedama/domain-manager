<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\SiteAvailable;
use App\Models\SiteService;

class HomeController extends Controller
{
    // load home page. if user is not logged in, redirect to welcome page (this is handled in middleware).
    public function index()
    {
        $domains = Domain::all();
        $sites = SiteAvailable::all();
        $services = SiteService::all();
        $count = count($domains);

        return view('dashboard', compact('domains', 'count', 'sites', 'services'));
    }
}
