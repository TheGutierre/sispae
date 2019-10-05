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
use Illuminate\Support\Facades\Redirect;

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
            $vagas->locais()->sync($locais);

            $areas = areas::create([
                'nome' => $request['nomeArea']
            ]);
            $areas->vagas()->sync($vagas);

            $beneficios = beneficios::create([
                'nome' => $request['nomeBenef'],
                'valor' => $request['valorBenf']
            ]);
            $beneficios->vagas()->sync($vagas);
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

        $taskEmpresa = empresas::where('id', Auth::user()->responsaveis()->first()->empresas_id) ->first()
        ->join('vagas', 'empresas.id', 'vagas.empresas_id')
            ->join('vagas_has_locais', 'vagas.id', 'vagas_has_locais.vagas_id')
            ->join('locais', 'vagas_has_locais.locais_id', 'locais.id')
            ->join('vagas_has_areas', 'vagas.id', 'vagas_has_areas.vagas_id')
            ->join('areas', 'vagas_has_areas.areas_id', 'areas.id')
        ;
        $taskVaga = vagas::where('id', $id)->first();
        $taskArea = areas::where('id', vagas_has_areas::where('vagas_id',$id)->first()->areas_id)->first();
        $taskLocal = locais::where('id', vagas_has_locais::where('vagas_id',$id)->first()->locais_id)->first();
        $taskBeneficio = beneficios::where('id', vagas_has_beneficios::where('vagas_id',$id)->first()->beneficios_id)->first();
        return view('vagas.edit', ['vaga' => $taskVaga, 'area' => $taskArea, 'local' => $taskLocal, 'beneficio' => $taskBeneficio]);
    }
    public function update(Request $request){

        $vaga = vagas::where('id', $request['id'])->first();
        $vaga->tipo = $request['tipo'];
        $vaga->cargo = $request['cargo'];
        $vaga->descricao = $request['descricao'];
        $vaga->vagas = $request['vagas'];
        $vaga->faixa_sal_min = $request['faixa_sal_min'];
        $vaga->faixa_sal_max = $request['faixa_sal_max'];
        $vaga->acombinar = $request['acombinar'];
        $vaga->pornecessidades = $request['pornecessidades'];
        $vaga->recebercurriculos = $request['recebercurriculos'];
        $vaga->emailcurriculos = $request['emailcurriculos'];
        $vaga->pergradu_min = $request['pergradu_min'];
        $vaga->pergradu_max = $request['pergradu_max'];
        $vaga->status = $request['status'];

        $area = areas::where('id', vagas_has_areas::where('vagas_id',$request['id'])->first()->areas_id)->first();
        $area->nome = $request['nomeArea'];

        $local = locais::where('id', vagas_has_locais::where('vagas_id',$request['id'])->first()->locais_id)->first();
        $local->estado = $request['estado'];
        $local->cidade = $request['cidade'];
        $local->bairro = $request['bairro'];

        $beneficio = beneficios::where('id', vagas_has_beneficios::where('vagas_id',$request['id'])->first()->beneficios_id)->first();
        $beneficio->nome = $request['nomeBenef'];
        $beneficio->valor = $request['valorBenf'];

        $vaga->save();
        $area->save();
        $local->save();
        $beneficio->save();

        return Redirect::to('/vagas/index');
    }

    public function destroy($id)
    {
        $area = areas::where('id', vagas_has_areas::where('vagas_id',$id)->first()->areas_id)->first();

        $beneficios = beneficios::where('id', vagas_has_beneficios::where('vagas_id',$id)->first()->beneficios_id)->first();

        $locais = locais::where('id', vagas_has_locais::where('vagas_id',$id)->first()->locais_id)->first();

        $vlocais = vagas_has_locais::where('vagas_id', $id);
        $vlocais->delete();

        $vaga = vagas::where('id',$id)->first();

        $vaga->vagasHasAreas()->delete();
        $vaga->vagasHasBeneficios()->delete();
        $vaga->delete();
        $area->delete();
        $beneficios->delete();
        $locais->delete();

        return back()->withInput();
    }
}
