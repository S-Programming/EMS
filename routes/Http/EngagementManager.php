<?php

namespace Route\Http;

use App\Http\Controllers\EngagementManagerController;
use \Illuminate\Support\Facades\Route;

class EngagementManager
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::post('/assign/developers/modal', [EngagementManagerController::class, 'assignProjectDevelopersModal'])->name('assign.project.developers.modal');
            Route::post('/confirm/assign/developers', [EngagementManagerController::class, 'confirmAssignProjectDevelopers'])->name('assign.confirm.project.developers');
            Route::get('/working/project/list', [EngagementManagerController::class, 'workingProjectList'])->name('engagement.manager.working.project.list');
        });

    }
}
