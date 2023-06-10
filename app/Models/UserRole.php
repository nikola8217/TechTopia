<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    protected $table = 'users_roles';

    public static function createUserRole($user_id, $role_id){
        return UserRole::create([
            "user_id" => $user_id,
            "role_id" => $role_id 
        ]);
    }

    public static function editUserRole($id, $user_id, $role_id) {
        return UserRole::where('id', $id)->update([
            'user_id' => $user_id,
            'role_id' => $role_id
        ]);
    }
}
