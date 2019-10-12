<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $users_id
 * @property string $matricula
 * @property User $user
 * @property Vaga[] $vagas
 */
class Egresso extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'egresso';

    /**
     * @var array
     */
    protected $fillable = ['users_id', 'matricula'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vagas()
    {
        return $this->belongsToMany('App\vagas', 'cadastra', null, 'vagas_id');
    }
}
