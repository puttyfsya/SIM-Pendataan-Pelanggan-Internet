<?php

defined('BASEPATH') or exit('No direct script access allowed');

// if (! function_exists('env')) {
// 	function env($key)
// 	{
// 		$env = parse_ini_file(str_replace("/api", "", str_replace("\api", "", FCPATH)) . ".env.production");

// 		return $env[$key];
// 	}
// }

if (!function_exists('cdn_url')) {
    function cdn_url($url = '')
    {
        return env('cdn_url').$url;
    }
}
