<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $empregos_id
 * @property int $areas_id
 * @property areas $area
 * @property empregos $emprego
 */
class empregos_has_areas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['empregos_id','areas_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function areas()
    {
        return $this->belongsTo('App\areas', 'areas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empregos()
    {
        return $this->belongsTo('App\empregos', 'empregos_id');
    }
}
