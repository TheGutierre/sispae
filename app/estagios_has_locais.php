<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $estagios_id
 * @property int $locais_id
 * @property estagios $estagios
 * @property locais $locais
 */
class estagios_has_locais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['estagios_id','locais_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estagios()
    {
        return $this->belongsTo('App\estagios', 'estagios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locais()
    {
        return $this->belongsTo('App\locais', 'locais_id');
    }
}
