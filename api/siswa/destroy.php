<?php 
$nis = $_GET['nis'];
$file = json_decode(file_get_contents("../../data/siswa.json"));
$i = 0;

foreach($file as $siswa){
	if($siswa->nis == $nis){
		array_splice($file, $i, 1);
	}
	$i++;
}

file_put_contents("../../data/siswa.json", json_encode($file, JSON_PRETTY_PRINT));

echo json_encode(["message" => "Data berhasil dihapus"]);