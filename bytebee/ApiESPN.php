<?php

namespace bytebee;

class ApiESPN {

    public static function redrectPlay($level, $tokenLogin) {
        $config = require 'config.php';

        switch($level):
            case 'full':
                $uri = "{$config['host_espn']}/full_player?token={$config['token_espn']}&login_token={$tokenLogin}";
                return Header("Location: {$uri}");
            case 'light':
                $uri = "{$config['host_espn']}/light_player?token={$config['token_espn']}&login_token={$tokenLogin}";
                return Header("Location: {$uri}");
            case 'broadband':
                $uri = "{$config['host_espn']}/broadband_player?token={$config['token_espn']}&login_token={$tokenLogin}";
                return Header("Location: {$uri}");
        endswitch;
    }

}
