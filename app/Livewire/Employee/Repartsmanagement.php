<?php

namespace App\Livewire\Employee;

use App\Models\Report;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Repartsmanagement extends Component
{
    public $reports;
    public $totalReports;
    public $totalPending;
    public $totalResolved;
    public $totalOngoing;
    public $statusFilter = 'all';
    public $selectedReport = null;
    public $staffComment = '';
    public $statusUpdate = '';
    public $takedownReason = '';
    public $departments = [];
    public $passToDepId = '';
    public $passReason = '';

    public function render()
    {
        return view('livewire.employee.repartsmanagement');
    }
    public function mount()
    {
        $this->loadReports();
        $this->loadKPI();
        $this->loadDepartments();
    }

    public function loadDepartments()
    {
        $user = Auth::user();
        $this->departments = Department::where('id', '!=', $user->department_id)->get();
    }
    public function filterReports($status)
    {
        $this->statusFilter = $status;
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

    public function viewReport($id)
    {
        $this->selectedReport = Report::with(['user', 'comments.user', 'postImages', 'barangay'])->find($id);
        $this->statusUpdate = $this->selectedReport->report_status;
    }

    public function closeIssue()
    {
        $this->selectedReport = null;
        $this->staffComment = '';
        $this->passToDepId = '';
        $this->passReason = '';
    }

    public function passIssue()
    {
        $this->validate([
            'passToDepId' => 'required|exists:departments,id',
            'passReason'  => 'required|string|max:500',
        ], [
            'passToDepId.required' => 'Please select a department to pass this issue to.',
            'passReason.required'  => 'Please provide a reason for passing this issue.',
        ]);

        $this->selectedReport->update([
            'department_id' => $this->passToDepId,
        ]);

        // Log a comment about the pass action
        \App\Models\Comment::create([
            'report_id'    => $this->selectedReport->id,
            'user_id'      => Auth::id(),
            'comment_text' => '[Passed to Department] ' . $this->passReason,
        ]);

        $this->selectedReport = null;
        $this->passToDepId = '';
        $this->passReason = '';
        $this->loadReports();
        $this->loadKPI();
        session()->flash('success', 'Issue has been passed to the selected department successfully.');
    }

    public function addStaffComment()
    {
        $this->validate([
            'staffComment' => 'required|string|max:1000',
        ]);

        \App\Models\Comment::create([
            'report_id' => $this->selectedReport->id,
            'user_id' => Auth::id(),
            'comment_text' => $this->staffComment,
        ]);

        $this->staffComment = '';
        $this->viewReport($this->selectedReport->id);
        session()->flash('success', 'Comment added successfully.');
    }

    public function updateStatus()
    {
        $this->selectedReport->update([
            'report_status' => $this->statusUpdate
        ]);

        $this->loadReports();
        $this->loadKPI();
        session()->flash('success', 'Status updated successfully.');
    }

    public function takedown($id, \App\Services\Employee\EmployeePost $EmployeePost)
    {
        if ($EmployeePost->takedown($id, $this->takedownReason)) {
            $this->selectedReport = null;
            $this->takedownReason = '';
            $this->loadReports();
            $this->loadKPI();
            session()->flash('success', 'Report taken down successfully.');
        } else {
            session()->flash('error', 'Failed to take down report.');
        }
    }
}
