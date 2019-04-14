<?php

chdir('..');
include_once 'services/PlatService.php';
extract($_POST);

$ps = new PlatService();
$ps->delete($ps->findById($id));

header('Content-type: application/json');
echo json_encode($ps->findAll());

