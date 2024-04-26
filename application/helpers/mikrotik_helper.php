<?php

defined('BASEPATH') or exit('No direct script access allowed');

function formatBytes($bytes, $decimal = null)
{
    $satuan = ["bytes", 'kb', 'mb', 'gb', 'tb'];
    $i = 0;

    while ($bytes > 1024) {
        $bytes /= 1024;
        $i++;
    }

    return round($bytes, $decimal) . " " . $satuan[$i];
}

function connect()
{
    $api = new RouterosAPI();
    $api->connect(env('ipmikrotik'), env('usernamemikrotik'), env('passwordmikrotik'));

    if (count($api->comm('/ppp/secret/print')) == 0) {
        echo json_encode("Connection Failed");
        exit;
    }

    return $api;
}
