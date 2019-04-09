<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $empregos_id
 * @property int $beneficios_id
 * @property beneficios $beneficio
 * @property empregos $emprego
 */
class empregos_has_beneficios extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['empregos_id','beneficios_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beneficios()
    {
        return $this->belongsTo('App\beneficios', 'beneficios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empregos()
    {
        return $this->belongsTo('App\empregos', 'empregos_id');
    }
}
