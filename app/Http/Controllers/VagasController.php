<?php

namespace App\Http\Controllers;

use App\areas;
use App\beneficios;
use App\Cadastra;
use App\Egresso;
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
use App\User;
use App\vagas;
use App\vagas_has_areas;
use App\vagas_has_beneficios;
use App\vagas_has_locais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
                'vagas.status as Status', 'vagas.id as ID', 'vagas.empresas_id as empresas_id')
            ->orderBy('vagas.updated_at','DESC')
            ->paginate(15)
        ;
        if(Auth::user()->tipo == "egresso"){
            $verifica = Cadastra::where('egresso_id', Auth::user()->egressos()->first()->id)
                ->get();
        }
        else{
            $verifica = Cadastra::get();
        }

        if(Auth::user()->tipo == "responsavel" || Auth::user()->tipo == "administrador"){
            $usuario = Auth::user()->responsaveis()->first();
            $veruser = 1;
            if(Auth::user()->tipo == "administrador"){
                $usuario = Auth::user()->first();
            }
        }
        else{
            $usuario = Auth::user()->first();
            $veruser = 0;
        }

        //return $verifica;
        return view('vagas.index', ['vagas' => $vagas, 'usuario' => $usuario, 'veruser' => $veruser, 'verifica' => $verifica]);
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
    public function vaga ($id){
        $vaga = vagas::where('id',$id)->first();

        $area = areas::where('id', vagas_has_areas::where('vagas_id',$id)->first()->areas_id)->first();

        $beneficios = beneficios::where('id', vagas_has_beneficios::where('vagas_id',$id)->first()->beneficios_id)->first();

        $locais = locais::where('id', vagas_has_locais::where('vagas_id',$id)->first()->locais_id)->first();

        $empresa = empresas::where('id', $vaga->empresas_id)->first();

        if(Auth::user()->tipo == "egresso"){
            $verifica = Cadastra::where('egresso_id', Auth::user()->egressos()->first()->id)
                ->where('vagas_id', $id)
                ->count()
            ;
            $veruser = 0;
        }
        else{
            $verifica = 0;
            $veruser = 1;
        }


        return view('vagas.vaga', ['vaga' => $vaga, 'area' => $area, 'beneficios' => $beneficios, 'local' => $locais, 'empresa' => $empresa, 'verifica' => $verifica, 'veruser' => $veruser]);
    }

    public function candidatar(Request $request){

        Cadastra::create([
            'egresso_id' => Auth::user()->egressos()->first()->id,
            'vagas_id' => $request['id'],

        ]);
        Session::flash('message1', 'Você se candidatou a está vaga, agora é só aguardar. A empresa deverá entrar em contato com você. Boa sorte!');
        return back()->withInput();
    }
    public function minhasVagas(){
        $vagas = vagas::where('empresas_id', Auth::user()->responsaveis()->first()->empresas_id)
            ->join('empresas', 'vagas.empresas_id', 'empresas.id')
            ->select('vagas.cargo as Cargo', 'vagas.vagas as Vagas',
                'vagas.status as Status', 'vagas.id as ID', 'vagas.empresas_id as empresas_id')
            ->orderBy('vagas.updated_at','DESC')
            ->paginate(15)
        ;
        if(Auth::user()->tipo == "responsavel" || Auth::user()->tipo == "administrador"){
            $usuario = Auth::user()->responsaveis()->first();
            $veruser = 1;
            if(Auth::user()->tipo == "administrador"){
                $usuario = Auth::user()->first();
            }
        }
        else{
            $usuario = Auth::user()->first();
            $veruser = 0;
        }
        return view('vagas.minhasVagas', ['vagas' => $vagas, 'usuario' => $usuario, 'veruser' => $veruser]);
    }
    public function candidatos($id){

        $candidatos = Cadastra::where('vagas_id', $id)
            ->join('vagas', 'cadastra.vagas_id', 'vagas.id')
            ->join('egresso', 'cadastra.egresso_id', 'egresso.id')
            ->join('users', 'egresso.users_id', 'users.id')
            ->select('users.name as name', 'users.email as email')
            ->orderBy('users.name')
            ->paginate(20)
            ;
        if(Auth::user()->tipo == "responsavel" || Auth::user()->tipo == "administrador"){
            $usuario = Auth::user()->responsaveis()->first();
            $veruser = 1;
            if(Auth::user()->tipo == "administrador"){
                $usuario = Auth::user()->first();
            }
        }
        else{
            $usuario = Auth::user()->first();
            $veruser = 0;
        }
        return view('vagas.candidatos', ['candidatos' => $candidatos, 'usuario' => $usuario, 'veruser' => $veruser]);
    }
}
