<?php 
include '../conn.php';

$formData = [];

if(isset($_POST['edit'])){
	$sql = "SELECT * FROM tbmapel WHERE id_mapel='{$_POST['id_mapel']}'";
	$query = mysqli_query($conn, $sql);
	$formData = mysqli_fetch_assoc($query);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<div class="container my-5">
		<a href="../index.php" class="btn btn-danger mb-2">Back</a>
		<h2>CRUD Mapel</h2>
		<form id="form" method="POST" action="action.php" class="col-3 my-2">
			<input type="hidden" name="id_mapel" value="<?= $formData['id_mapel'] ?? '' ?>">

		  <div class="mb-3">
		    <label for="nama_mapel" class="form-label">Nama Mapel</label>
		    <input type="text" name="nama_mapel" class="form-control" value="<?= $formData['nama_mapel'] ?? '' ?>" id="nama_mapel">
		  </div>

		  <div class="mb-3">
		    <label for="id_guru" class="form-label">Guru</label>
		    <select class="form-control" name="id_guru" id="id_guru">
		    	<option value="" disabled hidden selected>-- Guru --</option>
		    	<?php 
		    		$sqlguru = "select * from tbguru";
		    		$qguru = mysqli_query($conn, $sqlguru);
		    		while($r3 = mysqli_fetch_array($qguru)){
		    			$id_guru = $r3['id_guru'];
		    			$nama_guru = $r3['nama_guru'];
		    	?>
		    			<option value="<?= $id_guru ?>" <?= ($formData && $formData['id_guru'] == $id_guru) ? 'selected' : '' ?>><?= $nama_guru ?></option>
		    	<?php 
		    		}
		    	 ?>
		    </select>
		  </div>

		  <div class="mb-3">
		    <label for="id_kelas" class="form-label">Kelas</label>
		    <select class="form-control" name="id_kelas" id="id_kelas">
		    	<option value="" disabled hidden selected>-- Kelas --</option>
		    	<?php 
		    		$sqlkelas = "select * from tbkelas";
		    		$qkelas = mysqli_query($conn, $sqlkelas);
		    		while($r3 = mysqli_fetch_array($qkelas)){
		    			$id_kelas = $r3['id_kelas'];
		    			$nama_kelas = $r3['nama_kelas'];
		    	?>
		    			<option value="<?= $id_kelas ?>" <?= ($formData && $formData['id_kelas'] == $id_kelas) ? 'selected' : '' ?>><?= $nama_kelas ?></option>
		    	<?php 
		    		}
		    	 ?>
		    </select>
		  </div>

		  <div class="mb-3">
		    <label for="id_jurusan" class="form-label">Jurusan</label>
		    <select class="form-control" name="id_jurusan" id="id_jurusan">
		    	<option value="" selected disabled hidden>-- Jurusan --</option>
		    	<?php 
		    		$sqljurusan = "select * from tbjurusan";
		    		$qjurusan = mysqli_query($conn, $sqljurusan);
		    		while($r3 = mysqli_fetch_array($qjurusan)){
		    			$id_jurusan = $r3['id_jurusan'];
		    			$nama_jurusan = $r3['nama_jurusan'];
		    	?>
		    			<option value="<?= $id_jurusan ?>" <?= ($formData && $formData['id_jurusan'] == $id_jurusan) ? 'selected' : '' ?>><?= $nama_jurusan ?></option>
		    	<?php 
		    		}
		    	 ?>
		    </select>
		  </div>

		  <?php if(isset($formData['id_mapel'])): ?>
		  	<input type="submit" class="btn btn-primary" value="update" name="action">
		  <?php else: ?>
		  	<input type="submit" class="btn btn-primary" value="save" name="action">
		  <?php endif; ?>

		</form>

		<div id="siswa">
			
		</div>
	</div>

<script>
	$('document').ready(function(){
    loadTable();
  });

  function loadTable(){
  	$.ajax({
  		type: 'POST',
  		url: './show.php',
  		dataType: 'html'
  	})
  	.done(res => {
  		$('#siswa').html(res);
  	})
  }
</script>

</body>
</html>