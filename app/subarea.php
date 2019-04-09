<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $areas_id
 * @property string $nome
 * @property Area $area
 */
class subarea extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $table = 'subarea';

    /**
     * @var array
     */
    protected $fillable = ['areas_id', 'nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Area', 'areas_id');
    }
}
