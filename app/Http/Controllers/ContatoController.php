<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

       // $contato = new SiteContato(); 
       // $contato->nome = $request->input('nome');
       // $contato->telefone = $request->input('telefone');
       // $contato->email = $request->input('email');
      //  $contato->motivo_contato = $request->input('motivo_contato');
      //  $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        //$contato->save(); 

        //var_dump($_POST);
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        
        //realizar validação
        $request->validate([
            'nome' =>'required|min:3|max:40|unique:site_contatos',
            'telefone' =>'required|max:11',
            'email' =>'email',
            'motivo_contatos_id' =>'required',
            'mensagem' =>'required|max:2000'
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O nome deve ter no maximo 40 caracteres',
            'nome.unique' => 'O nome informa já está em uso',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.email' => 'O campo email precisa ser preenchido',
            'motivo_contatos_id.required' => 'Selecione um assunto',
            'mensagem.required' => 'Insira sua mensagem'
        ]
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
