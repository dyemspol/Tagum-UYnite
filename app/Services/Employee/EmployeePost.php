<?php


namespace App\Services\Employee;


use Illuminate\Support\Facades\Log;
use App\Models\Report;
use Exception;

class EmployeePost
{
    public function takedown($takedownReportId)
    {
        try {
            $report = Report::find($takedownReportId);
            $report->post_status = 'removed';
            $report->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
    public function resolved($resolvedReportId)
    {
        try {
            $report = Report::find($resolvedReportId);
            $report->report_status = 'resolved';
            $report->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
