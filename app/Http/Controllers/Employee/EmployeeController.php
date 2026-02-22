<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class EmployeeController extends Controller
{

    public function dashboard()
    {
        return view('page.admin.mainDashboard');
    }

    public function map()
    {
        $user = Auth::user();
        $reports = Report::where('department_id', $user->department_id)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();
        return view('page.admin.map', compact('reports'));
    }

    public function message()
    {
        return view('page.admin.message');
    }

    public function reports()
    {
        return view('page.admin.reportsManagement');
    }

    public function tracker()
    {
        return view('page.admin.IssueTracker');
    }
}
