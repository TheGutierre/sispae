<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresas_id
 * @property string $telefone
 * @property string $telefone2
 * @property string $email
 * @property empresas $empresa
 */
class contatos extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['empresas_id', 'telefone', 'telefone2', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\empresas', 'empresas_id');
    }
}
