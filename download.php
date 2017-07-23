<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/23/2017
 * Time: 10:56 AM
 */
    session_start();
    $file = $_SESSION['file'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=Insta-down-'.rand(1,9999).".$ext");
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    readfile($file);