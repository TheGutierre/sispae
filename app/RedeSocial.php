<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idredes_sociais
 * @property integer $users_id
 * @property string $provider_id
 * @property string $provider_name
 * @property User $user
 */
class RedeSocial extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'redes_sociais';

    /**
     * @var array
     */
    protected $fillable = ['users_id', 'provider_id', 'provider_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
