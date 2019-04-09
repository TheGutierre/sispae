<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmensagens
 * @property string $nome
 * @property string $email
 * @property string $mensagem
 */
class Mensagem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mensagens';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'email', 'mensagem'];

}
