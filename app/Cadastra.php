<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $egresso_id
 * @property int $vagas_id
 * @property string $created_at
 * @property string $updated_at
 */
class Cadastra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cadastra';

    /**
     * @var array
     */
    protected $fillable = ['egresso_id', 'vagas_id', 'created_at', 'updated_at'];

}
