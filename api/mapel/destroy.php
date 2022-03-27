<?php 
$id_mapel = $_GET['id_mapel'];
$file = json_decode(file_get_contents("../../data/mapel.json"));
$i = 0;

foreach($file as $mapel){
	if($mapel->id_mapel == $id_mapel){
		array_splice($file, $i, 1);
	}
	$i++;
}

file_put_contents("../../data/mapel.json", json_encode($file, JSON_PRETTY_PRINT));

echo json_encode(["message" => "Data berhasil dihapus"]);