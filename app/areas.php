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
    public function empregos()
    {
        return $this->belongsToMany('App\empregos', 'empregos_has_areas', 'areas_id', 'empregos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function estagios()
    {
        return $this->belongsToMany('App\estagios', 'estagios_has_areas', 'areas_id', 'estagios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subareas()
    {
        return $this->hasMany('App\subarea', 'areas_id');
    }
}
