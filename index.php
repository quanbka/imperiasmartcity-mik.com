<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$origin_link = str_replace( 'http://imperiasmartcity-mik.test/', 'http://imperiasmartcitytaymo.vn/', "$actual_link");
$origin_link = preg_replace("/\?(.*)/", "", $origin_link);
// print_r($actual_link);
// print_r($origin_link);
// print_r(( $_SERVER['REQUEST_URI'] ));
$array = (explode("/", $_SERVER['REQUEST_URI']));
unset($array[count($array) - 1]);
$path = join("/", $array);
$path = ltrim( $path, "/");
echo ("mkdir -p '$path'");
echo exec("mkdir -p '$path'");
chdir($path);
echo getcwd() . "\n";
echo exec("wget '$origin_link'");
die;
