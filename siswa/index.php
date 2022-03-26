<?php 
$fileKelas = json_decode(file_get_contents('../data/kelas.json'));
$fileJurusan = json_decode(file_get_contents('../data/jurusan.json'));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<body onload="showData()">
	<div class="container my-5">
		<a href="../index.php" class="btn btn-danger mb-2">Back</a>
		<h2>CRUD siswa</h2>
		<div id="form" class="col-3 my-2">

		  <div class="mb-3">
		    <label for="nis" class="form-label">NIS</label>
		    <input type="text" name="nis" class="form-control" id="nis">
		  </div>

		  <div class="mb-3">
		    <label for="nama" class="form-label">Nama siswa</label>
		    <input type="text" name="nama" class="form-control" id="nama">
		  </div>

		  <div class="mb-3">
		    <label for="id_kelas" class="form-label">Kelas</label>
		    <select class="form-control" name="id_kelas" id="id_kelas">
		    	<option value="" disabled hidden selected>-- Kelas --</option>
		    	<?php foreach($fileKelas as $kelas): ?>
		    		<option value="<?= $kelas->id_kelas ?>" ><?= $kelas->nama_kelas ?></option>
		    	<?php endforeach;?>
		    </select>
		  </div>

		  <div class="mb-3">
		    <label for="id_jurusan" class="form-label">Jurusan</label>
		    <select class="form-control" name="id_jurusan" id="id_jurusan">
		    	<option value="" selected disabled hidden>-- Jurusan --</option>
		    	<?php foreach($fileJurusan as $jurusan): ?>
		    		<option value="<?= $jurusan->id_jurusan ?>" ><?= $jurusan->nama_jurusan ?></option>
		    	<?php endforeach;?>
		    </select>
		  </div>

			<div class="mb-3">
		    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
		    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
		    	<option value="" selected disabled hidden>-- Jenis Kelamin --</option>
		    	<option value="pria">Pria</option>
		    	<option value="wanita">Perempuan</option>
		    </select>
		  </div>

		  <div class="mb-3">
		  	<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
		  	<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
		  </div>

		  <div class="mb-3">
		  	<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
		  	<input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
		  </div>

		  <input type="submit" class="btn btn-primary" value="save" onclick="store()" name="action">
		  <input type="submit" class="btn btn-primary d-none" value="update" onclick="updateData()" name="action">

		</div>

		<div id="siswa"></div>
	</div>

<script>
	function showData(){
		fetch('../api/siswa/showData.php')
			.then(res => res.text())
			.then(res => {
				document.getElementById('siswa').innerHTML = res
			})
	}

	function store(){
		var nis = document.getElementById('nis').value;
		var nama = document.getElementById('nama').value;
		var id_kelas = document.getElementById('id_kelas').value;
		var id_jurusan = document.getElementById('id_jurusan').value;
		var jenis_kelamin = document.getElementById('jenis_kelamin').value;
		var tempat_lahir = document.getElementById('tempat_lahir').value;
		var tanggal_lahir = document.getElementById('tanggal_lahir').value;

		var data = {
			nis,
			nama,
			id_kelas,
			id_jurusan,
			jenis_kelamin,
			tempat_lahir,
			tanggal_lahir
		};

		fetch('../api/siswa/create.php', {
			method: 'POST',
			body: JSON.stringify(data)
		})
		.then(res => res.json())
		.then(res => {
			alert(res.message)
			showData()
		})
	}

	function findSiswa(nis){
		fetch(`../api/siswa/update.php?nis=${nis}`)
			.then(res => res.json())
			.then(res => {
				var nis = document.getElementById('nis').value;
				var nama = document.getElementById('nama').value;
				var id_kelas = document.getElementById('id_kelas').value;
				var id_jurusan = document.getElementById('id_jurusan').value;
				var jenis_kelamin = document.getElementById('jenis_kelamin').value;
				var tempat_lahir = document.getElementById('tempat_lahir').value;
				var tanggal_lahir = document.getElementById('tanggal_lahir').value;
			})
	}
</script>

</body>
</html>