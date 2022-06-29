<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function __invoke()
    {
        return view('tenantDashboard');
    }
}
