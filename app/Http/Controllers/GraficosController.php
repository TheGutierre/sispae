<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use DB;
use View;

class GraficosController extends Controller
{
    public function index() {
    	$adm = DB::table('output')->where('CURSO','=','ADMINISTRAÇÃO')->count();
    	$direito = DB::table('output')->where('CURSO','=','DIREITO')->count();
    	$contabeis = DB::table('output')->where('CURSO','=','CIÊNCIAS CONTÁBEIS')->count();
    	$gestao = DB::table('output')->where('CURSO','=','GESTÃO COMERCIAL')->count();
    	$sistemas = DB::table('output')->where('CURSO','=','SISTEMAS DE INFORMAÇÃO')->count();
    	$numeros = array();
    	$numeros['adm'] = $adm;
    	$numeros['dir'] = $direito;
    	$numeros['cont'] = $contabeis;
    	$numeros['gest'] = $gestao;
    	$numeros['sis'] = $sistemas;
    	
    	return view('graficos.porcurso',$numeros);
    }

    public function porregiao() {

        // try {
        //   $response = $fb->get('/me?fields=id,name,email', 'user-access-token');
        // } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        //   dd($e->getMessage());
        // }

        // $userNode = $response->getGraphUser();
        // return $userNode->getName();

         // Mapper::map(53.381128999999990000, -1.470085000000040000);

        Mapper::map(-7.51666,-46.03333);

        // Mapper::location('Balsas, Maranhão');
        // Mapper::location('Paris')->map(['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);        
        return view('graficos.porregiao');
            // return view('map');


        // $adm = DB::table('output')->where('CURSO','=','ADMINISTRAO')->count();
        // $direito = DB::table('output')->where('CURSO','=','DIREITO')->count();
        // $contabeis = DB::table('output')->where('CURSO','=','CINCIAS CONTBEIS')->count();
        // $gestao = DB::table('output')->where('CURSO','=','GESTO COMERCIAL')->count();
        // $sistemas = DB::table('output')->where('CURSO','=','SISTEMAS DE INFORMAO')->count();
        // $numeros = array();
        // $numeros['adm'] = $adm;
        // $numeros['dir'] = $direito;
        // $numeros['cont'] = $contabeis;
        // $numeros['gest'] = $gestao;
        // $numeros['sis'] = $sistemas;
    
        // return view('adminlte::graficos',$numeros);
    }
}
