<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EgressosController extends Controller
{
    public function index() {
    	$egressos = DB::table('output')->get();
    	return view('egressos.index',['egressos' => $egressos]);
    }

}
