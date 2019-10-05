<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property string $valor
 * @property empregos[] $empregos
 * @property estagios[] $estagios
 */
class beneficios extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['nome', 'valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vagas()
    {
        return $this->belongsToMany('App\vagas', 'vagas_has_beneficios', 'beneficios_id', 'vagas_id');
    }

}
