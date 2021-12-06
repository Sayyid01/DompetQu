<?php
	require 'functions.php';

	if (empty($_POST['id'])) {
		echo '{"status" : "Error","message" : "ID is required."}';
		exit();
	}

	if($_POST['id']){
		$id = $_POST['id'];
		$result  = mysqli_query($koneksi , "DELETE FROM pemasukkan WHERE id='$id'");

		if ($result) {
			if (mysqli_affected_rows($koneksi) > 0) {
				echo '{"status" : "Succes", "message" : "Berhasil hapus data!"}';
			} else {
				echo '{"status" : "Error", "message" : '.mysqli_error($conn).'}';
			}
		} else {
			echo '{"status" : "Error", "message" : '.mysqli_error($conn).'}';
		}
		
		return mysqli_affected_rows($koneksi);
	}
?>