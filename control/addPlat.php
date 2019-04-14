<?php

chdir('..');
include_once 'services/PlatService.php';
extract($_POST);

$ps = new PlatService();
$ps->create(new Plat($nom,$description,$prix,$photo));


header('Content-type: application/json');
echo json_encode($ps->findAll());

