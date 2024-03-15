<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

// $web_env = parse_ini_file(str_replace("\api", "", str_replace("/api", "", FCPATH)).".env.production");

$config['api_url'] = env('api_url');
$config['api_cdn'] = env('api_cdn');
$config['api_key'] = env('api_key');
$config['api_expired'] = env('api_expired');
$config['rajaongkir_url'] = env('rajaongkir_url');
$config['rajaongkir_key'] = env('rajaongkir_key');

$config['gosend_url'] = env('gosend_url');
$config['gosend_client'] = env('gosend_Client-ID');
$config['gosend_key'] = env('gosend_Pass-Key');

$config['email_form'] = "";