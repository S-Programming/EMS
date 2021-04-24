<?php


namespace App\Http\Services;


use App\Http\Services\BaseService\BaseService;
use App\Models\CheckinHistory;
use App\Models\DevelopersProject;
use App\Models\UserTaskLog;
use App\Models\GlobalSetting;
use App\Models\CheckinHistoryTag;
use App\Http\Enums\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class ReportService extends BaseService
{

    /**
     * Report Create Modal load
     *
     * @return Body
     */
    public function reportCreateModal(Request $request)
    {
        $containerId = $request->input('containerId', 'common_popup_modal');
        $userId = $this->getAuthUserId();
        $projectsData = DevelopersProject::with('Project')->where('user_id', $userId)->get();
        $projectDropdown = view('utils.projects', ['projects_data' => $projectsData])->render();
        $userLastCheckinDetails = $this->userLastCheckinDetails();
        $lastCheckinId = $userLastCheckinDetails->id ?? 0;
        $lastCheckinTime = $userLastCheckinDetails->checkin ?? 0;
        if (isset($lastCheckinTime) && !empty($lastCheckinTime)) {
            $carbonCheckinTime = Carbon::createFromDate($lastCheckinTime);
            $differenceInMinutes = $carbonCheckinTime->diffInMinutes(Carbon::now());
            $sumTime = UserTaskLog::where('user_id', $userId)->whereDate('created_at', Carbon::today())->sum('time');
            $differenceInMinutes = $differenceInMinutes - intval($sumTime);
            ## We have to subtract the logged minutes here
            $minutes = $differenceInMinutes > 0 ? ($differenceInMinutes % 60) : 0;
            $hours = $differenceInMinutes > 60 ? intval((($differenceInMinutes - $minutes) / 60)) : 0;
            $lastCheckinTime = $carbonCheckinTime->format('Y-m-d h:i:s A');
        }
        $modalData = [
            'id' => $containerId,
            'last_checkin_id' => $lastCheckinId,
            'project_dropdown' => $projectDropdown,
            'last_checkin_time' => $lastCheckinTime ?? '',
            'hours' => $hours ?? 0,
            'minutes' => $minutes ?? 0,
        ];
        $html = view('pages.report._partial._report_create_modal', $modalData)->render();
        return $this->successResponse('success', ['html' => $html]);
    }

    /**
     * Report Create
     *
     * @return Body
     */
    public function reportCreate(Request $request)
    {
        $userId = $this->getAuthUserId();
        $hours = $request->hours;
        $minutes = $request->minutes;
        $userLastCheckinDetails = $this->userLastCheckinDetails();
        $lastCheckinId = $userLastCheckinDetails->id ?? 0;
        $lastCheckinTime = $userLastCheckinDetails->checkin ?? 0;
        $carbonCheckinTime = Carbon::createFromDate($lastCheckinTime);
        $differenceInMinutes = $carbonCheckinTime->diffInMinutes(Carbon::now());
        if ($hours > 0 && $minutes >= 0) {
            $minutes = $minutes + ($hours * 60);
        }
        $sumTime = UserTaskLog::where('user_id', $userId)->whereDate('created_at', Carbon::today())->sum('time');
        $logAbleTime = $differenceInMinutes - intval($sumTime);
        if ($minutes > intval($logAbleTime)) {
            return $this->errorResponse('Your logged time exceed to actual spent time');
        }
        //        dd($minutes,$logAbleTime);
        $userTaskLogs = new UserTaskLog;
        $userTaskLogs->user_id = $this->getAuthUserId();
        $userTaskLogs->checkin_id = $request->checkin_id;
        $userTaskLogs->project_id = $request->project_id;
        $userTaskLogs->description = $request->task_details;
        $userTaskLogs->time = $minutes;
        $userTaskLogs->save();
        $userTaskLogs = UserTaskLog::where('user_id', $userId)->whereDate('created_at', Carbon::today())->get();
        $html = view('pages.report._partial._task_log_table_html', compact('userTaskLogs', $userTaskLogs))->render();
        return $this->successResponse('Report has Successfully Added', ['html' => $html, 'html_section_id' => 'task-log-table-section']);
    }

    /**
     * Report Edit Modal load
     *
     * @return Body
     */
    public function reportEditModal(Request $request)
    {
        $containerId = $request->input('containerId', 'common_popup_modal');
        $userTaskLogId = $request->id;
        $projectsData = DevelopersProject::with('Project')->where('user_id', $this->getAuthUserId())->get();
        $userLastCheckinDetails = $this->userLastCheckinDetails();
        $lastCheckinId = $userLastCheckinDetails->id ?? 0;
        $lastCheckinTime = $userLastCheckinDetails->checkin ?? 0;
        $projectDropdown = view('utils.projects', ['projects_data' => $projectsData])->render();
        $userTaskLogData = UserTaskLog::find($userTaskLogId);
        $time = $userTaskLogData->time;
        $minutes = $time > 0 ? ($time % 60) : 0;
        $hours = $time > 60 ? intval((($time - $minutes) / 60)) : 0;
        $modalData = [
            'id' => $containerId,
            'user_task_log_id' => $userTaskLogId,
            'project_dropdown' => $projectDropdown,
            'last_checkin_time' => $lastCheckinTime ?? '',
            'hours' => $hours ?? '',
            'minutes' => $minutes ?? '',
            'description' => $userTaskLogData->description
        ];
        $html = view('pages.report._partial._report_edit_modal',  $modalData)->render();
        // $html = view('pages.user._partial._edit_report_modal')->render();
        return $this->successResponse('success', ['html' => $html]);
    }

    /**
     * Report Edit
     *
     * @return Body
     */
    public function reportEdit(Request $request)
    {
        if (!isset($request) && empty($request)) { // what will be condition
            return $this->errorResponse('Leave Type Submittion Failed');
        }
        $hours = $request->hours;
        $minutes = $request->minutes;
        $userLastCheckinDetails = $this->userLastCheckinDetails();
        $lastCheckinId = $userLastCheckinDetails->id ?? 0;
        $lastCheckinTime = $userLastCheckinDetails->checkin ?? 0;
        $carbonCheckinTime = Carbon::createFromDate($lastCheckinTime);
        $differenceInMinutes = $carbonCheckinTime->diffInMinutes(Carbon::now());
        if ($hours > 0 && $minutes > 0) {
            $minutes = $minutes + ($hours * 60);
        }
        $sumTime = UserTaskLog::where('user_id', $this->getAuthUserId())->whereDate('created_at', Carbon::today())->sum('time');
        $logAbleTime = $differenceInMinutes - intval($sumTime);
        if ($minutes > intval($logAbleTime)) {
            return $this->errorResponse('Your logged time exceed to actual spent time');
        }
        if (isset($request) && !empty($request)) {
            $userTaskLogId = $request->user_task_log_id;
            $userTaskLogs = UserTaskLog::find($userTaskLogId);
            $userTaskLogs->description = $request->task_details;
            $userTaskLogs->time = $minutes;
            $userTaskLogs->save();
        }
        $userTaskLogs = UserTaskLog::where('user_id', $this->getAuthUserId())->whereDate('created_at', Carbon::today())->get();
        $html = view('pages.report._partial._task_log_table_html', compact('userTaskLogs', $userTaskLogs))->render();
        return $this->successResponse('Report has Successfully Updated', ['html' => $html, 'html_section_id' => 'task-log-table-section']);
    }

    /**
     * Report Delete Modal load
     *
     * @return Body
     */
    public function reportDeleteModal(Request $request)
    {
        $taskLogId = $request->id;
        $containerId = $request->input('containerId', 'common_popup_modal');
        $html = view('pages.report._partial._report_delete_modal', ['id' => $containerId, 'taskLogId' => $taskLogId])->render();
        return $this->successResponse('success', ['html' => $html]);
    }

    /**
     * Report Delete
     *
     * @return Body
     */
    public function reportDelete(Request $request)
    {
        $TaskLogId = $request->user_task_log_id;
        $userTaskLogs = UserTaskLog::find($TaskLogId);
        $userTaskLogs->delete();
        $userTaskLogs = UserTaskLog::where('user_id', $this->getAuthUserId())->whereDate('created_at', Carbon::today())->get();
        $html = view('pages.report._partial._task_log_table_html', compact('userTaskLogs', $userTaskLogs))->render();
        return $this->successResponse('Report has Successfully Deleted', ['html' => $html, 'html_section_id' => 'task-log-table-section']);
    }

    /**
     * Report Submit
     *
     * @return Body
     */
    public function reportSubmit(Request $request, $force = null)
    {
        $userId = $this->getAuthUserId();
        if ($userId > 0) {
            $userTaskLogs = UserTaskLog::where('user_id', $userId)->whereDate('created_at', Carbon::today())->get();
            $userTaskLogsCount = count($userTaskLogs);
            if ($userTaskLogsCount > 0) {
                $checkinHistoryData = CheckinHistory::where('user_id', $userId)->latest()->first();
                if ($checkinHistoryData != null) {
                    if (!$checkinHistoryData->checkout) {
                        if (!$force) {
                            $userLastCheckinDetails = $this->userLastCheckinDetails();
                            $lastCheckinId = $userLastCheckinDetails->id ?? 0;
                            $lastCheckinTime = $userLastCheckinDetails->checkin ?? 0;

                            //tag add code

                            $globalSetting = GlobalSetting::first();
                            $workingHours = $globalSetting->working_hours;
                            $workingHourMargin = $globalSetting->working_hour_margin;
                            $carbonCHeckinTime = Carbon::createFromDate($lastCheckinTime);
                            $differenceInMinutes = $carbonCHeckinTime->diffInMinutes(Carbon::now());
                            $workingHourInMinutes = intVal($workingHours) * 60;
                            $workingHourMarginInMinutes = intVal($workingHourMargin) * 60;
                            $differenceWorkingHourInMinutes = $workingHourInMinutes - $workingHourMarginInMinutes;
                            $checkinHistoryTag = new CheckinHistoryTag();
                            if ($differenceInMinutes < $workingHourInMinutes) {

                                $data[] = array(
                                    'tag_id'    => $tag_id = Tag::LESS_THEN,
                                    'checkin_id'   => $lastCheckinId

                                );
                                // $checkinHistoryTag->tag_id = Tag::LESS_THEN;
                                // $checkinHistoryTag->checkin_id = $lastCheckinId;
                                // $checkinHistoryTag->save();
                                if ($differenceInMinutes < $differenceWorkingHourInMinutes) {
                                    $data[] = array(
                                        'tag_id'    => $tag_id = Tag::HALF_DAY,
                                        'checkin_id'   => $lastCheckinId
                                    );
                                    // $checkinHistoryTag->tag_id = Tag::HALF_DAY;
                                    // $checkinHistoryTag->checkin_id = $lastCheckinId;
                                    // $checkinHistoryTag->save();
                                }
                               
                                dd($data);
                                $checkinHistoryTag->save($data);
                            }

                            if (isset($lastCheckinTime) && !empty($lastCheckinTime)) {
                                $carbonCheckinTime = Carbon::createFromDate($lastCheckinTime);
                                $differenceInMinutes = $carbonCheckinTime->diffInMinutes(Carbon::now());
                                $sumTime = UserTaskLog::where('user_id', $userId)->whereDate('created_at', Carbon::today())->sum('time');
                                $remainingDifferenceInMinutes = $differenceInMinutes - intval($sumTime);
                                ## We have to subtract the logged minutes here
                                $minutes = $differenceInMinutes > 0 ? ($differenceInMinutes % 60) : 0;
                                $hours = $differenceInMinutes > 60 ? intval((($differenceInMinutes - $minutes) / 60)) : 0;
                                $totalTime = $hours . 'h' . ' ' . $minutes . 'm' ?? 0;
                                Session::put('total_work_time', $totalTime);
                                if ($remainingDifferenceInMinutes > 30) {
                                    $containerId = $request->input('containerId', 'common_popup_modal');
                                    $html = view('pages.user._partial._confirmation_checkout_modal', ['id' => $containerId])->render();

                                    return $this->successResponse('success', ['html' => $html, 'show_modal' => 1, 'modal_id' => 'common_popup_modal']);
                                }
                            }
                        }
                        $checkinHistoryData->checkout = Carbon::now();
                        $checkinHistoryData->do_tomorrow = $request->do_tomorrow ?? '';
                        $checkinHistoryData->questions = $request->questions ?? '';
                        $checkinHistoryData->is_submit_report = 1;
                        $checkinHistoryData->save();
                        $html = view('pages.user._partial._checkin_html')->render();
                        return $this->successResponse('You are successfully checked-out', ['html' => $html, 'html_section_id' => 'checkin-section', 'html_history_section_id' => 'checkin-history-section']);
                    }
                }
            } else {
                return $this->errorResponse('You are not add today task log');
            }
            return $this->errorResponse('Something went wrong, please contact support team, thanks', ['errors' => ['Something went wrong, please contact support team, thanks'], 'html' => $html ?? '']);
        }
    }

    /**
     * Report Today Modal load and Task log data show 
     *
     * @return Body
     */
    public function reportTodayModal(Request $request)
    {
        $checkinId = $request->id;
        $userTaskLogs = UserTaskLog::where('checkin_id', $checkinId)->get();
        $containerId = $request->input('containerId', 'common_popup_modal');
        $html = view('pages.report._partial._report_today_modal', ['id' => $containerId, 'userTaskLogs' => $userTaskLogs, 'html_section_id' => 'task-log-table-section'])->render();
        return $this->successResponse('success', ['html' => $html]);
    }
}
