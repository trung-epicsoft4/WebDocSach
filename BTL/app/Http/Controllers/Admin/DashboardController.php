<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        return view('admin.home');
    }
}

