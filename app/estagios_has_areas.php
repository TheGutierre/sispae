<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $estagios_id
 * @property int $areas_id
 * @property Area $area
 * @property Estagio $estagio
 */
class estagios_has_areas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['estagios_id','areas_id'];

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
    public function estagios()
    {
        return $this->belongsTo('App\estagios', 'estagios_id');
    }
}
