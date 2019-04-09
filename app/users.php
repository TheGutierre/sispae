<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property responsaveis[] $responsaveis
 */
class users extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsaveis()
    {
        return $this->hasMany('App\responsaveis', 'users_id');
    }
}
