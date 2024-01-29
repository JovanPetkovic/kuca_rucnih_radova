<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasUuids;
    use HasFactory;

    protected $fillable = [
        'name', 'description','price','quantity','images'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

}
