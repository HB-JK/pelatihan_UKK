<?php 
	include '../conn.php';

	$sql = "select tbmapel.*, tbguru.nama_guru, tbjurusan.nama_jurusan, tbkelas.nama_kelas from tbmapel left join tbkelas on tbmapel.id_kelas=tbkelas.id_kelas left join tbjurusan on tbmapel.id_jurusan=tbjurusan.id_jurusan left join tbguru on tbmapel.id_guru=tbguru.id_guru";
	$q = mysqli_query($conn, $sql);
	$i = 1;

?>
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Mata pelajaran</th>
			<th>Nama Guru</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
<?php 
	while($res = mysqli_fetch_array($q)){
		$id_mapel = $res['id_mapel'];
		$nama_mapel = $res['nama_mapel'];
		$nama_kelas = $res['nama_kelas'];
		$id_kelas = $res['id_kelas'];
		$nama_jurusan = $res['nama_jurusan'];
		$id_jurusan = $res['id_jurusan'];
		$nama_guru = $res['nama_guru'];
		$id_guru = $res['id_guru'];
?>
		
		<tr>
			<td><?= $i ?></td>
			<td><?= $nama_mapel ?></td>
			<td><?= $nama_guru ?></td>
			<td><?= $nama_kelas ?></td>
			<td><?= $nama_jurusan ?></td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" value="<?= $id_mapel ?>" name="id_mapel">
					<button class="btn btn-primary" name="edit">Edit</button>
				</form>
			</td>
			<td>
				<form action="action.php" method="post">
					<input type="hidden" value="<?= $id_mapel ?>" name="id_mapel">
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