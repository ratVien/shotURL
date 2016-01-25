<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 26.11.2015
 * Time: 23:11
 */

require( __DIR__ . '/data/functions.php');
$shortCode = $_GET['l'];
try{
    $pdo = DbConnect();
}
catch (\PDOException $e) {
    trigger_error("Data base connection Error!");
    exit;
}
try{
    $longUrl = getUrl($shortCode,$pdo);
    header('Location: ' .$longUrl);
    }
catch(\Exception $e){
    echo $e->getMessage();
    exit;
}
