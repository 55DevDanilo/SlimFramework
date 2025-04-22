<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'vendor/autoload.php';

$app = new \Slim\App(
    [
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]
);

class Servico {}

//$servico = new Servico;

/*container pimple*/

$conatainer = $app->getContainer();
$conatainer['servico'] = function () {
    return new Servico;
};

$app->get('/servico', function (Request $request, Response $response) {
    $servico = $this->get('servico');
    var_dump($servico);
});


/*Controllers como serviço*/
$conatainer = $app->getContainer();
$conatainer['home'] = function () {
    return new  MyApp\controllers\Home(
        new MyApp\View
    );
};

$app->get('/usuario', '\MyApp\controllers\home:index');
$app->run();
/*///Padrão PSR7
$app->get('/postagens', function (Request $request,Response $response) {
    $response->getBody()->write("lista de postagens : Teste PSR7");
    //echo "lista de postagens :";
    return $response;
});
/*
$app->delete('/usuarios/remove/{id}', function (Request $request,Response $response) {

   $id = $request->getAttribute('id');

    return $response->getBody()->write('sucesso no delete '.$id );
    
   
});


$app->put('/usuarios/atualiza', function (Request $request,Response $response) {

    //recuperação do post 
    $post = $request->getParsedBody();
    $id =$post['id'];
    $nome =$post['nome'];
    $email= $post['email'];

    return $response->getBody()->write('sucesso ao atualizar '.$id );
    
   
});


$app->post('/usuarios/adiciona', function (Request $request,Response $response) {

    //recuperação do post 
    $post = $request->getParsedBody();
    $nome =$post['nome'];
    $email= $post['email'];

    return $response->getBody()->write($nome.' - '.$email);
    
    return $response;
});
*/


/*
$app->get('/postagens[/{ano}[/{mes}]]', function ($request, $response) {
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');
    echo "lista de postagen Ano:" . $ano . "mes : " . $mes;
});


$app->get('/usuarios[/{id}]', function ($request, $response) {
    $id = $request->getAttribute('id');
    echo "lista de usuarios ou ID: " . $id;
});

$app->get('/lista/{itens:.*}', function ($request, $response) {
    $itens = $request->getAttribute('itens');


    var_dump(explode("/", $itens));
});
//nomear rotas
$app->get('/blog/postagens/{id}', function ($request, $response) {



    echo "listar postagem para um  ID: ";
})->setName("blog");

$app->get('/meusite', function ($request, $response) {



    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);

    echo $retorno;
});
$app->get('/meusite', function ($request, $response) {



    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);

    echo $retorno;
});


//agrupar rotas
$app->get('/v1', function () {

    $this->get('//usuarios', function () {

        echo "listagem de usuários";
    });

    $this->get('/v2/postagens', function () {

        echo "listagem de postagens";
    });
});

*/
