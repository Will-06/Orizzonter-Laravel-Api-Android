<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatParticipantController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\InterestPlaceController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PersonalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RouteCommentController;
use App\Http\Controllers\RouteRatingController;
use App\Http\Controllers\SavedTravelRouteController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TravelRouteController;
use App\Http\Controllers\UserChallengeController;
use App\Http\Controllers\UserCustomPlaceController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [RegisterController::class, 'register']);

// Protected routes with JWT
Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResources([
        'roles'               => RoleController::class,
        'users'               => UserController::class,
        'profiles'            => ProfileController::class,
        'personalizations'    => PersonalizationController::class,
        'statistics'          => StatisticController::class,
        'media'               => MediaController::class,
        'announcements'       => AnnouncementController::class,
        'rewards'             => RewardController::class,
        'challenges'          => ChallengeController::class,
        'user_challenges'     => UserChallengeController::class,
        'travel_routes'       => TravelRouteController::class,
        'route_ratings'       => RouteRatingController::class,
        'route_comments'      => RouteCommentController::class,
        'saved_travel_routes' => SavedTravelRouteController::class,
        'interest_places'     => InterestPlaceController::class,
        'user_custom_places'  => UserCustomPlaceController::class,
        'configurations'      => ConfigurationController::class,
        'chats'               => ChatController::class,
        'messages'            => MessageController::class,
        'chat_participants'   => ChatParticipantController::class,
        'followers'           => FollowerController::class,
    ]);
});