<?php 
	include '../conn.php';
	$action = $_POST['action'];

	if($action == 'save'){
		$nama_mapel = $_POST['nama_mapel'];
		$id_guru = $_POST['id_guru'];
		$id_kelas = $_POST['id_kelas'];
		$id_jurusan = $_POST['id_jurusan'];

		$sql = "INSERT INTO tbmapel(nama_mapel, id_guru, id_kelas, id_jurusan) VALUES('$nama_mapel', $id_guru, $id_kelas, $id_jurusan)";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');

	}else if($action == 'update'){
		$id_mapel = $_POST['id_mapel'];
		$nama_mapel = $_POST['nama_mapel'];
		$id_guru = $_POST['id_guru'];
		$id_kelas = $_POST['id_kelas'];
		$id_jurusan = $_POST['id_jurusan'];

		$sql = "UPDATE tbmapel SET nama_mapel='$nama_mapel', id_guru=$id_guru, id_kelas=$id_kelas, id_jurusan=$id_jurusan WHERE id_mapel=$id_mapel";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');
	}else{
		$id_mapel = $_POST['id_mapel'];

		$sql = "DELETE FROM tbmapel WHERE id_mapel='$id_mapel'";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');
	}
 ?>