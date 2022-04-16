<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function dashboard() {
        return view('backend.pages.dashboard');
    }
}
