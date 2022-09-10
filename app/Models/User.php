<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'phoneNumber',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function studentOrg()
    {
        return $this->belongsToMany(Organization::class, 'organization_user','user_id','organization_id')
            ->withPivot(['position'])
            ->withTimestamps();;
        // , 'organization_user','user_id','organization_id'
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user','user_id','role_id');
    }

    public function userFaculty()
    {
        return $this->hasOne(Faculty::class);
    }

    public function userStaff()
    {
        return $this->hasOne(Staff::class);
    }
}
