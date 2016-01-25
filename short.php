<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 25.11.2015
 * Time: 18:53
 */
require( __DIR__ . '/data/functions.php');
$longUrl = $_GET['url'];
try{
    $pdo = DbConnect();
}
catch (\PDOException $e) {
    trigger_error("Data base connection Error!");
    exit;
}
try{
    $shortUrl = insertUrl($longUrl,$pdo);
    echo SITE_NAME.$shortUrl;
}
catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}