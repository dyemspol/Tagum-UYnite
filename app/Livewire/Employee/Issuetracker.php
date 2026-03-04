<?php

namespace App\Livewire\Employee;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Services\Employee\EmployeePost;
use Illuminate\Support\Facades\Log;

class Issuetracker extends Component
{
    public $high = [];
    public $medium = [];
    public $low = [];
    public $categories;
    public $selectedReport = null;
    public function mount()
    {
        $this->LOADREPORTS();
        $this->getCategory();
    }
    public function render()
    {
        return view('livewire.employee.issuetracker');
    }

    public function LOADREPORTS()
    {
        $reports = Report::with('user')->where('department_id', Auth::user()->department_id)
            ->where('report_status', '!=', 'resolved')
            ->where('post_status', '!=', 'removed')
            ->get();
        $this->high = $reports->where('priority_level', 'high')->values();
        $this->medium = $reports->where('priority_level', 'medium')->values();
        $this->low = $reports->where('priority_level', 'low')->values();
    }
    public function getCategory()
    {
        $dept = Department::find(Auth::user()->department_id);
        if ($dept && $dept->category) {
            $this->categories = explode(' ', $dept->category)[0];
        }
    }

    public function updatePriority($reportId, $newPriority)
    {
        $report = Report::find($reportId);
        Log::info($report);
        if ($report && $report->department_id == Auth::user()->department_id) {
            $report->priority_level = $newPriority;
            $report->save();
            $this->LOADREPORTS();
            $this->getCategory();
        }
    }
    public function viewIssue($reportId)
    {
        $report = Report::with('user', 'barangay', 'postImages')->find($reportId);
        $this->selectedReport = $report;
    }

    public function closeIssue()
    {
        $this->selectedReport = null;
    }
    public function takedown($takedownReportId, EmployeePost $EmployeePost)
    {
        $report = Report::find($takedownReportId);
        $takedownReport = $EmployeePost->takedown($report->id);

        if ($takedownReport) {
            $this->selectedReport = null;
            session()->flash('success', 'Report taken down successfully.');
            $this->LOADREPORTS();
        } else {
            session()->flash('error', 'Failed to take down report.');
        }
    }
    public function resolved($resolvedReportId, EmployeePost $EmployeePost)
    {
        $report = Report::find($resolvedReportId);
        $resolvedReport = $EmployeePost->resolved($report->id);
        if ($resolvedReport) {
            Log::info('Report resolved successfully');
            $this->selectedReport = null;
            session()->flash('success', 'Report resolved successfully.');
            $this->LOADREPORTS();
        } else {
            session()->flash('error', 'Failed to resolve report.');
        }
    }
}
