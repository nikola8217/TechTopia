<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'points' => 0,
    ];
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register($name, $email, $password){
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'points' => 0
        
        ]);
    }

    public static function getUsers() {
        return DB::table('users')
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->select('users.id AS user_id', 'users.name AS name', 'users.email AS email', 'users.points AS points', 'roles.id AS role_id', 'roles.name AS role_name')
        ->get();
    }

    public static function getUser($id) {
        return DB::table('users')
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->where('users.id', $id)
        ->select('users.id AS user_id', 'users.name AS name', 'users.email AS email', 'users.points AS points', 'roles.id AS role_id', 'roles.name AS role_name')
        ->first();
    }

    public static function editUser($id, $name, $email, $points) {
        return User::where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'points' => $points
        ]);
    }

    public static function updatePoints($user_id) {
        $points = User::where('id', $user_id)->first()->points;

        return User::where('id', $user_id)->update([
            'points' => $points + 10
        ]);
    }
}
