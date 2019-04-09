<?php

namespace App\Http\Controllers;

use App\areas;
use App\beneficios;
use App\empregos;
use App\empregos_has_areas;
use App\empregos_has_beneficios;
use App\empregos_has_locais;
use App\empresas;
use App\estagios;
use App\estagios_has_areas;
use App\estagios_has_beneficios;
use App\estagios_has_locais;
use App\locais;
use App\status_vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagasController extends Controller
{
    public function cadastrar(Request $request) {

        if($request['tipoVaga'] == "estagio"){
            $status_vaga = status_vaga::create([
                'nome' => $request['status_vaga']
            ]);
            $estagio = estagios::create([
                'cargo' => $request['cargo'],
                'descricao' => $request['descricao'],
                'vagas' => $request['vagas'],
                'faixa_sal_min' => $request['faixa_sal_min'],
                'faixa_sal_max' => $request['faixa_sal_max'],
                'acombinar' => $request['acombinar'],
                'pornecessidades' => $request['pornecessidades'],
                'recebercurriculos' => $request['recebercurriculos'],
                'emailcurriculos' => $request['emailcurriculos'],
                'pergradu_min' => $request['pergradu_min'],
                'pergradu_max' => $request['pergradu_max'],
                'status_vaga_id' => $status_vaga->id,
                'empresas_id' => Auth::user()->responsaveis()->first()->empresas_id,

            ]);
            $locais = locais::create([
                'estado' => $request['estado'],
                'cidade' => $request['cidade'],
                'bairro' => $request['bairro']
            ]);
            estagios_has_locais::create([
                'estagios_id' => $estagio->id,
                'locais_id' => $locais->id
            ]);
            $areas = areas::create([
                'nome' => $request['nomeArea']
            ]);
            estagios_has_areas::create([
                'estagios_id' => $estagio->id,
                'areas_id' => $areas->id
            ]);
            $beneficios = beneficios::create([
                'nome' => $request['nomeBenef'],
                'valor' => $request['valorBenf']
            ]);
            estagios_has_beneficios::create([
                'estagios_id' => $estagio->id,
                'beneficios_id' => $beneficios->id
            ]);
        }
        else if($request['tipoVaga'] == "emprego"){
            $status_vaga = status_vaga::create([
                'nome' => $request['status_vaga']
            ]);
            $emprego = empregos::create([
                'cargo' => $request['cargo'],
                'descricao' => $request['descricao'],
                'vagas' => $request['vagas'],
                'faixa_sal_min' => $request['faixa_sal_min'],
                'faixa_sal_max' => $request['faixa_sal_max'],
                'acombinar' => $request['acombinar'],
                'pornecessidades' => $request['pornecessidades'],
                'recebercurriculos' => $request['recebercurriculos'],
                'emailcurriculos' => $request['emailcurriculos'],
                'empresas_id' => Auth::user()->responsaveis()->first()->empresas_id,
                'status_vaga_id' => $status_vaga->id
            ]);
            $locais = locais::create([
                'estado' => $request['estado'],
                'cidade' => $request['cidade'],
                'bairro' => $request['bairro']
            ]);
            empregos_has_locais::create([
                'empregos_id' => $emprego->id,
                'locais_id' => $locais->id
            ]);
            $areas = areas::create([
                'nome' => $request['nomeArea']
            ]);
            empregos_has_areas::create([
                'empregos_id' => $emprego->id,
                'areas_id' => $areas->id
            ]);
            $beneficios = beneficios::create([
                'nome' => $request['nomeBenef'],
                'valor' => $request['valorBenf']
            ]);
            empregos_has_beneficios::create([
                'empregos_id' => $emprego->id,
                'beneficios_id' => $beneficios->id
            ]);
        }
    	return view('vagas.create');
    }

    public function index()
    {
        $vagasEst = empresas::join('estagios', 'empresas.id', 'estagios.empresas_id')
            ->join('estagios_has_locais', 'estagios.id', 'estagios_has_locais.estagios_id')
            ->join('locais', 'estagios_has_locais.locais_id', 'locais.id')
            ->join('status_vaga', 'estagios.status_vaga_id', 'status_vaga.id')
            ->select('estagios.cargo as Cargo', 'estagios.descricao as Descricao',
                'empresas.nome_fantasia as Empresa', 'locais.cidade as Cidade', 'estagios.vagas as Vagas',
                'status_vaga.nome as Status','estagios.id as ID', 'estagios.updated_at as Data')
            ->orderBy('estagios.updated_at','DESC')
            ->paginate(15)
        ;
        $vagasEmp = empresas::join('empregos', 'empresas.id', 'empregos.empresas_id')
            ->join('empregos_has_locais', 'empregos.id', 'empregos_has_locais.empregos_id')
            ->join('locais', 'empregos_has_locais.locais_id', 'locais.id')
            ->join('status_vaga', 'empregos.status_vaga_id', 'status_vaga.id')
            ->select('empregos.cargo as Cargo', 'empregos.descricao as Descricao',
                'empresas.nome_fantasia as Empresa', 'locais.cidade as Cidade', 'empregos.vagas as Vagas',
                'status_vaga.nome as Status','empregos.id as ID','empregos.updated_at as Data')
            ->orderBy('empregos.updated_at','DESC')
            ->paginate(15)
        ;

        return view('vagas.index', ['estagios' => $vagasEst],['empregos' => $vagasEmp]);
        return ;
    }
    public function edit($id, Request $request){

        $taskEstagio = empresas::where('id', Auth::user()->responsaveis()->first()->empresas_id) ->first()
        ->join('empregos', 'empresas.id', 'empregos.empresas_id')
            ->join('empregos_has_locais', 'empregos.id', 'empregos_has_locais.empregos_id')
            ->join('locais', 'empregos_has_locais.locais_id', 'locais.id')
            ->join('empregos_has_areas', 'empregos.id', 'empregos_has_areas.empregos_id')
            ->join('areas', 'empregos_has_locais.locais_id', 'locais.id')
            ->join('status_vaga', 'empregos.status_vaga_id', 'status_vaga.id')
        ;
        $taskPes = Pessoa::where('idPessoa', $id)->first();

        // show the edit form and pass the nerd
        return view('adm.updatePalestrante', ['palestrante' => $taskPale, 'pessoa' => $taskPes]);
    }

}
