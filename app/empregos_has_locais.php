<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $empregos_id
 * @property int $locais_id
 * @property Emprego $emprego
 * @property Locai $locai
 */
class empregos_has_locais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['empregos_id','locais_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empregos()
    {
        return $this->belongsTo('App\empregos', 'empregos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locais()
    {
        return $this->belongsTo('App\locais', 'locais_id');
    }
}
