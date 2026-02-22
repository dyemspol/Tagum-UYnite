<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('page.admin.mainDashboard');
    }

    public function dashboard()
    {
        return view('page.admin.mainDashboard');
    }

    public function accountReview()
    {
        return view('page.super_admin.accountReview');
    }

    public function staffAccounts()
    {
        return view('page.super_admin.staffAccounts');
    }
}
