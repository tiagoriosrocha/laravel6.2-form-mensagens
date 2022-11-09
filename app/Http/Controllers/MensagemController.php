<?php

namespace App\Http\Controllers;

//faço a importação da classe Request, que recebe todos os dados do formulário
use Illuminate\Http\Request;

//faço a importação da classe que faz a validação dos dados
use \Illuminate\Support\Facades\Validator; 

//faço a importação do Model
use App\Mensagem; 

class MensagemController extends Controller
{
    
    /**
     * MÉTODO CARREGARFORMULARIO
     * rota "/"
     * Este método retorna o formulário e exibe as mensagens já existentes
     */
    function carregarFormulario(){
        //carrega as mensagens do banco
        $listaMensagens = Mensagem::all();

        //retorna o formulário
        return view("formulario",["listaMensagens" => $listaMensagens]); 
    }


    /**
     * MÉTODO SALVARNOVAMENSAGEM
     * rota "/salvarmensagem"
     * Este método recebe os dados de uma nova mensagem
     * valida os dados e salva no banco de dados
     * depois retorna uma mensagem de sucesso ou erro chamando
     * a rota "/" (que recarrega novamente o formulário com as mensagens)
     */
    function salvarNovaMensagem(Request $request){
        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título da mensagem',
            'autor.required' => 'É obrigatório um autor da mensagem',
            'texto.required' => 'É obrigatório um texto da mensagem',
        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:50',
            'texto' => 'required|string',
        );

        //cria o objeto de validação passando por parâmetro
        //os dados do formulário, as regras de validação
        //e as mensagens de erro
        //o retorno da validação será armazenado na variável $validador
        $validador = Validator::make($request->all(), $regras, $messages);

        //se houve falhas na validação dos dados
        //ele redireciona o usuário de volta para o formulário
        //exibindo as mensagens de erros
        //e enviando de volta os dados já preenchidos
        if ($validador->fails()) {
            return redirect("/")
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, cria um objeto
        //da classe mensagem e salva no banco de dados
        $umObjetoMensagem = new Mensagem();
        $umObjetoMensagem->titulo = $request['titulo'];
        $umObjetoMensagem->autor = $request['autor'];
        $umObjetoMensagem->texto = $request['texto'];
        $umObjetoMensagem->save();

        //se tudo deu certo, redireciona o usuário para a 
        //rota "/" e envia junto uma mensagem de sucesso
        return redirect("/")->with('success', 'Mensagem criada com sucesso!!');
    }
}
