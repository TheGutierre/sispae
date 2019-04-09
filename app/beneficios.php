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
    public function empregos()
    {
        return $this->belongsToMany('App\empregos', 'empregos_has_beneficios', 'beneficios_id', 'empregos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function estagios()
    {
        return $this->belongsToMany('App\estagios', 'estagios_has_beneficios', 'beneficios_id', 'estagios_id');
    }
}
