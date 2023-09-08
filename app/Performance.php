<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Performance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'date'
    ];

    public function performaceResult(): HasMany
    {
        return $this->hasMany(PerformanceResults::class);
    }
}
