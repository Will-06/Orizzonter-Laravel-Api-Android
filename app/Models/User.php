<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Queryable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, Queryable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    // Listas blancas para el trait Queryable
    protected array $allowIncluded = [
        'role', 'profile', 'statistic', 'challenges', 'travelRoutes', 'savedTravelRoutes',
        'routeRatings', 'routeComments', 'customPlaces', 'chats', 'messages', 'following', 'followers',

        'profile.personalization'
    ];
    protected array $allowFilter = ['id', 'name', 'email', 'role_id'];
    protected array $allowSort = ['id', 'name', 'last_name', 'email', 'created_at'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges')
            ->withPivot('status', 'progress', 'completed_at')
            ->withTimestamps();
    }

    public function travelRoutes()
    {
        return $this->hasMany(TravelRoute::class);
    }

    public function savedTravelRoutes()
    {
        return $this->hasMany(SavedTravelRoute::class);
    }

    public function routeRatings()
    {
        return $this->hasMany(RouteRating::class);
    }

    public function routeComments()
    {
        return $this->hasMany(RouteComment::class);
    }

    public function customPlaces()
    {
        return $this->hasMany(UserCustomPlace::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'chat_participants')
            ->withPivot('is_admin', 'last_read_message_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id')
            ->withTimestamps();
    }
}
