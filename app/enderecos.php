<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresas_id
 * @property string $logradouro
 * @property string $numero
 * @property string $bairro
 * @property string $cep
 * @property string $complemento
 * @property string $referencia
 * @property string $cidade
 * @property string $estado
 * @property Empresa $empresa
 */
class enderecos extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['empresas_id', 'logradouro', 'numero', 'bairro', 'cep', 'complemento', 'referencia', 'cidade', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresas_id');
    }
}
