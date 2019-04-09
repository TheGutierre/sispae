<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property Emprego[] $empregos
 * @property Estagio[] $estagios
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
    public function empregos()
    {
        return $this->belongsToMany('App\Emprego', 'empregos_has_locais', 'locais_id', 'empregos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function estagios()
    {
        return $this->belongsToMany('App\Estagio', 'estagios_has_locais', 'locais_id', 'estagios_id');
    }
}
