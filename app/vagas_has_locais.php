<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $vagas_id
 * @property int $locais_id
 * @property string $updated_at
 * @property string $created_at
 * @property Vaga $vaga
 * @property Locai $locai
 */
class vagas_has_locais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vaga()
    {
        return $this->belongsTo('App\vagas', 'vagas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locai()
    {
        return $this->belongsTo('App\locais', 'locais_id');
    }
}
