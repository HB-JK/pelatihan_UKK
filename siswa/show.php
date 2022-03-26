<?php 
	include '../conn.php';

	$sql = "select tbsiswa.*, tbjurusan.nama_jurusan, tbkelas.nama_kelas from tbsiswa left join tbkelas on tbsiswa.id_kelas=tbkelas.id_kelas left join tbjurusan on tbsiswa.id_jurusan=tbjurusan.id_jurusan";
	$qsiswa = mysqli_query($conn, $sql);
	$i = 1;

?>
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Jenis Kelamin</th>
			<th>Tempat, tanggal tempat_lahir</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
<?php 
	while($res = mysqli_fetch_array($qsiswa)){
		$nis = $res['nis'];
		$nama = $res['nama'];
		$nama_kelas = $res['nama_kelas'];
		$id_kelas = $res['id_kelas'];
		$nama_jurusan = $res['nama_jurusan'];
		$id_jurusan = $res['id_jurusan'];
		$jenis_kelamin = $res['jenis_kelamin'];
		$tempat_lahir = $res['tempat_lahir'];
		$tanggal_lahir = date("j M Y", strtotime($res['tanggal_lahir']));
		$ttl = $tempat_lahir.', '.$tanggal_lahir;
?>
		
		<tr>
			<td><?= $i ?></td>
			<td><?= $nis ?></td>
			<td><?= $nama ?></td>
			<td><?= $nama_kelas ?></td>
			<td><?= $nama_jurusan ?></td>
			<td><?= $jenis_kelamin ?></td>
			<td><?= $ttl ?></td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" value="<?= $nis ?>" name="nis">
					<button class="btn btn-primary" name="edit">Edit</button>
				</form>
			</td>
			<td>
				<form action="action.php" method="post">
					<input type="hidden" value="<?= $nis ?>" name="nis">
					<button class="btn btn-danger" value="delete" name="action">Delete</button>
				</form>
			</td>
		</tr>
<?php 
		$i+=1;
	}
 ?>
	</tbody>
</table>