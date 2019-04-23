<?php

namespace bytebee;

class ApiHUBSoft {
    
    //Retorna autorização para requisições via API no software HUBSoft
    private static function getAuth() {
        $config = require 'config.php';
        $uri = '/oauth/token';
        
        //Headers da requisição
        $headers = array('Accept' => 'application/json');
        $body = array(
            "grant_type"    => "password",
            "client_id"     => $config['client_id'],
            "client_secret" => $config['client_secret'],
            "username"      => $config['username'],
            "password"      => $config['password']
        );
        
        //Executa requisição
        $response = \Unirest\Request::post($config['host'] . $uri, $headers, $body);
        
        return $response->body->access_token;
    }
    
    public static function getService($search) {
        $config = require 'config.php';
        $uri = "/api/v1/integracao/cliente?busca=cpf_cnpj&termo_busca={$search}";
        $auth = 'Bearer '.self::getAuth();
        
        //Headers da requisição
        $headers = array('Authorization' => $auth);
        
        //Executa requisição
        $response = \Unirest\Request::get($config['host'].$uri, $headers);
        
        return $response->body;
    }

}
