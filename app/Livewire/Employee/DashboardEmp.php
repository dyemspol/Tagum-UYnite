<?php

namespace App\Livewire\Employee;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardEmp extends Component
{
    public $newReports;
    public $activeIssues;
    public $resolvedWeek;
    public $newReportsPercentage;
    public $criticalIssues;
    public function render()
    {
        return view('livewire.employee.dashboard-emp');
    }
    public function mount()
    {
        $this->loadKPI();
    }
    public function loadKPI()
    {
        $this->newReports = Report::with('user')
            ->where('department_id', Auth::user()->department_id)
            ->where('report_status', '!=', 'resolved')
            ->where('post_status', '!=', 'removed')
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->get();

        $todayCount = $this->newReports->count();
        $yesterdayCount = Report::where('department_id', Auth::user()->department_id)
            ->where('report_status', '!=', 'resolved')
            ->where('post_status', '!=', 'removed')
            ->whereBetween('created_at', [Carbon::now()->subDays(2), Carbon::now()->subDay()])
            ->count();

        $this->newReportsPercentage = $yesterdayCount > 0
            ? (($todayCount - $yesterdayCount) / $yesterdayCount) * 100
            : ($todayCount > 0 ? 100 : 0);

        $this->activeIssues = Report::with('user')
            ->where('department_id', Auth::user()->department_id)
            ->where('report_status', 'pending')
            ->where('post_status', '!=', 'removed')
            ->get();
        $this->resolvedWeek = Report::with('user')
            ->where('department_id', Auth::user()->department_id)
            ->where('report_status', 'resolved')
            ->where('updated_at', '>=', Carbon::now()->subWeek())
            ->get();
        $this->criticalIssues = Report::with('user')
            ->where('department_id', Auth::user()->department_id)
            ->where('report_status', 'pending')
            ->where('post_status', '!=', 'removed')
            ->where('priority_level', 'high')
            ->get();
    }
}
