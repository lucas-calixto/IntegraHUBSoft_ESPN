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

    $activeService = false;

    foreach($t->clientes[0]->servicos as $serv) {

        if(strcmp($serv->nome, 'ESPN PLAY - FULL') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                Header("Location: /login.php?erro=Senha incorreta");
                return;
            }
            $activeService = true;
            bytebee\ApiESPN::redrectPlay('full', $token);
            break;
        } elseif(strcmp($serv->nome, 'ESPN PLAY - LIGHT') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                Header("Location: /login.php?erro=Senha incorreta");
                return;
            }
            $activeService = true;
            bytebee\ApiESPN::redrectPlay('light', $token);
            break;
        } elseif(strcmp($serv->nome, 'ESPN PLAY - BROADBAND') == 0) {
            if(strcmp($serv->senha, $password) != 0) {
                Header("Location: /login.php?erro=Senha incorreta");
                return;
            }
            $activeService = true;
            bytebee\ApiESPN::redrectPlay('broadband', $token);
            break;
        }
    }

    if(!$activeService) {
        return Header("Location: /login.php?erro=Serviço não habilitado");
    }
} else {
    return Header("Location: /login.php?erro=Usuário não encontrado");
}