<?php 

$data = json_decode(file_get_contents("php://input"));
$fileSiswa = json_decode(file_get_contents("../../data/siswa.json"));

foreach($fileSiswa as $siswa){
	if($siswa->nis == $data->nis){
		$siswa->nama = $data->nama;
		$siswa->id_kelas = $data->id_kelas;
		$siswa->id_jurusan = $data->id_jurusan;
		$siswa->jenis_kelamin = $data->jenis_kelamin;
		$siswa->tempat_lahir = $data->tempat_lahir;
		$siswa->tanggal_lahir = $data->tanggal_lahir;
	}
}

file_put_contents('../../data/siswa.json', json_encode($fileSiswa, JSON_PRETTY_PRINT));

echo json_encode(['message' => "data berhasil di update"]);