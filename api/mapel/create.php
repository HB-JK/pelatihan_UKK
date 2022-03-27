<?php 

$data = json_decode(file_get_contents("php://input"));
$file = json_decode(file_get_contents('../../data/mapel.json'));
$id_mapel = end($file)->id_mapel + 1;

$data->id_mapel = $id_mapel;

array_push($file,$data);

$final = json_encode($file, JSON_PRETTY_PRINT);
file_put_contents('../../data/mapel.json', $final);

echo json_encode(['message' => 'Data Berhasil dimasukkan']);