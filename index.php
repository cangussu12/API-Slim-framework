<?php

use \Psr\http\Message\ServerRequestInterface as Request; 
use \Psr\http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

/*
$app->get('/postagens', function(Request $request, Response $response) {

    /*escreve no corpo da resposta utilizando o padrao PSR7
    $response->getBody()->write("Listagem de postagens");

    return $response;

});
*/

/*Tipos de requisição ou verbos HTTP

get-> Recuperar recursos do servidor ( select )
post -> Cria um dado no servidor ( Insert )
put -. Atualizar dados no servidor ( Update )
delete-> Deletar dados do servidor ( delete )

*/

//put delete
$app->delete('/usuarios/remove/{id}', function(Request $request, Response $response) {

    //deletar do banco de dados com delete...
    $id = $request->getAttribute('id');

    return $response->getBody()->write( "Sucesso ao deletar: ". $id );

});

//put atualizar
$app->put('/usuarios/atualiza', function(Request $request, Response $response) {

    //recupera post ( $_POST )
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];
    return $response->getBody()->write( "Sucesso ao atualizar: ". $id );

});

//post inserir
$app->post('/usuarios/adiciona', function(Request $request, Response $response) {

    //recupera post ( $_POST )
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];
    return $response->getBody()->write( $nome . " - ". $email );

});

$app->run();


/*
$app->get('/usuarios[/{id}]', function($request, $response){

    $id = $request->getAttribute('id');
    echo "lista de usuarios ou ID: ".$id;
});

$app->get('/postagens[/{mes}[/{ano}]]', function($request, $response){

    $mes = $request->getAttribute('mes');
    $ano = $request->getAttribute('ano');
    echo "lista de postagens: ".$mes .'/'.$ano;
});

$app->get('/lista/{itens:.*}', function($request, $response){

    $itens = $request->getAttribute('itens');
    var_dump(explode("/", $itens));

});

$app->get('/blog/postagens/{id}', function($request, $response){


    echo "listar postagem para um ID:";

})->setName("blog");

$app->get('/meusite', function($request, $response){

    $retorno = $this->get("router")->pathFor("blog", ["id"=> "5"]);

    echo $retorno;
});

/*agrupar rotas */
/*
$app->group('/v1', function() {

    $this->get('/usuarios', function() {
        echo "listagem de usuarios";
    });
    
    $this->get('/postagens', function() {
        echo "listagem de postagens";
    });


});

*/

