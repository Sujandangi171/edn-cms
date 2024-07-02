<?php

namespace App\Http\Controllers\System\Dashboard;

use App\Http\Controllers\ResourceController;
use App\Services\System\Dashboard\DashboardService;

class DashboardController extends ResourceController
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->service = $dashboardService;
    }

    public function moduleName()
    {
        return 'dashboards';
    }

    public function folderName()
    {
        return 'dashboard';
    }
}
