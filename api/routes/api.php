<?php

use App\Http\Controllers\Project\ProjectController;
use App\Services\Access\AccessProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(static function() {
    $accessProjectServiceClass = AccessProjectService::class;

    Route::get('/user', static fn (Request $request) => $request->user());
    Route::middleware(["checkAccess:{$accessProjectServiceClass},project,test3"])->get('/project/{project}', function (Request $request) {
        return $request->user();
    });

    Route::prefix('projects')->group(function () {
        Route::post('/', [ProjectController::class, 'store']);
    });
});




