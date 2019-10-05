<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $razao_social
 * @property string $nome_fantasia
 * @property string $cpf
 * @property string $cpnj
 * @property string $ramo_atuacao
 * @property contatos[] $contatos
 * @property empregos[] $empregos
 * @property enderecos[] $enderecos
 * @property estagios[] $estagios
 * @property responsaveis[] $responsaveis
 */
class empresas extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['razao_social', 'nome_fantasia', 'cpf', 'cpnj', 'ramo_atuacao'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contatos()
    {
        return $this->hasMany('App\contatos', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vagas()
    {
        return $this->hasMany('App\vagas', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enderecos()
    {
        return $this->hasMany('App\enderecos', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function responsaveis()
    {
        return $this->hasMany('App\responsaveis', 'empresas_id');
    }
}
