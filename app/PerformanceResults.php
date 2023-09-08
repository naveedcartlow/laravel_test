<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceResults extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'performance_id', 'question_id', 'answer_id'
    ];


    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }
}
