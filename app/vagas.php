<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresas_id
 * @property string $tipo
 * @property string $cargo
 * @property string $descricao
 * @property int $vagas
 * @property string $faixa_sal_min
 * @property string $faixa_sal_max
 * @property boolean $acombinar
 * @property boolean $pornecessidades
 * @property boolean $recebercurriculos
 * @property string $emailcurriculos
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Empresa $empresa
 * @property VagasHasArea[] $vagasHasAreas
 * @property VagasHasBeneficio[] $vagasHasBeneficios
 * @property VagasHasLocai[] $vagasHasLocais
 */
class vagas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['empresas_id', 'tipo', 'cargo', 'descricao', 'vagas', 'faixa_sal_min', 'faixa_sal_max', 'acombinar', 'pornecessidades', 'recebercurriculos', 'emailcurriculos', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\empresas', 'empresas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vagasHasAreas()
    {
        return $this->hasMany('App\vagas_has_areas', 'vagas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vagasHasBeneficios()
    {
        return $this->hasMany('App\vagas_has_beneficios', 'vagas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locais()
    {
        return $this->BelongsToMany('App\locais','vagas_has_locais','vagas_id','locais_id');
    }
}
