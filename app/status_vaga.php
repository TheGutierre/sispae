<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property empregos[] $empregos
 * @property estagios[] $estagios
 */
class status_vaga extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $table = 'status_vaga';

    /**
     * @var array
     */
    protected $fillable = ['nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empregos()
    {
        return $this->hasMany('App\empregos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estagios()
    {
        return $this->hasMany('App\estagios');
    }
}
