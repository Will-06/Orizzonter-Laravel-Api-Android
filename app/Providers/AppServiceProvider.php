<?php

namespace App\Providers;

// Interfaces
use App\Services\{
    AnnouncementService,
    ChatParticipantService,
    ChatService,
    ChallengeService,
    ConfigurationService,
    FollowerService,
    InterestPlaceService,
    MediaService,
    MessageService,
    PersonalizationService,
    ProfileService,
    RewardService,
    RoleService,
    RouteCommentService,
    RouteRatingService,
    SavedTravelRouteService,
    StatisticService,
    TravelRouteService,
    UserChallengeService,
    UserCustomPlaceService,
    UserService
};

// Implementaciones
use App\Services\Impl\{
    AnnouncementServiceImpl,
    ChatParticipantServiceImpl,
    ChatServiceImpl,
    ChallengeServiceImpl,
    ConfigurationServiceImpl,
    FollowerServiceImpl,
    InterestPlaceServiceImpl,
    MediaServiceImpl,
    MessageServiceImpl,
    PersonalizationServiceImpl,
    ProfileServiceImpl,
    RewardServiceImpl,
    RoleServiceImpl,
    RouteCommentServiceImpl,
    RouteRatingServiceImpl,
    SavedTravelRouteServiceImpl,
    StatisticServiceImpl,
    TravelRouteServiceImpl,
    UserChallengeServiceImpl,
    UserCustomPlaceServiceImpl,
    UserServiceImpl
};

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AnnouncementService::class, AnnouncementServiceImpl::class);
        $this->app->bind(ChatParticipantService::class, ChatParticipantServiceImpl::class);
        $this->app->bind(ChatService::class, ChatServiceImpl::class);
        $this->app->bind(ChallengeService::class, ChallengeServiceImpl::class);
        $this->app->bind(ConfigurationService::class, ConfigurationServiceImpl::class);
        $this->app->bind(FollowerService::class, FollowerServiceImpl::class);
        $this->app->bind(InterestPlaceService::class, InterestPlaceServiceImpl::class);
        $this->app->bind(MediaService::class, MediaServiceImpl::class);
        $this->app->bind(MessageService::class, MessageServiceImpl::class);
        $this->app->bind(PersonalizationService::class, PersonalizationServiceImpl::class);
        $this->app->bind(ProfileService::class, ProfileServiceImpl::class);
        $this->app->bind(RewardService::class, RewardServiceImpl::class);
        $this->app->bind(RoleService::class, RoleServiceImpl::class);
        $this->app->bind(RouteCommentService::class, RouteCommentServiceImpl::class);
        $this->app->bind(RouteRatingService::class, RouteRatingServiceImpl::class);
        $this->app->bind(SavedTravelRouteService::class, SavedTravelRouteServiceImpl::class);
        $this->app->bind(StatisticService::class, StatisticServiceImpl::class);
        $this->app->bind(TravelRouteService::class, TravelRouteServiceImpl::class);
        $this->app->bind(UserChallengeService::class, UserChallengeServiceImpl::class);
        $this->app->bind(UserCustomPlaceService::class, UserCustomPlaceServiceImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
    }

    public function boot(): void
    {
        // Ejecutar migraciones automáticamente al iniciar la aplicación
        // SOLO en producción y si no hay tablas
        if (app()->environment('production')) {
            try {
                // Verificar si la tabla 'migrations' existe
                $tableExists = DB::select("SHOW TABLES LIKE 'migrations'");

                if (empty($tableExists)) {
                    // Ejecutar migraciones si no hay tablas
                    Artisan::call('migrate', ['--force' => true]);
                    Log::info('Migraciones ejecutadas automáticamente en producción');
                }
            } catch (\Exception $e) {
                Log::error('Error en migración automática: ' . $e->getMessage());
            }
        }
    }
}
