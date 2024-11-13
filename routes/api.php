<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PushNotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCampusController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\MessageCategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\IncidentStatusController;
use App\Http\Controllers\IncidentFileController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\AccessRightController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\IncidentTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentMemberController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuRoleController;
// use App\Http\Controllers\NotificationController;
use App\Services\FCMService;
use App\Http\Controllers\Auth\GoogleController;





// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::group(['prefix' => 'v1/publicSafety', 'namespace' => 'App\Http\Controllers', 'middleware' => ['auth:sanctum']], function () {
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('campuses', CampusController::class);
    Route::apiResource('messageCategories', MessageCategoryController::class);
    Route::apiResource('userCampuses', UserCampusController::class);
    Route::apiResource('buildings', BuildingController::class);
    Route::apiResource('messages', MessageController::class);
    Route::apiResource('incidentFiles', IncidentFileController::class);
    Route::apiResource('incidentStatuses', IncidentStatusController::class);
    Route::apiResource('incidentReports', IncidentReportController::class);
    Route::apiResource('userStatuses', UserStatusController::class);
    Route::apiResource('accessRights', AccessRightController::class);
    Route::apiResource('recipients', RecipientController::class);
    Route::apiResource('incidentTypes', IncidentTypeController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('departmentMembers', DepartmentMemberController::class);
    Route::apiResource('menus', MenuController::class);
    Route::apiResource('menuRoles', MenuRoleController::class);
    // Route::apiResource('notifications', NotificationController::class);
    // Route::apiResource('save-token',SaveTokenController::class);
    // Route::apiResource('send-notification', HomeController::class);
});


Route::post('/v1/publicSafety/send-notification', function (Request $request, FCMService $fcmService) {
    $request->validate([
        'deviceToken' => 'required|string',
        'title' => 'required|string',
        'body' => 'required|string',
    ]);

    return $fcmService->sendNotification($request->deviceToken, $request->title, $request->body);
});

Route::get('v1/publicSafety/usersTotal', [UserController::class, 'getTotalUsers']);
Route::get('v1/publicSafety/incidentReportTotal', action: [IncidentReportController::class, 'getTotalIncidentReport']);
Route::get('v1/publicSafety/incidentFileTotal', action: [IncidentFileController::class, 'getTotalIncidentFile']);
Route::get('v1/publicSafety/totalMessages', [MessageController::class, 'getTotalMessage']);

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth:sanctum']], function () {
    Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

// Route::get('/auth/me', function (Request $request) {
//     return response()->json(['user' => $request->user()]);
// });

Route::middleware('auth:sanctum')->get('/getUsername', [GoogleController::class, 'getUser']);

Route::get('v1/publicSafety/usersSearch', [UserController::class, 'userSearch']);
