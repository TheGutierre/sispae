<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $egresso_id
 * @property int $vagas_id
 * @property Egresso $egresso
 * @property Vaga $vaga
 */
class Cadastra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cadastra';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function egresso()
    {
        return $this->belongsTo('App\Egresso');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vaga()
    {
        return $this->belongsTo('App\Vaga', 'vagas_id');
    }
}
