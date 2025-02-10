<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobVacancies extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function category() : BelongsTo
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id', 'id');
    }

    /**
     * Get all of the availablePosition for the JobVacancies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function availablePosition(): HasMany
    {
        return $this->hasMany(AvailablePosition::class, 'job_vacancy_id', 'id');
    }


}
