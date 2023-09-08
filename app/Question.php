<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
    ];

    /**
     * Get the answers for question.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
