<?php
function db_connect() {
    $db = new PDO('mysql:host=localhost;dbname=movie_base;charset=utf8', 'root', 'rootroot');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}