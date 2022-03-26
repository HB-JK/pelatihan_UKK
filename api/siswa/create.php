<?php 

$data = json_decode(file_get_contents("php://input"));
$file = json_decode(file_get_contents('../../data/siswa.json'));

foreach($file as $siswa){
	if($siswa->nis == $data->nis){
		echo json_encode(['message' => 'NIS sudah terdaftar']);
		return;
	}
}

array_push($file,$data);

$final = json_encode($file, JSON_PRETTY_PRINT);
file_put_contents('../../data/siswa.json', $final);

echo json_encode(['message' => 'Berhasil']);