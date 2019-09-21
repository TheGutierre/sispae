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

        $taskVaga = empresas::where('id', Auth::user()->responsaveis()->first()->empresas_id) ->first()
        ->join('vagas', 'empresas.id', 'vagas.empresas_id')
            ->join('vagas_has_locais', 'vagas.id', 'vagas_has_locais.vagas_id')
            ->join('locais', 'vagas_has_locais.locais_id', 'locais.id')
            ->join('vagas_has_areas', 'vagas.id', 'vagas_has_areas.vagas_id')
            ->join('areas', 'vagas_has_locais.locais_id', 'locais.id')
        ;
        return view('vagas.edit', ['vaga' => $taskVaga]);
    }

}
