<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getDashboard() {
        return view('dashboard');
    }

    public function getProfile() {
        return View('profile');
    }

    public function getAdminProfile() {
        return View('admin/profile');
    }

    public function getUserList() {
        return view('admin/user-list');
    }




}
