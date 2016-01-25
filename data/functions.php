<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 25.11.2015
 * Time: 13:39
 */
require('config.php');

function DbConnect(){
    return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
}
/**
 * Creating short url
 */

function insertUrl($longUrl,$pdo){
    if($shotUrl = isUrlDbExist($longUrl,$pdo)){
        return $shotUrl;
    }
    $shortCode = genShortCode(getLastId($pdo));
    $table = TAB_NAME;
    $q=$pdo->prepare("INSERT INTO {$table}(short_url, long_url) VALUES ('{$shortCode}', '{$longUrl}')");
    $q->execute();
    return $shortCode;
}
/*
function checkValidUrl($longUrl){
    $ch = curl_init($longUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_exec($ch);
    $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($response == '404') {
        throw new \Exception("Error URL is not valid!");
    }
    return (!empty($response)&&$response !== '404');
}
*/
function isUrlDbExist($longUrl,$pdo){
        $table = TAB_NAME;
        $query = "SELECT short_url FROM  {$table}
             WHERE long_url = :long_url LIMIT 1";
        $q = $pdo->prepare($query);
        $q->execute(array("long_url" => $longUrl));
        if($result = $q->fetch()){
          return $result[0];
        };
        return false;
}

function getLastId($pdo){
    $table = TAB_NAME;
    $query = "SELECT max(id) FROM  {$table}";
    $q = $pdo->query($query);
    if($lastId = $q->fetch()){
        return $lastId[0];
    };
    return false;
}

function genShortCode($lastId) {
    $number = $lastId +1;
    $out   = "";
    $codes = "abcdefghjkmnpqrstuvwxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ";

    while ($number > 53) {
        $key    = $number % 54;
        $number = floor($number / 54) - 1;
        $out    = $codes{$key}.$out;
    }

    return $codes{$number}.$out;
}

/**
 * Get long url from db to redirect
 */
function getUrl($shortCode,$pdo){
    $site=SITE_NAME;
    if(!isShortCodeValid($shortCode)){
        throw new \Exception("Error URL is not valid!");
    }
    if(!($longUrl = isShortCodeExist($shortCode,$pdo))){
        throw new \Exception("404 Error page not found - the page {$site}{$shortCode} does not exist!");
    }
        return $longUrl;
}

function isShortCodeValid($shortCode){
    if(preg_match('|^[0-9a-zA-Z]{1,6}$|', $shortCode)){
        return true;
    }
}

function isShortCodeExist($shortCode,$pdo){
    $table = TAB_NAME;
    $query = "SELECT long_url FROM  {$table}
             WHERE short_url = '{$shortCode}' LIMIT 1";
    $q = $pdo->prepare($query);
    $q->execute();
    if(!($result = $q->fetch())){
        return false;
    }
        return $result[0];
}