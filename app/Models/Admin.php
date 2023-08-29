<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin  extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles ;
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    protected $guard="admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'mobile',
        'photo',
        'password',
        'remember_token',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function getDefaultGuardName(): string { return 'admin'; }
    public static function getpermissionGroups(){

        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();

        return $permission_groups;

    }

    public static function getpermissionByGroupName($group_name){

        $permission = DB::table('permissions')->select('name','id')->where('group_name',$group_name)->get();

        return $permission;

    }

    public static function roleHasPermissions($role,$permission){

        $hasPermission = true;

        foreach ($permission as $perm) {

            // hasPermissionTo()  laravel spattie

            if (!$role->hasPermissionTo($perm->name)) {

                $hasPermission = false;

                return $hasPermission;

            }

            return $hasPermission;

        }

    }

}
