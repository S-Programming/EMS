<?php

namespace App\Http\Controllers;

use App\Http\Enums\ProjectStatus;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Services\ProjectService;

use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->middleware('auth');
        $this->projectService = $projectService;
    }
    /**
     * Display all projects list with project Managers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function projectList(Request $request)
    {
//        dd($request->all());
//        $projects = $this->projectService->getProjects();
//        $projects = $this->projectService->getProjects(['project_status'=>ProjectStatus::WORKING_PROJECT,'project_manager_id'=>4]);
//        dd($projects);
//        $user_id = $this->getAuthUserId(); //,'user_id'=>$user_id
        $filter = $request->filter_project;
        if(isset($filter) && !empty($filter))
        {
            return $this->sendJsonResponse($this->projectService->projectList(Request $request,$filter));
        }
        $projects = $this->projectService->getProjects();
        return view('pages.admin.projects.projects',['projects'=>$projects,'html_section_id' => 'project-list-section']);

    }
    /**
     * Display popup to add project By Admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addProjectModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->addProjectModal($request));
    }
    /**
     * Click Add to add project in the project list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmAddProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|min:3|string',
            'project_description' => 'required|min:3',
            'project_manager_id' => 'required',
            'technology_stack_id' => 'required|array|min:1',
            'technology_stack_id.*' => 'required|distinct',
            'project_document' => 'required|max:10000|mimes:pdf,docx',
        ]);
        if ($validator->fails()) {
            return $this->error('Validation Failed', ['errors' => $validator->errors()]);
        }
        return $this->sendJsonResponse($this->projectService->confirmAddProject($request));
    }
    /**
     * Display popup to edit Project Attributes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProjectModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->editProjectModal($request));
    }
    /**
     * Click Update Button to edit Project Attributes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmEditProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|min:3|max:30',
            'project_description' => 'required|min:3|max:500',
            'project_manager_id' => 'required|numeric',
            'technology_stack_id.*' => 'required|distinct|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return $this->error('Validation Failed', ['errors' => $validator->errors()]);
        }
        return $this->sendJsonResponse($this->projectService->confirmEditProjectModal($request));
    }
    /**
     * Display popup to view the Project with detail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewProjectModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->viewProjectModal($request));
    }
    /**
     * Display Popup to delete Project form DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProjectModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->deleteProjectModal($request));
    }
    /**
     * Click Delete button to delete project from DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDeleteProjectModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->confirmDeleteProjectModal($request));
    }
    /**
     * Working Projects List of Project Manager.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function workingProjectsList(Request $request)
    {
        dd($request->all());
        return $this->sendJsonResponse($this->projectService->workingProjectsList($request));
    }
    /**
     * Display popup for working project status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function workingProjectStatusModal(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->workingProjectStatusModal($request));
    }
    /**
     * Click update for working project status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmWorkingProjectStatus(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->confirmWorkingProjectStatus($request));
    }

    /**
     * Completed Projects List of Project Manager.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completedProjectsList(Request $request)
    {
        return $this->sendJsonResponse($this->projectService->completedProjectsList($request));
    }
    /**
     * Display view for working project list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function workingProjectList(Request $request)
//    {
//        $projects = Project::with('users')->where('project_status',ProjectStatus::WORKING_PROJECT)->with('technologystack')->orderBy('created_at','DESC')->get();
//        return view('pages.engagementManager.woking_projects_list',['projects'=>$projects]);
//    }
}
