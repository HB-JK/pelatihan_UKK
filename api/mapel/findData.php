<?php 
$id_mapel = $_GET['id_mapel'];

$file = json_decode(file_get_contents('../../data/mapel.json'));
$data = [];

foreach($file as $mapel){
	if($mapel->id_mapel == $id_mapel){
		$data = [
			"id_mapel" => $mapel->id_mapel,
			"nama_mapel" => $mapel->nama_mapel,
			"id_kelas" => $mapel->id_kelas,
			"id_jurusan" => $mapel->id_jurusan,
			"id_guru" => $mapel->id_guru,
		];
	}
}

echo json_encode($data);