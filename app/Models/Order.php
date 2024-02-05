<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name','phone_number','street_address','city','postal_code','country','delivery_instructions','email_address','order_date'
    ];

    public function items():BelongsToMany{
        return $this->belongsToMany(Item::class);
    }
}
