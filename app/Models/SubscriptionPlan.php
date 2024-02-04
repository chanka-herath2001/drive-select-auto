<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $table = 'subscription_plans';
    protected $fillable = ['name', 'price', 'features', 'stripe_price_id'];
    protected $primaryKey = 'id';
    
    public function users()
    {
        return $this->hasMany(User::class);
    }


    // Define any relationships if needed
}
