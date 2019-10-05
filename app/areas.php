<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property empregos[] $empregos
 * @property estagios[] $estagios
 * @property Subarea[] $subareas
 */
class areas extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vagas()
    {
        return $this->belongsToMany('App\vagas', 'vagas_has_areas', 'areas_id', 'vagas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function subareas()
    {
        return $this->hasMany('App\subarea', 'areas_id');
    }
}
