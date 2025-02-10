<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Societies extends Model
{
    protected $guarded = [];
    protected $appends = ['token']; 
    public $timestamps = false;   
    public function getTokenAttribute() {
        return md5($this->id_card_number);
    }

    /**
     * Get the regionnal that owns the Societies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regional(): BelongsTo
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }
}
