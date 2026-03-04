<?php

namespace App\Livewire\Employee;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Repartsmanagement extends Component
{
    public $reports;
    public $totalReports;
    public $totalPending;
    public $totalResolved;
    public $totalOngoing;
    public function render()
    {
        return view('livewire.employee.repartsmanagement');
    }
    public function mount()
    {
        $this->loadReports();
        $this->loadKPI();
    }
    public function filterReports($status)
    {
        $user = Auth::user();
        if ($status == 'all') {
            $this->loadReports();
        } else {
            $this->reports = Report::with('user')->where('department_id', $user->department_id)->where('report_status', $status)->limit(10)->orderBy('created_at', 'asc')->get();
        }
    }
    public function loadReports()
    {
        $user = Auth::user();
        $this->reports = Report::with('user')->where('department_id', $user->department_id)->limit(10)->orderBy('created_at', 'asc')->get();
    }
    public function loadKPI()
    {
        $user = Auth::user();
        $this->totalReports = Report::where('department_id', $user->department_id)->count();
        $this->totalPending = Report::where('department_id', $user->department_id)->where('report_status', 'pending')->count();
        $this->totalResolved = Report::where('department_id', $user->department_id)->where('report_status', 'resolved')->count();
        $this->totalOngoing = Report::where('department_id', $user->department_id)->where('report_status', 'in_review')->count();
    }
}
