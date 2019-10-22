<?php

namespace App\Http\Controllers;

use App\contatos;
use App\empresas;
use App\enderecos;
use App\responsaveis;
use App\User;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    public function create(Request $request){
        $user = users::create([
            'name'     => $request['nome'],
            'email'    => $request['email'],
            'tipo'    => 'responsavel',
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
    public function edit($id){
        $taskUser = users::where('id', $id)->first();
        $taskResponsavel = responsaveis::where('users_id', $id)->first();
        $taskEmpresa = empresas::where('id', $taskResponsavel->empresas_id)->first();
        $taskContato = contatos::where('empresas_id', $taskEmpresa->id)->first();
        $taskEndereco = enderecos::where('empresas_id', $taskEmpresa->id)->first();
        return view('empresas.edit', ['user' => $taskUser, 'responsavel' => $taskResponsavel, 'empresa' => $taskEmpresa, 'contato' => $taskContato, 'endereco' => $taskEndereco]);
    }
    public function update(Request $request){

        $responsavel = responsaveis::where('users_id', $request['id'])->first();
        $responsavel->nome = $request['nome'];
        $responsavel->cargo = $request['cargo'];
        $responsavel->cpf = $request['cpf'];
        $responsavel->status = $request['status'];

        $empresa = empresas::where('id', $responsavel->empresas_id)->first();
        $empresa->razao_social = $request['razao_social'];
        $empresa->nome_fantasia = $request['nome_fantasia'];
        $empresa->cnpj = $request['cnpj'];
        $empresa->ramo_atuacao = $request['ramo_atuacao'];

        $contato = contatos::where('empresas_id', $empresa->id)->first();
        $contato->telefone = $request['telefone'];
        $contato->telefone2 = $request['telefone2'];
        $contato->email = $request['emailEmp'];

        $endereco = enderecos::where('empresas_id', $empresa->id)->first();
        $endereco->logradouro = $request['logradouro'];
        $endereco->numero = $request['numero'];
        $endereco->bairro = $request['bairro'];
        $endereco->cep = $request['cep'];
        $endereco->complemento = $request['complemento'];
        $endereco->referencia = $request['referencia'];
        $endereco->cidade = $request['cidade'];
        $endereco->estado = $request['estado'];

        $user = User::where('id', $responsavel->users_id)->first();
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);

        $responsavel->save();
        $empresa->save();
        $contato->save();
        $endereco->save();
        $user->save();

        return Redirect::to('/home');
    }
}
