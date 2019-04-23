<?php

include './vendor/autoload.php';

//Recebe informações do formulário
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Recebe token da ESPN
if(!isset($_SESSION)) {
    session_start();
}
$token = $_SESSION['token'];

$t = bytebee\ApiHUBSoft::getService($login);

if(count($t->clientes) > 0) {

    foreach($t->clientes[0]->servicos as $serv) {
        if(strcmp($serv->nome, 'ESPN PLAY - FULL') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                return Header("Location: /login?erro=Senha incorreta");
            }
            bytebee\ApiESPN::redrectPlay('full', $token);
            break;
        }

        if(strcmp($serv->nome, 'ESPN PLAY - LIGHT') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                return Header("Location: /login?erro=Senha incorreta");
            }
            bytebee\ApiESPN::redrectPlay('light', $token);
            break;
        }

        if(strcmp($serv->nome, 'ESPN PLAY - BROADBAND') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                return Header("Location: /login?erro=Senha incorreta");
            }
            bytebee\ApiESPN::redrectPlay('broadband', $token);
            break;
        } else {
            return Header("Location: /login?erro=Serviço não habilitado");
        }
    }
} else {
    return Header("Location: /login?erro=Usuário não encontrado");
}