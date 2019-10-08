<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Egresso[] $egressos
 * @property Responsavei[] $responsaveis
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function egressos()
    {
        return $this->hasMany('App\Egresso', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsaveis()
    {
        return $this->hasMany('App\responsaveis', 'users_id');
    }
}
