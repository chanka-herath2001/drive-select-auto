<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $table = 'subscription_plans';
    protected $fillable = ['name', 'price', 'features'];
    protected $primaryKey = 'id';
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    // Define any relationships if needed
}
