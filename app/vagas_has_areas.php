<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $vagas_id
 * @property int $areas_id
 * @property string $created_at
 * @property string $updated_at
 * @property Area $area
 * @property Vaga $vaga
 */
class vagas_has_areas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\areas', 'areas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vaga()
    {
        return $this->belongsTo('App\vagas', 'vagas_id');
    }
}
