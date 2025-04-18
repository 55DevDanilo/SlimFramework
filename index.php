<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

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


$app->run();



?>