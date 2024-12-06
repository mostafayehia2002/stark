<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected  DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(){

       $data= $this->dashboardService->getDashboardData();
        return view('dashboard.home', $data);
    }
}
