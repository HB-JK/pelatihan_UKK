<?php 
$nis = $_GET['nis'];

$file = json_decode(file_get_contents('../../data/siswa.json'));
$data = [];

foreach($file as $siswa){
	if($siswa->nis == $nis){
		$data = [
			"nis" => $siswa->nis,
			"nama" => $siswa->nama,
			"id_kelas" => $siswa->id_kelas,
			"id_jurusan" => $siswa->id_jurusan,
			"jenis_kelamin" => $siswa->jenis_kelamin,
			"tempat_lahir" => $siswa->tempat_lahir,
			"tanggal_lahir" => $siswa->tanggal_lahir
		];
	}
}

echo json_encode($data);