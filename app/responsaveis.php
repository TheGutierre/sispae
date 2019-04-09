<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $users_id
 * @property int $empresas_id
 * @property string $nome
 * @property string $cargo
 * @property string $cpf
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property empresas $empresas
 * @property User $user
 */
class responsaveis extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['users_id', 'empresas_id', 'nome', 'cargo', 'cpf', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresas()
    {
        return $this->belongsTo('App\empresas', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\users', 'users_id');
    }
}
