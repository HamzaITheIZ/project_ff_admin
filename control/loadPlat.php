<?php

chdir('..');
include_once 'services/PlatService.php';
extract($_POST);

$ps = new PlatService();
header('Content-type: application/json');
echo json_encode($ps->findByIdApi($id));
