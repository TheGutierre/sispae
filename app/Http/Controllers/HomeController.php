<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Mensagem;
use Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function enviarMensagem(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|min:5',
            'mensagem' => 'required|min:5'
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $msg = Mensagem::create($request->all());
        return redirect()->back()->with('success', ['Sua mensagem foi enviada, em breve retornaremos seu contato! Obrigado!']);
    }
}