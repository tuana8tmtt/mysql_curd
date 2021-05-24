<?php
require_once 'class/curd.php';
$db = new DB();
$array= array(
    'where' => array(
        id=>1
    )
);
print_r($db->getRows('nhan_vien', $array));