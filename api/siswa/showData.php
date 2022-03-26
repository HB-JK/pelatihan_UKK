<?php 
$siswa = json_decode(file_get_contents('../../data/siswa.json'));
$fileJurusan = json_decode(file_get_contents('../../data/jurusan.json'));
$fileKelas = json_decode(file_get_contents('../../data/kelas.json'));
$nama_kelas = '';
$nama_jurusan = '';
?>

<table class="table">
	<thead>
		<th>No.</th>
		<th>NIS</th>
		<th>nama</th>
		<th>kelas</th>
		<th>jurusan</th>
		<th>jenis kelamin</th>
		<th>tempat, tanggal lahir</th>
		<th>nama</th>
	</thead>
	<tbody>
	<?php 
		foreach($siswa as $key => $value){
			foreach($fileKelas as $kelas){
				if($siswa[$key]->id_kelas == $kelas->id_kelas){
					$nama_kelas = $kelas->nama_kelas;
				}
			}

			foreach($fileJurusan as $jurusan){
				if($siswa[$key]->id_jurusan == $jurusan->id_jurusan){
					$nama_jurusan = $jurusan->nama_jurusan;
				}
			}
			$ttl = $siswa[$key]->tempat_lahir. ', '. date('j M Y', strtotime($siswa[$key]->tanggal_lahir));
	?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $siswa[$key]->nis ?></td>
			<td><?= $siswa[$key]->nama ?></td>
			<td><?= $nama_kelas ?></td>
			<td><?= $nama_jurusan ?></td>
			<td><?= $siswa[$key]->jenis_kelamin ?></td>
			<td><?= $ttl ?></td>
			<td>
				<button onclick="findSiswa('<?= $siswa[$key]->nis ?>')" class="btn btn-warning">Edit</button>
				<button onclick="del('<?= $siswa[$key]->nis ?>')" class="btn btn-danger">Delete</button>
			</td>
		</tr>
	<?php 
		}
	 ?>
	</tbody>
</table>