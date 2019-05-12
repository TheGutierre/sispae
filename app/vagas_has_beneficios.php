<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $vagas_id
 * @property int $beneficios_id
 * @property string $updated_at
 * @property string $created_at
 * @property Beneficio $beneficio
 * @property Vaga $vaga
 */
class vagas_has_beneficios extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beneficio()
    {
        return $this->belongsTo('App\beneficios', 'beneficios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vaga()
    {
        return $this->belongsTo('App\vagas', 'vagas_id');
    }
}
