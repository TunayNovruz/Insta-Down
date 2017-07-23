<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/23/2017
 * Time: 11:13 PM
 */
//echo "<hr> <pre>";
//echo $_SERVER['REQUEST_URI'];
$url = explode('/',trim($_SERVER['REQUEST_URI']));
//echo "<br>";
//print_r($url);
switch ($url[1]){
    case 'how':
        include 'how.php';
        break;
    case 'elaqe':
        include 'elaqe.php';
        break;
    default:
        include '404.php';
        break;
}