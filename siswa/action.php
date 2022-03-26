<?php 
	include '../conn.php';
	$action = $_POST['action'];

	if($action == 'save'){
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$id_kelas = $_POST['id_kelas'];
		$id_jurusan = $_POST['id_jurusan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];

		$sql = "INSERT INTO tbsiswa(nis, nama, id_kelas, id_jurusan, jenis_kelamin, tempat_lahir, tanggal_lahir) VALUES('$nis', '$nama', '$id_kelas', '$id_jurusan', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir')";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');

	}else if($action == 'update'){
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$id_kelas = $_POST['id_kelas'];
		$id_jurusan = $_POST['id_jurusan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];

		$sql = "UPDATE tbsiswa SET nama='$nama', id_kelas='$id_kelas', id_jurusan='$id_jurusan', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir' WHERE nis='$nis'";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');
	}else{
		$nis = $_POST['nis'];

		$sql = "DELETE FROM tbsiswa WHERE nis='$nis'";
		$q = mysqli_query($conn, $sql);

		header('location: index.php');
	}
 ?>