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
use App\vagas;
use App\vagas_has_areas;
use App\vagas_has_beneficios;
use App\vagas_has_locais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagasController extends Controller
{
    public function cadastrar(Request $request) {

            $vagas = vagas::create([
                'tipo' => $request['tipo'],
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
                'status' => $request['status'],
                'empresas_id' => Auth::user()->responsaveis()->first()->empresas_id,

            ]);
            $locais = locais::create([
                'estado' => $request['estado'],
                'cidade' => $request['cidade'],
                'bairro' => $request['bairro']
            ]);
            $vagas->locais->sync($locais);

            $areas = areas::create([
                'nome' => $request['nomeArea']
            ]);
            vagas_has_areas::create([
                'vagas_id' => $vagas->id,
                'areas_id' => $areas->id
            ]);
            $beneficios = beneficios::create([
                'nome' => $request['nomeBenef'],
                'valor' => $request['valorBenf']
            ]);
            vagas_has_beneficios::create([
                'vagas_id' => $vagas->id,
                'beneficios_id' => $beneficios->id
            ]);
    	return view('vagas.create');
    }

    public function index()
    {
        /*$vagasEst = empresas::join('estagios', 'empresas.id', 'estagios.empresas_id')
            ->join('estagios_has_locais', 'estagios.id', 'estagios_has_locais.estagios_id')
            ->join('locais', 'estagios_has_locais.locais_id', 'locais.id')
            ->join('status_vaga', 'estagios.status_vaga_id', 'status_vaga.id')
            ->select('estagios.cargo as Cargo', 'estagios.descricao as Descricao',
                'empresas.nome_fantasia as Empresa', 'locais.cidade as Cidade', 'estagios.vagas as Vagas',
                'status_vaga.nome as Status','estagios.id as ID', 'status_vaga.updated_at as Data')
            ->orderBy('status_vaga.updated_at','DESC')
            ->paginate(15)
        ;
        $vagasEmp = empresas::join('empregos', 'empresas.id', 'empregos.empresas_id')
            ->join('empregos_has_locais', 'empregos.id', 'empregos_has_locais.empregos_id')
            ->join('locais', 'empregos_has_locais.locais_id', 'locais.id')
            ->join('status_vaga', 'empregos.status_vaga_id', 'status_vaga.id')
            ->select('empregos.cargo as Cargo', 'empregos.descricao as Descricao',
                'empresas.nome_fantasia as Empresa', 'locais.cidade as Cidade', 'empregos.vagas as Vagas',
                'status_vaga.nome as Status','empregos.id as ID','status_vaga.updated_at as Data')
            ->orderBy('status_vaga.updated_at','DESC')
            ->paginate(15)
        ;*/
        $vagas = empresas::join('vagas', 'empresas.id', 'vagas.empresas_id')
            ->select('vagas.cargo as Cargo', 'vagas.vagas as Vagas',
                'vagas.status as Status', 'vagas.id as ID')
            ->orderBy('vagas.updated_at','DESC')
            ->paginate(15)
        ;

        return view('vagas.index', ['vagas' => $vagas]);
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
