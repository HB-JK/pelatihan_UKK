<?php 

$data = json_decode(file_get_contents("php://input"));
$fileMapel = json_decode(file_get_contents("../../data/mapel.json"));

foreach($fileMapel as $mapel){
	if($mapel->id_mapel == $data->id_mapel){
		$mapel->nama_mapel = $data->nama_mapel;
		$mapel->id_kelas = $data->id_kelas;
		$mapel->id_jurusan = $data->id_jurusan;
		$mapel->id_guru = $data->id_guru;
	}
}

file_put_contents('../../data/mapel.json', json_encode($fileMapel, JSON_PRETTY_PRINT));

echo json_encode(['message' => "data berhasil di update"]);