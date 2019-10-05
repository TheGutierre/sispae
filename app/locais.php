<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property vagas[] $vagas
 */
class locais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['estado', 'cidade', 'bairro'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vagas()
    {
        return $this->belongsToMany('App\vagas', 'vagas_has_locais', 'locais_id', 'vagas_id');
    }
}
