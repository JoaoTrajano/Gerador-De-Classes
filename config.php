<?php

    $http = 'https';

    if($_SERVER['HTTP_HOST'] == 'localhost') {
        $plataforma = "plataforma/";
        $http = 'http';
    }

    define('URL_DOMINIO', ''.$http.'://'.$_SERVER['HTTP_HOST'].'/'.$plataforma.'');
?>