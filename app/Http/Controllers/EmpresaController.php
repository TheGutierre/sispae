<?php

namespace App\Http\Controllers;

use App\contatos;
use App\empresas;
use App\enderecos;
use App\responsaveis;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    public function create(Request $request){
        $user = users::create([
            'name'     => $request['nome'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $empresas = empresas::create([
            'razao_social'     => $request['razao_social'],
            'nome_fantasia'     => $request['nome_fantasia'],
            'cnpj'     => $request['cnpj'],
            'ramo_atuacao'     => $request['ramo_atuacao'],
        ]);

        $responsaveis = responsaveis::create([
            'nome'     => $request['nome'],
            'cargo'     => $request['cargo'],
            'cpf'     => $request['cpf'],
            'status'     => $request['status'],
            'users_id' => $user->id,
            'empresas_id' => $empresas->id
        ]);

        $contatos = contatos::create([
            'telefone'     => $request['telefone'],
            'telefone2'     => $request['telefone2'],
            'email'     => $request['emailEmp'],
            'empresas_id' => $empresas->id
        ]);

        $enderecos = enderecos::create([
            'logradouro'     => $request['logradouro'],
            'numero'     => $request['numero'],
            'bairro'     => $request['bairro'],
            'cep'     => $request['cep'],
            'complemento'     => $request['complemento'],
            'referencia'     => $request['referencia'],
            'cidade'     => $request['cidade'],
            'estado'     => $request['estado'],
            'empresas_id' => $empresas->id
        ]);

        return Redirect::to('cadastro/empresas');
    }
}
