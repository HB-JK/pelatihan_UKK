<?php 
$fileKelas = json_decode(file_get_contents('../data/kelas.json'));
$fileJurusan = json_decode(file_get_contents('../data/jurusan.json'));
$fileGuru = json_decode(file_get_contents('../data/guru.json'));
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
		<h2>CRUD Mapel</h2>
		<div class="col-3 my-2">
			<input type="hidden" name="id_mapel" id="id_mapel">

		  <div class="mb-3">
		    <label for="nama_mapel" class="form-label">Nama Mapel</label>
		    <input type="text" name="nama_mapel" class="form-control"  id="nama_mapel">
		  </div>

		  <div class="mb-3">
		    <label for="id_guru" class="form-label">Guru</label>
		    <select class="form-control" name="id_guru" id="id_guru">
		    	<option value="" disabled hidden selected>-- Guru --</option>
		    	<?php foreach($fileGuru as $guru): ?>
		    		<option value="<?= $guru->id_guru ?>" ><?= $guru->nama_guru ?></option>
		    	<?php endforeach;?>
		    </select>
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

		  <input type="submit" class="btn btn-primary" id="save" onclick="store()" value="save" name="action">
		  <input type="submit" class="btn btn-primary" style="display:none" id="update" onclick="updateData()" value="update" name="action">

		</div>

		<div id="mapel">
			
		</div>
	</div>

<script>
	function showData(){
		fetch('../api/mapel/showData.php')
			.then(res => res.text())
			.then(res => {
				document.getElementById('mapel').innerHTML = res
			})
	}

	function store(){
		var nama_mapel = document.getElementById('nama_mapel').value;
		var id_kelas = parseInt(document.getElementById('id_kelas').value);
		var id_jurusan = parseInt(document.getElementById('id_jurusan').value);
		var id_guru = parseInt(document.getElementById('id_guru').value);

		const data = {
			id_mapel: 0,
			nama_mapel,
			id_kelas,
			id_jurusan,
			id_guru
		}

		fetch('../api/mapel/create.php', {
			method: 'POST',
			body: JSON.stringify(data)
		})
			.then(res => res.json())
			.then(res => {
				alert(res.message)
				document.getElementById('nama_mapel').value = "";
				document.getElementById('id_kelas').value = "";
				document.getElementById('id_jurusan').value = "";
				document.getElementById('id_guru').value = "";

				showData()
			})
	}

	function findData(id){
		fetch(`../api/mapel/findData.php?id_mapel=${id}`)
			.then(res => res.json())
			.then(res => {
				document.getElementById('id_mapel').value = res.id_mapel;
				document.getElementById('nama_mapel').value = res.nama_mapel;
				document.getElementById('id_kelas').value = res.id_kelas;
				document.getElementById('id_jurusan').value = res.id_jurusan;
				document.getElementById('id_guru').value = res.id_guru;

				document.getElementById('save').style.display = "none";
				document.getElementById('update').style.display = "block";
			})
	}

	function updateData(){
		var id_mapel = document.getElementById('id_mapel').value;
		var nama_mapel = document.getElementById('nama_mapel').value;
		var id_kelas = parseInt(document.getElementById('id_kelas').value);
		var id_jurusan = parseInt(document.getElementById('id_jurusan').value);
		var id_guru = parseInt(document.getElementById('id_guru').value);

		const data = {
			id_mapel,
			nama_mapel,
			id_kelas,
			id_jurusan,
			id_guru
		}

		fetch('../api/mapel/updateData.php', {
			method: 'POST',
			body: JSON.stringify(data)
		})
			.then(res => res.json())
			.then(res => {
				alert(res.message)
				document.getElementById('id_mapel').value = "";
				document.getElementById('nama_mapel').value = "";
				document.getElementById('id_kelas').value = "";
				document.getElementById('id_jurusan').value = "";
				document.getElementById('id_guru').value = "";

				showData()

				document.getElementById('save').style.display = "block";
				document.getElementById('update').style.display = "none"
			})
	}

	function del(id){
		fetch(`../api/mapel/destroy.php?id_mapel=${id}`)
			.then(res => res.json())
			.then(res => {
				alert(res.message)
				showData()
			})
	}
</script>

</body>
</html>