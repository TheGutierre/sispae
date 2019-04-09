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
 * @property int $pergradu_min
 * @property int $pergradu_max
 * @property Empresa $empresa
 * @property StatusVaga $statusVaga
 * @property Area[] $areas
 * @property Beneficio[] $beneficios
 * @property Locai[] $locais
 */
class estagios extends Model
{
    /**
     * @var array
     */
    protected $primaryKey = 'id';

    public $incrementing = 'id';
    protected $fillable = ['empresas_id', 'status_vaga_id', 'cargo', 'descricao', 'vagas', 'faixa_sal_min', 'faixa_sal_max', 'acombinar', 'pornecessidades', 'recebercurriculos', 'emailcurriculos', 'pergradu_min', 'pergradu_max'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusVaga()
    {
        return $this->belongsTo('App\StatusVaga');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function areas()
    {
        return $this->belongsToMany('App\Area', 'estagios_has_areas', 'estagios_id', 'areas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function beneficios()
    {
        return $this->belongsToMany('App\Beneficio', 'estagios_has_beneficios', 'estagios_id', 'beneficios_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locais()
    {
        return $this->belongsToMany('App\Locai', 'estagios_has_locais', 'estagios_id', 'locais_id');
    }
}
