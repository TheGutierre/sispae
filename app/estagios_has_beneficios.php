<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $estagios_id
 * @property int $beneficios_id
 * @property Beneficio $beneficio
 * @property Estagio $estagio
 */
class estagios_has_beneficios extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['estagios_id','beneficios_id'];

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
    public function estagio()
    {
        return $this->belongsTo('App\estagios', 'estagios_id');
    }
}
