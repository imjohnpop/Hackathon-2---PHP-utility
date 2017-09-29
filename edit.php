<?php
require_once 'db.php';
require 'genre.php';
require 'category.php';
require 'brand.php';
$db = db_connect();

$stmt = $db->prepare('SELECT * FROM watches WHERE id = ?');
$stmt->execute([$_GET['id']]);

$watches = $stmt->fetch();

echo build_form($watches['id'], $watches['name'], $watches['category'], $watches['gender'], $watches['details'], $watches['price']);