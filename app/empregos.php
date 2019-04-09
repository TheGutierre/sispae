<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresas_id
 * @property int $status_vaga_id
 * @property string $cargo
 * @property string $descricao
 * @property int $vagas
 * @property string $faixa_sal_min
 * @property string $faixa_sal_max
 * @property boolean $acombinar
 * @property boolean $pornecessidades
 * @property boolean $recebercurriculos
 * @property string $emailcurriculos
 * @property empresas $empresa
 * @property status_vaga $statusVaga
 * @property areas[] $areas
 * @property beneficios[] $beneficios
 * @property locais[] $locais
 */
class empregos extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['empresas_id', 'status_vaga_id', 'cargo', 'descricao', 'vagas', 'faixa_sal_min', 'faixa_sal_max', 'acombinar', 'pornecessidades', 'recebercurriculos', 'emailcurriculos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\empresas', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusVaga()
    {
        return $this->belongsTo('App\status_vaga');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function areas()
    {
        return $this->belongsToMany('App\areas', 'empregos_has_areas', 'empregos_id', 'areas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function beneficios()
    {
        return $this->belongsToMany('App\beneficios', 'empregos_has_beneficios', 'empregos_id', 'beneficios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locais()
    {
        return $this->belongsToMany('App\locais', 'empregos_has_locais', 'empregos_id', 'locais_id');
    }
}
