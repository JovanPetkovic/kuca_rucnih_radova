<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description','price','quantity','images'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

}
