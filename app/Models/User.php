<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    

    public function ads()
{
    return $this->hasMany(Ad::class);
}

public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'status',
        'mobile',
        'mobile_verified_at',
        'designation',
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'nic',
        'license_plate_number',
        'avatar',
        'license_side_1',
        'license_side_2',
        'license_plate_number_picture',
        'validation_papers',
        'last_login_at',

        'created_at',
        'updated_at',
        'subscription_plan_id',
        'deleted_at'
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
        'mobile_verified_at' => 'datetime',
        'birthday' => 'date',
        'password' => 'hashed',
        'role_id' => UserRole::class
    ];
}
