<?php 
$mapel = json_decode(file_get_contents('../../data/mapel.json'));
$fileJurusan = json_decode(file_get_contents('../../data/jurusan.json'));
$fileKelas = json_decode(file_get_contents('../../data/kelas.json'));
$fileGuru = json_decode(file_get_contents('../../data/guru.json'));
$nama_kelas = '';
$nama_jurusan = '';
$nama_guru = '';
?>

<table class="table">
	<thead>
		<th>No.</th>
		<th>Mata pelajaran</th>
		<th>kelas</th>
		<th>jurusan</th>
		<th>Guru</th>
		<th>action</th>
	</thead>
	<tbody>
	<?php 
		foreach($mapel as $key => $value){
			foreach($fileKelas as $kelas){
				if($mapel[$key]->id_kelas == $kelas->id_kelas){
					$nama_kelas = $kelas->nama_kelas;
				}
			}

			foreach($fileJurusan as $jurusan){
				if($mapel[$key]->id_jurusan == $jurusan->id_jurusan){
					$nama_jurusan = $jurusan->nama_jurusan;
				}
			}

			foreach($fileGuru as $guru){
				if($mapel[$key]->id_guru == $guru->id_guru){
					$nama_guru = $guru->nama_guru;
				}
			}
	?>
		<tr>
			<td><?= $key + 1 ?></td>
			<td><?= $mapel[$key]->nama_mapel ?></td>
			<td><?= $nama_kelas ?></td>
			<td><?= $nama_jurusan ?></td>
			<td><?= $nama_guru ?></td>
			<td>
				<button onclick="findData('<?= $mapel[$key]->id_mapel ?>')" class="btn btn-warning">Edit</button>
				<button onclick="del('<?= $mapel[$key]->id_mapel ?>')" class="btn btn-danger">Delete</button>
			</td>
		</tr>
	<?php 
		}
	 ?>
	</tbody>
</table>