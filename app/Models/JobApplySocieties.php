<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplySocieties extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Get the user that owns the JobApplySocieties
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function JobVacancies(): BelongsTo
    {
        return $this->belongsTo(JobVacancies::class, 'job_vacancy_id', 'id');
    }

        /**
     * Get all of the positions for the JobVacancies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions(): HasMany
    {
        return $this->hasMany(JobApplyPosition::class, 'job_apply_societies_id', 'id');
    }
}
