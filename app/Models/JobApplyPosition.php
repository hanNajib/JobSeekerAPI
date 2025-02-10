<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplyPosition extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Get the position that owns the JobApplyPosition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(AvailablePosition::class, 'position_id', 'id');
    }
}
