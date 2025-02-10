<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AvailablePosition extends Model
{
    protected $guarded = [];

    /**
     * Get all of the apply for the AvailablePosition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apply(): HasMany
    {
        return $this->hasMany(JobApplyPosition::class, 'position_id', 'id');
    }
}
